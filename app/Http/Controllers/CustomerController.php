<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AssignFrequencyQueue;
use App\Models\AuditLog;
use App\Models\Company;
use App\Models\Faqs;
use App\Models\FrequencyAssignment;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\MessageCustomer;
use App\Models\RadioLicenseApplication;
use App\Models\RadioLicenseApplicationDetail;
use App\Models\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminnotification = new AdminNotification();
        $this->usernotification = new UserNotification();
        $this->messagecustomer = new MessageCustomer();
        $this->company = new Company();
        $this->radiolicenseapplication = new RadioLicenseApplication();
        $this->radiolicenseapplicationdetail = new RadioLicenseApplicationDetail();
        $this->invoice = new Invoice();
        $this->invoiceitem = new InvoiceItem();
        $this->auditlog = new AuditLog();
        $this->assignfrequencyqueue = new AssignFrequencyQueue();
        $this->frequencyassignment = new FrequencyAssignment();
        $this->faqs = new Faqs();
    }


    public function showMessageCustomerForm($customer){
        $customer = $this->company->getCompanyBySlug($customer);
        if(!empty($customer)){
            return view('workflow.message-customer', ['customer'=>$customer]);
        }else{
            session()->flash("error", "Whoops! No record found.");
            return back();
        }

    }

    public function messageCustomer(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'customer'=>'required',
            'compose_message'=>'required'
        ],[
            'subject.required'=>'Enter a subject for this conversation',
            'compose_message.required'=>'Type a message in the box provided.',
            'customer.required'=>'Select a customer'
        ]);
        $message = $this->messagecustomer->messageCustomer($request);
        //Log
        #Admin notification
        $subject = "Message Customer";
        $body = Auth::user()->first_name." sent a message to customer.";
        $this->adminnotification->addAdminNotification($subject, $body, "read-message", $message->slug, 1, Auth::user()->id);

        #User notification
        $subject = "New message from ".config('app.name');
        $body = "You recently received a message from ".config('app.name');
        $this->usernotification->addUserNotification($subject, $body, "view-message", $message->slug, 1, $request->customer);
        session()->flash("success", "Your message was sent.");
        return back();
    }

    public function messages(){
        return view('workflow.messages', ['messages'=>$this->messagecustomer->getAllMessages()]);
    }

    public function readMessage($slug){
        $message = $this->messagecustomer->getAllMessagesBySlug($slug);
        if(!empty($message)){
            return view('workflow.message-view', ['message'=>$message]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }

    }

    public function invoiceCustomer($slug, $appSlug){
        $customer = $this->company->getCompanyBySlug($slug);
        $application = $this->radiolicenseapplication->getRadioLicenseApplicationBySlug($appSlug);
        if(!empty($customer) && !empty($application)){
            return view('invoice.new-invoice', ['customer'=>$customer, 'application'=>$application]);
        }else{
            session()->flash("error", "Whoops! Invalid request");
            return redirect()->route('all-radio-license-applications');
        }
    }

    public function storeNewInvoice(Request $request){
        $this->validate($request,[
            'company'=>'required',
            'amount'=>'required|array',
            'amount.*'=>'required'
        ],
        ['amount.required'=>'Enter amount']);
       $invoice =  $this->invoice->registerInvoice($request);
        $this->invoiceitem->registerInvoiceItems($invoice->id, $request->company, $request);
        #Admin notification
        $subject = "New invoice!";
        $body = " You just issued an invoice to customer";
        $this->adminnotification->addAdminNotification($subject, $body, "read-invoice", $invoice->slug, 1, Auth::user()->id);

        #User notification
        $subject = "Hello there!";
        $body = "An invoice was issued in your honour.";
        $this->usernotification->addUserNotification($subject, $body, "view-invoice", $invoice->slug, 1, $request->company_id);


        session()->flash("success", "You've successfully issued invoice to customer.");
        return redirect()->route('manage-transactions');
    }

    public function manageTransactions(){

        return view('invoice.index',[
            'invoices'=>$this->invoice->getAllInvoices(),
            'thisMonth'=>$this->invoice->thisMonthsInvoice()
            ]);
    }

    public function readInvoice($slug){
        $invoice = $this->invoice->getInvoiceBySlug($slug);
        if(!empty($invoice)){
            $application = $this->radiolicenseapplication->getRadioLicenseApplicationById($invoice->radio_lic_app_id);
            return view('invoice.view',
                ['invoice'=>$invoice,
                 'application'=>$application,

                ]);
        }else{
            session()->flash("error", "No record found.");
            return redirect()->route("manage-transactions");
        }
    }

    public function updateInvoiceStatus(Request $request){
        $this->validate($request, [
            'comment'=>'required',
            'invoiceId'=>'required',
            'status'=>'required'
        ],[
            'comment.required'=>"Leave comment",
        ]);
        $this->invoice->updateInvoiceStatus($request);
        if($request->status == 2){//verified
            $invoice = $this->invoice->getInvoiceById($request->invoiceId);
            if($invoice->invoice_type == 1){ //new license app
                //let's queue for frequency assignment
                $this->assignfrequencyqueue->queueFrequency($invoice->company_id, $invoice->slug, 1);
            }
        }

        session()->flash("success", "Transaction recorded.");
        return redirect()->route("manage-transactions");
    }

    public function showComposeMessageForm(){
        return view('workflow.compose-message',['customers'=>$this->company->getAllCompanies()]);
    }

    public function showCompanies(){
        return view('customer.index',
            ['companies'=>$this->company->getAllCompanies(),
             'licenses'=>$this->frequencyassignment->getAllCompanyFrequencyCounter()
            ]);
    }

    public function readCompanyProfile($slug){
        $company = $this->company->getCompanyBySlug($slug);
        if(!empty($company)){
            return view('customer.view',['company'=>$company]);
        }else{
            session()->flash("error", "No record found.");
            return back();
        }
    }


    public function showFaqs(){
        return view('customer.faqs',['faqs'=>$this->faqs->getFaqs()]);
    }

    public function postFaq(Request $request){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required'
        ],[
            'answer.required'=>"What's the answer to this question?",
            'question.required'=>"Enter a question with it's answer."
        ]);
        $this->faqs->publishFaq($request);
        $message = Auth::user()->first_name." published new FAQs";
        $subject = "New FAQ ";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your FAQs was published!");
        return back();
    }
    public function editFaq(Request $request){
        $this->validate($request,[
            'question'=>'required',
            'answer'=>'required',
            'faq'=>'required'
        ],[
            'answer.required'=>"What's the answer to this question?",
            'question.required'=>"Enter a question with it's answer."
        ]);
        $this->faqs->updateFaq($request);
        $message = Auth::user()->first_name." edited FAQ";
        $subject = "FAQ edited";
        $this->auditlog->registerLog(Auth::user()->id, $subject, $message);
        session()->flash("success", "Your changes were saved!");
        return back();
    }

    public function notifyCustomer(Request $request){
        $this->validate($request,[
            'subject'=>'required',
            'customer'=>'required',
            'compose_message'=>'required'
        ],[
            'subject.required'=>'Enter a subject for this conversation',
            'compose_message.required'=>'Type a message in the box provided.',
            'customer.required'=>'Select a customer'
        ]);
        $length = count($request->customer);
        for($i = 0; $i<$length; $i++){
            $message = $this->messagecustomer->sendNotification($request->customer[$i], $request->subject, $request->compose_message, 1);
            //$customer, $subject, $compose_message, $type
            #User notification
            $subject = $request->subject;
            $body = "You recently received a message from ".config('app.name');
            $this->usernotification->addUserNotification($subject, $body, "view-message", $message->slug, 1, $request->customer[$i]);
        }
        //Log
        #Admin notification
        /*$subject = "Message Customer";
        $body = Auth::user()->first_name." sent a message to customer.";
        $this->adminnotification->addAdminNotification($subject, $body, "read-message", $message->slug, 1, Auth::user()->id);*/
        session()->flash("success", "Your message was sent.");
        return back();
    }
}

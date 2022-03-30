<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\AuditLog;
use App\Models\Company;
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
        session()->flash("success", "Transaction recorded.");
        return redirect()->route("manage-transactions");
    }

    public function showComposeMessageForm(){
        return view('workflow.compose-message',['customers'=>$this->company->getAllCompanies()]);
    }

    public function showCompanies(){
        return view('customer.index',['companies'=>$this->company->getAllCompanies()]);
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
}

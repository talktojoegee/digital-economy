<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Invoice extends Model
{
    use HasFactory;

    public function getCompany(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function thisMonthsInvoice(){
        $month = date('m');
        $year = date('Y');
        return Invoice::whereMonth('date_paid', $month)->whereYear('date_paid', $year)->orderBy('id', 'DESC')->get();
    }
    public function getInvoiceItems(){
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function getAllInvoices(){
        return Invoice::orderBy('id', 'DESC')->get();
    }

    public function generateReport($from, $to){
        //$month = date('m');
        //$year = date('Y');
        return Invoice::whereBetween('created_at', [$from, $to])->get();
    }

    public function getIssuedBy(){
        return $this->belongsTo(User::class, 'issued_by');
    }

    public function registerInvoice(Request  $request){
        $total = $this->getTotalOfItems($request);
        $invoice = new Invoice();
        $invoice->invoice_no = $this->getInvoiceNo();
        $invoice->radio_lic_app_id = $request->appId;
        $invoice->company_id = $request->company;
        $invoice->issued_by = Auth::user()->id;
        //$invoice->ref_no = $this->generateRefNo();
        $invoice->date_issued = now();
        $invoice->total = $total + $request->vat ?? 0;
        $invoice->sub_total = $total - $request->vat ?? 0;
        $invoice->slug = substr(sha1(time()),11,40);
        $invoice->save();
        return $invoice;

    }

    public function generateRefNo(){
        return substr(sha1(time()),32,40);
    }

    public function getTotalOfItems(Request  $request){
        $total = 0;
        for($i = 0; $i < count($request->amount); $i++){
            $total += $request->amount[$i];
        }
        return $total;
    }

    public function getInvoiceNo(){
        $count = Invoice::orderBy('id', "DESC")->first();
        if(!empty($count)){
            return $count->invoice_no + 1;
        }else{
            return 100000;
        }
    }

    public function getInvoiceBySlug($slug){
        return Invoice::where('slug', $slug)->first();
    }
    public function getInvoiceById($id){
        return Invoice::find($id);
    }
    public function getInvoiceByCompanyId($companyId){
        return Invoice::where('company_id', $companyId)->orderBy('id', 'DESC')->get();
    }

    public function updateInvoiceStatus(Request $request){
        $invoice = Invoice::find($request->invoiceId);
        $invoice->status = $request->status; //verified
        $invoice->officer_action = $request->status;
        $invoice->officer_id = Auth::user()->id;
        $invoice->date_actioned = now();
        $invoice->comment = $request->comment ?? '';
        $invoice->save();
    }

    public function updatePayment(Request $request){
        $invoice = Invoice::find($request->invoice);
        $invoice->paid_amount += $invoice->total;
        $invoice->service_fee = ($request->amount - $invoice->total);
        $invoice->ref_no = $request->paymentReference;
        $invoice->r_order_id = $request->transactionId;
        $invoice->r_payment_date = now();
        $invoice->r_amount = $request->amount; //plus service fee
        $invoice->date_paid = now();
        $invoice->status = 1; //paid
        $invoice->payment_method = !empty($request->paymentReference) ? 1 : 2;
        $invoice->save();
    }
}

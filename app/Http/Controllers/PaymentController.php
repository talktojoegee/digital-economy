<?php

namespace App\Http\Controllers;

use App\Models\BulkSmsAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yabacon\Paystack;

class PaymentController extends Controller
{
    public function __construct(){
        $this->bulksmsaccount = new BulkSmsAccount();
        /*$this->receipt = new Receipt();
        $this->property = new Property();
        $this->tenant = new Tenant();
        $this->leasefrequency = new LeaseFrequency();
        $this->leaserenewal = new LeaseRenewal();
        $this->invoice = new Invoice();
        $this->invoiceitem = new InvoiceItem();
        $this->companypaymentintegration = new CompanyPaymentIntegration();
        $this->subscription = new Subscription();
        $this->user = new User();
        $this->company = new Company();*/

    }

    /*
     * process online payment
     */
  /*  public function onlinePayment($slug){
        $invoice = $this->invoice->getInvoice($slug);
        if(!empty($invoice)){
            $company_payment_int = $this->companypaymentintegration->getCompanyPaymentIntegration($invoice->company_id);
            if(!empty($company_payment_int)){
                #Public key
                $this->setEnv('PAYSTACK_PUBLIC_KEY', $company_payment_int->ps_public_key);
                #Secret key
                $this->setEnv('PAYSTACK_SECRET_KEY', $company_payment_int->ps_secret_key);
                return view('manager.accounting.invoice.online-payment',['invoice'=>$invoice]);
            }else{
                session()->flash("error", "<h3 class='text-center'>Whoops! Kindly contact Admin. Something went wrong.</h3> ");
                return back();
            }

        }else{
            abort(404, 'Resource not found.');
        }
    }*/

    public function processOnlinePayment(Request $request){
        /*
         * Transaction Type (Transaction):
         *  1 = New tenant subscription
         *  2 = Subscription Renewal
         *  3 = Invoice Payment
         *  4 = SMS Top-up
         */
        $reference = isset($request->reference) ? $request->reference : '';
        if(!$reference){
            die('No reference supplied');
        }
        $paystack = new Paystack(config('app.paystack_secret_key'));
        try {
            // verify using the library
            $tranx = $paystack->transaction->verify([
                'reference'=>$reference, // unique to transactions
            ]);
        }catch (Paystack\Exception\ApiException $exception){
            session()->flash("error", "Whoops! Something went wrong.");
            return redirect()->route('top-up');
        }
        if ('success' === $tranx->data->status) {
            try {
                $transaction_type = $tranx->data->metadata->transaction ;
                switch ($transaction_type){
                    /*case 2:
                        $transaction_type = $tranx->data->metadata->transaction ;
                        $active_key = "key_".substr(sha1(time()),23,40);
                        $tenant_id = $tranx->data->metadata->tenant ;
                        $plan_id = $tranx->data->metadata->pricing ;
                        $charge = $tranx->data->metadata->charge ;
                        $plan = $this->pricing->getPricingByPricingId($plan_id);
                        $now = Carbon::now();
                        $end = $now->addDays($plan->duration);
                        $this->subscription->renewSubscription($tenant_id, $plan_id, $active_key, now(),
                            $end->toDateTimeString(), 3, $tranx->data->amount, $charge);
                        $this->user->updateTenantActiveKey($tenant_id, $active_key, now(), $end->toDateTimeString());
                        $this->tenant->updateTenantSubscriptionPeriod($tenant_id, $active_key, now(), $end->toDateTimeString(), $plan_id);
                        break;
                    case 3:
                        $invioce_id = $tranx->data->metadata->invoice;
                        $bank_id = $tranx->data->metadata->bank;
                        $amount = $tranx->data->amount;
                        $invoice = $this->invoice->getInvoiceById($invioce_id);
                        $this->invoice->updateInvoicePayment($invoice, $amount);
                        $counter = $this->receipt->getLatestReceipt();
                        $receipt = $this->receipt->createNewReceiptOnline($counter, $invoice, $amount, $bank_id);
                        break;*/
                    case 4:
                        $this->bulksmsaccount->creditAccount($request->reference,$tranx->data->amount,$tranx->data->metadata->cost);
                        break;
                }
                // transaction was successful...
                // please check other things like whether you already gave value for this ref
                // if the email matches the customer who owns the product etc
                // Give value
                //return dd($tranx->data->amount);
                //return dd($tranx->data->metadata->cost);
                switch ($transaction_type){
                    /*case 2:
                        session()->flash("success", "Your subscription was renewed successfully.");
                        return redirect()->route('login');
                        break;
                    case 3:
                        session()->flash("success", "Your payment was received. Thank you.");
                        return redirect()->route('login');
                        break;*/
                    case 4:
                        session()->flash("success", "Your top-up transaction was successful.");
                        return redirect()->route('top-up');
                        break;
                }
            }catch (Paystack\Exception\ApiException $ex){

            }

        }
    }

}

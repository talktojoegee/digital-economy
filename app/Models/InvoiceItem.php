<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class InvoiceItem extends Model
{
    use HasFactory;

    public function getRadioDetailApplication(){
        return $this->belongsTo(RadioLicenseApplicationDetail::class, 'rlad_id');
    }


    public function registerInvoiceItems($invoiceId, $companyId, Request $request){
        //return dd($request->detailHandle[0]);
        for($i = 0; $i < count($request->detailHandle); $i++){
            $entry = new InvoiceItem();
            $entry->invoice_id = $invoiceId;
            $entry->company_id = $companyId;
            $entry->rlad_id = $request->detailHandle[$i];
            $entry->quantity = $request->quantity[$i];
            $entry->sub_total = $request->amount[$i];
            $entry->save();
        }
    }

    public function getInvoiceItemByRadioDetailId($id){
        return InvoiceItem::find($id);
    }


}

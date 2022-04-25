<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequencyAssignmentRenewal extends Model
{
    use HasFactory;




    public function registerFrequencyRenewalLog($frequencyId, $amount, $valid_from, $valid_to, $ref, $trans_id){
        $log = new FrequencyAssignmentRenewal();
        $log->fa_id = $frequencyId;
        $log->amount = $amount;
        $log->valid_from = $valid_from;
        $log->valid_to = $valid_to;
        $log->trx_id = $trans_id;
        $log->ref_no = $ref;
        $log->save();
        return $log;
    }


}

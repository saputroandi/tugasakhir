<?php

namespace App\Http\Controllers\CustomHelper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CustomHelperController extends Controller
{
    public function IdGenerator($last_record, $primary_key, $role)
    {
        $firstRecord = "001";
        $now = date("Ymd",time());
        $dateFromRecord = Str::substr($last_record[$primary_key], 1, 8);
        $idFromRecord = intval(Str::substr($last_record[$primary_key], 9, 3));

        if($last_record && $now <= $dateFromRecord && $idFromRecord < 999)
        {
            return $id = $last_record[$primary_key] + 1;
        }

        $id = intval($role.$now.$firstRecord);
        return $id;
    }
}

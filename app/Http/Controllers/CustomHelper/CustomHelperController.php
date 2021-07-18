<?php

namespace App\Http\Controllers\CustomHelper;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class CustomHelperController extends Controller
{
    public static function IdGenerator($last_record, $primary_key, $role)
    {
        $firstRecord = "001";
        $now         = date("Ymd",time());

        if($last_record)
        {
            $dateFromRecord = Str::substr($last_record[$primary_key], 1, 8);
            $idFromRecord   = intval(Str::substr($last_record[$primary_key], 9, 3));

            if($now <= $dateFromRecord && $idFromRecord < 999)
            {
                return $id = $last_record[$primary_key] + 1;
            }
        }

        $id = intval($role.$now.$firstRecord);
        return $id;
    }

    public static function tanggalIndo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    public static function ManualValidation($dataToValidate, $arrayMessages)
    {
        foreach ($dataToValidate as $key => $value) {

            $lampirans = count($dataToValidate) - 1;

            if($dataToValidate[$key]) break;
            if($key == $lampirans) throw ValidationException::withMessages($arrayMessages);

            continue;

        }
    }
}

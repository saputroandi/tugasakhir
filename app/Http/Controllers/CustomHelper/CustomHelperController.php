<?php

namespace App\Http\Controllers\CustomHelper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomHelperController extends Controller
{
    public function IdGenerator($last_record, $role)
    {
        $getDate = date("Ymd",time());

        if($last_record)
        {
            if($getDate < Str::substr($last_record->user_id, 1, 8))
            {
                $actualId = Str::substr($last_record->user_id, 9, 1) + 1;
            } else {
                $actualId = 1;
            }
        } else {
            $actualId = 1;
        }

        $id= intval($role.$getDate.$actualId);

        return $id;
    }
}

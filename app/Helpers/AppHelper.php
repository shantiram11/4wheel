<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class AppHelper
{
    public static function renameImageFileUpload($file): string
    {
        $imageName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        return Str::of($imageName)->slug('_').'_'.date('YmdHis').'.'.$file->extension();
    }
    public static function datetime_on_user_timezone($date)
    {
        $auth_user = \Auth::user();
        if($auth_user && !empty($auth_user->timezone)){
            return $date->setTimezone($auth_user->timezone);
        }
        return $date;
    }
}

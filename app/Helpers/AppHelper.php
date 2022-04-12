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
    public static function additionalMeta($meta, $total)
    {
        $meta['total'] = $total;
        $meta['totalPage'] = ceil( $total / $meta['perPage']);
        if($meta['totalPage'] < $meta['page']){
            $meta['page'] = $meta['totalPage'];
        }
//        $meta['offset'] = ($meta['page'] - 1) * $meta['perPage'];
        return $meta;
    }
    public static function defaultTableInput($input) : array
    {
        $page = isset($input['page']) ? (int)$input['page'] : 1;
        $perPage = isset($input['perPage']) ? (int)$input['perPage'] : 50;
        $order = $input['order'] ?? 'created_at';
        $dir = $input['dir'] ?? 'desc';
//        $searchCol = isset($input['searchCol']) ? json_decode($input['searchCol']) :  new \stdClass();
        $search = isset($input['search']) ? ($input['search']) : '';
        $offset = ($page - 1) * $perPage;
        return [
            'order'     => $order,
            'dir'       => $dir,
            'page'      => $page,
            'perPage'   => $perPage,
            'offset'    => $offset,
//            'searchCol' => $searchCol,
            'search'    => $search,
        ];
    }


}

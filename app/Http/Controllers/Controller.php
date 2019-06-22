<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function date_to_db($date) {
        $d = explode("/", $date);
        return $d[2]."-".$d[1]."-".$d[0];
    }

    public static function is_active($path) {
        return (request()->is($path)) ? 'active' : '';
    }
}

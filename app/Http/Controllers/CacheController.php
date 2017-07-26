<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Carbon;
use DB;

class CacheController extends Controller
{
    public function __construct()
    {

    }

    public function getUsers()
    {
        $value = Cache::remember('users', 1, function () {
            return DB::table('users')->get();
        });
        dd($value);
       
    }

    public function storeSingle()
    {
        Cache::put('name','elango',3);
        echo $value = Cache::get('name', 'default');
    }
}

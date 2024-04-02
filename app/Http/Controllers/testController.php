<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testController extends Controller
{
    public function index()
    {
        $result = DB::table('users')->get();
        $data = 'Hello';
        return view('test.index',['result'=>$result,'data'=>$data]);
    }
}

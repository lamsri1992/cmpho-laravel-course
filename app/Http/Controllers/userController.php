<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->get();
        return view('users.index',['data'=>$data]);
    }

    // Request $request
    public function create(Request $request)
    {
        // dd($request->all());
        DB::table('users')->insert([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make(12345)
        ]);
        return back()->with('success','เพิ่มข้อมูลผู้ใช้สำเร็จ');
    }

    public function show($id)
    {
        // dd($id);
        $data = DB::table('users')
                ->where('id',$id)
                ->first();
        return view('users.show',['data'=>$data]);
    }

    public function update(Request $request, $id)
    {
        DB::table('users')->where('id',$id)->update([
            'email' => $request->email,
            'name' => $request->username,
        ]);
        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return back()->with('success','ลบข้อมูลผู้ใช้สำเร็จ');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect (route('admin.dasboard'));
        } else {
            $request->session()->flash('error', 'Access Deniel');
            return view('admin.login.admin_login');
        }
        return view('admin.login.admin_login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');
        // $result = Admin::where(['email' => $email, 'password' => $password])->get();
        $result = Admin::where(['email' => $email])->first();
        if($result){
            if (Hash::check($request->post('password'),$result->password)) {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID',$result->id);
            return redirect(route('admin.dasboard'));
            }else{
                $request->session()->flash('error', 'Enter the Correct passoword');
                return redirect(route('admin.index'));
            }
        }else{
            $request->session()->flash('error', 'Enter the valid login details');
            return redirect(route('admin.index'));
        }
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(){

    }
}

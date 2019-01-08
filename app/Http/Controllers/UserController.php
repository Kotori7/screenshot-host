<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
    }

//    /**
//     * Update the requested user.
//     *
//     * @param Request $request
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function update(Request $request){ // this is awful and could probably be done way better, but idc
//        if(!preg_match("/@/", $request->input('email'))){ // holy fuck lmao
//            session(['error' => 'Invalid email address.']);
//            return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//        }
//        else if(Hash::make($request->input('current-pwd')) != Auth::user()->getAuthPassword()){
//            session(['error' => 'Incorrect current password.']);
//            return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//        }
//        else if($request->input('new-pwd')){
//            if($request->input('new-pwd') != $request->input('new-pwd-confirm')){
//                session(['error' => 'New password does not match confirmation.']);
//                return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//            }
//            else {
//                try {
//                    DB::table('users')
//                        ->where('username', Auth::user()->username)
//                        ->update(['password' => Hash::make($request->input('new-pwd'))]);
//                }
//                catch(\Exception $ex){
//                    session(['error' => 'there was an error when trying to update your password.']);
//                    return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//                }
//            }
//        }
//        if($request->input('email') != Auth::user()->email){
//            try {
//                DB::table('users')
//                    ->where('username', Auth::user()->username)
//                    ->update(['email' => $request->input('email')]);
//            }
//            catch(\Exception $ex){
//                session(['error' => 'There was an error when trying to update your email address.']);
//                return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//            }
//        }
//        session(['success' => 'Account updated successfully!']);
//        return view('user', ['email' => Auth::user()->email, 'apikey' => Auth::user()->apikey]);
//    }
    public function apikey(Request $request){
        DB::table('users')
            ->where('username', Auth::user()->username)
            ->update(['apikey' => bin2hex(random_bytes(20))]);
        return redirect('/user');
    }
}

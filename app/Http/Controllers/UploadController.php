<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;


class UploadController extends Controller
{
    public function __construct(){}

    public function upload(Request $request){
       if(DB::table('users')->where('apikey', $request->input('key'))->doesntExist()){
           abort(403, "Invalid API Key.");
       }
       else {
           $username = DB::table('users')->where('apikey', $request->input('key'))->select('username')->get();
           $path = $request->file('file')->storeAs('public', bin2hex(random_bytes(12)) . '.' . $request->file('file')->clientExtension());
           $name = substr($path, 7);
           File::create([
               'filename' => $name,
               'owner' => $username
           ]);
           return $name;
       }
    }
}

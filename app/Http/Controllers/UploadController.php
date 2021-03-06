<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\File;


class UploadController extends Controller
{
    public function __construct(){}

    public function upload(Request $request){
       if(DB::table('users')
           ->where('apikey', $request->input('key'))
           ->doesntExist()){
           abort(403, "Invalid API Key.");
       }
       else {
           // this seems unsafe, but attempted sql injection will get picked up by the previous if statement
           $username = DB::select("select * from users where apikey = '" . $request->input('key') . "'")[0]->username;
           $path = $request->file('file')
               ->storeAs('public', bin2hex(random_bytes(12)) . '.' . $request->file('file')->clientExtension());
           $name = substr($path, 7);
           File::create([
               'filename' => $name,
               'owner' => $username
           ]);
           return $name;
       }
    }
}

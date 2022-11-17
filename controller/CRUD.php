<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    function loadData()
    {
        echo "inserted";
        return view('insert');
    }
    public function insertdata(Request $req)
    {
        echo "inserted";

        if ($req->operation == "Insert") {
            $hobby = "";
            foreach ($req->hobby as $h) {
                $hobby .= $h . ",";
            }
            $file = request()->txtPhoto;
            $ext = $req->txtPhoto->getClientOriginalExtension();
            $baseName = substr($file, 0, stripos($file, '.'));
            $newFileName = md5($baseName) . time() . rand(1, 50) . '.' . $ext;
            $req->txtPhoto->move(public_path('upload'), $newFileName);
            DB::table('user_mstr')->insert([
                'name'=>$req->txtname,
                'photo'=>$newFileName,
                'city'=>$req->city,
                'hobby'=>$hobby
            ]);
        }
        return redirect('loadData');
    }
}

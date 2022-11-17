<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    function Prod_Insert(Request $req)
    {
        DB::table('product_mstr')->insert([
            'prodName' => $req->txtName,
            'description' => $req->txtDes
        ]);
        return redirect('DispProd');
    }

    function Prod_Display()
    {
        echo '<script>alert("data called")</dcript';
        $ProdData = DB::table('product_mstr')->get();
        return view('Admin.Product', compact('ProdData'));
        // return view('Admin.Product');
    }
    function Prov_Insert(Request $req)
    {
        $ProfileImg = (isset($req->txtProfileImg)) ? $req->txtProfileImg : "";
        echo "<script>alert('$ProfileImg')</script>";
        $sizeLimit =  20000000;
        if (!isset($req->txtProfileImg)) {
            echo "<script>alert('Invalid Profile Image.')</script>";
        } else {
            $base_name_profileImg =  $_FILES["txtProfileImg"]["name"];
            $temp_name_profileImg =  $_FILES["txtProfileImg"]["tmp_name"];
            $size_profileImg =  $_FILES["txtProfileImg"]["size"];
            $allowed_array_profileImg = array(".png", ".jpeg", ".jpg", ".JPG", ".JPEG");

            $file_name_profileImg = substr($base_name_profileImg, 0, stripos($base_name_profileImg, '.'));
            $ext_profileImg = substr($base_name_profileImg, stripos($base_name_profileImg, '.'));

            if (in_array($ext_profileImg, $allowed_array_profileImg) && $size_profileImg < $sizeLimit) {
                $ProfileImg = md5($file_name_profileImg) . rand(1000, 9999) . $ext_profileImg;
            } elseif (strlen($file_name_profileImg) == 0) {
                echo "<script>alert('* Select the file')</script>";
            } elseif ($size_profileImg > $sizeLimit) {
                echo "<script>alert('* Select the file (size limit)')</script>";
            } else {
                echo "<script>alert(' * File types are " . implode(',', $allowed_array_profileImg) . "')</script>";
            }

            if (file_exists(public_path("upload") . "/" . $ProfileImg) && $ProfileImg != "") {
                echo "<script>alert('* File exists already.')</script>";
            } else {
                move_uploaded_file($temp_name_profileImg, public_path("upload") . "/" . $ProfileImg);
                DB::table('login_mstr')->insert([
                    'userName' => $req->txtName,
                    'pass' => '1234',
                    'age' => $req->txtAge,
                    'contactNo' => $req->txtContNo,
                    'photo' => $ProfileImg,
                    'userType' => 2
                ]);
                echo "<script>alert('data called'); window.location='registration';</script>";
            }
        }
        // return view('Admin.Registration');
    }
    function Complain_Display()
    {
        $ProviderData = DB::table('complain_mstr as c')
            ->join('product_mstr as p', 'c.prodId', '=', 'p.prodId')
            ->leftJoin('login_mstr as l', 'c.providerId', '=', 'l.id')
            ->select('c.compId', 'p.prodName', 'c.complain', "c.compDesc", 'c.status', 'l.userName')
            ->get();
        return view('Admin.complain', compact('ProviderData'));
    }
    function Allocation($id)
    {
        $data = DB::table('complain_mstr as c')
            ->join('product_mstr as p', 'c.prodId', '=', 'p.prodId')
            ->where('compId', $id)
            ->select('c.compId', 'p.prodName', 'c.complain', 'c.compDesc')
            ->get();

        $provider = DB::table('login_mstr')
            ->where('userType', 2)
            ->get();
        return view('Admin.Allocation', compact('data', 'provider'));
    }
    function CompAllocation(Request $req)
    {
        $id = $req->txtId;
        $provId=$req->txtServiceProviderID;
        echo "<script>alert('button click $id $provId')</script>";
        $updateProvider = DB::table('complain_mstr')
            ->where('compId', $id)
            ->update([
                "providerId" => $provId,
                "status"=>2
            ]);
        if ($updateProvider) {
            echo "<script>alert('Service Provider Allocated.'); window.location='complain';</script>";
        }
    }
}

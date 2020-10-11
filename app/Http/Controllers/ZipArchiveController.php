<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Zipper;

class ZipArchiveController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $order_id = $request->input('order_id');

        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $order_id.".zip"; // name of zip
        Zipper::make(public_path("/storage/images/orders/".$order_id.'.zip')) //file path for zip file
                ->add(public_path()."/storage/images/orders/".$order_id.'/')->close(); //files to be zipped

        return response()->download(public_path("/storage/images/orders/".$fileName),$fileName, $headers);

    }
}

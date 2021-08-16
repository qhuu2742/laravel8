<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiemThiController extends Controller
{
    public function DiemThi(){

        return view('admin.diemthi.index');

}

    public function search(Request $request){
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $diem = DB::table('01_csv')->where('SBD','%'.$search_text.'%')->paginate(2);
            return view('diemthi',['diem'=>$diem]);

        }else{
            return view('admin.diemthi.index');
        }
}
}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use Auth;
use Hash;
use Redirect;
use DB;


class MainController extends Controller
{

    function dasbor(){
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Production Report',
            'mc'    => $mc
        );

        return view('Produksi.dasbor')->with($data);
    }

    function produksi(){
        $nowo   = DB::select("SELECT * FROM trx_prod_in");
        $data = array(
            'title' => 'Monitoring Produksi',
            'nowo'  => $nowo
        );

        return view('Produksi.schedule')->with($data);
    }

    //Schedule Produksi
    function scheduleprod(){
        $nowo   = DB::select("SELECT * FROM trx_prod_in");
        $data = array(
            'title' => 'Monitoring Produksi',
            'nowo'  => $nowo
        );

        return view('Produksi.schedule')->with($data);
    }

    function dataprodpcs(Request $request) : object {
        $id     = $request['id'];
        $start  = $request['start'];
        $end    = $request['end'];
        $arr    = dataprodpcs($id, $start, $end);
        return response($arr);
    }

    function dataprodkg(Request $request) : object {
        $id     = $request['id'];
        $start  = $request['start'];
        $end    = $request['end'];
        $arr    = dataprodkg($id, $start, $end);
        return response($arr);
    }

    function dataeffmachine(Request $request) : object {
        $id     = $request['id'];
        $start  = $request['start'];
        $end    = $request['end'];
        $arr    = dataeffmachine($id, $start, $end);
        return response($arr);
    }

    function dataactmanpower(Request $request) : object {
        $id     = $request['id'];
        $start  = $request['start'];
        $end    = $request['end'];
        $arr    = dataactmanpower($id, $start, $end);
        return response($arr);
    }

    

    // Action Add
    function actionadd(Request $request) : object {
        $table      = $request['table'];
        $data       = $request['data'];
        DB::table($table)->insert([$data]);
        return response('success');
    }

    // Action Produksi
    function prodin(){
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Produski IN',
            'mc'    => $mc
        );

        return view('Produksi.in')->with($data);
    }

    function prodout(){
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Produksi OUT',
            'mc'    => $mc
        );

        return view('Produksi.out')->with($data);
    }

    function effmachine(){
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Effisiensi Machine',
            'mc'    => $mc
        );

        return view('Produksi.effmachine')->with($data);
    }

    function actmanpower(){
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Activity Man Power',
            'mc'    => $mc
        );

        return view('Produksi.actmanpower')->with($data);
    }

    // Tes Looping
    function tesmain(){
        $id     = 1;
        $start  = '2023-10-27';
        $end    = '2023-10-31';
        $arr   = dataactmanpower($id, $start, $end);
        echo "<pre>";print_r($arr);exit;
    }
}

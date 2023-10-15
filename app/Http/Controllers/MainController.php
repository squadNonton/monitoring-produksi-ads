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

    //Schedule Produksi
    function scheduleprod(){
        $nowo   = DB::select("SELECT DISTINCT no_wo FROM trx_prod_in");
        $data = array(
            'title' => 'Monitoring Produksi',
            'nowo'  => $nowo
        );

        return view('Produksi.schedule')->with($data);
    }

    function dataprodpcs(Request $request) : object {
        $id     = $request['id'];
        $arr    = dataprodpcs($id);
        return response($arr);
    }

    function dataprodkg(Request $request) : object {
        $id     = $request['id'];
        $arr    = dataprodkg($id);
        return response($arr);
    }

    // Action Add
    function actionadd(Request $request) : object {
        $table      = $request['table'];
        $data       = $request['data'];
        DB::table($table)->insert([$data]);
        return response('success');
    }

    // Tes Looping
    function tesmain(){
        $id    = 1;
        $arr   = dataprodpcs($id);
        echo "<pre>";print_r($arr);exit;
    }
}

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
        $arr        = DB::select("SELECT * FROM trx_quartal WHERE id_material=1 ORDER BY thn DESC");
        $material   = DB::select("SELECT * FROM mst_material WHERE shape=1 AND is_active=1");
        $shape      = DB::select("SELECT * FROM mst_shape WHERE is_active=1");
        $mc   = DB::select("SELECT * FROM mst_machine");
        $data = array(
            'title' => 'Production Report',
            'mc'    => $mc,
            'arr'       => $arr,
            'material'  => $material,
            'shape'     => $shape
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
        $start  = $request['start'];
        $end    = $request['end'];
        $arr    = dataactmanpower($start, $end);
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

    function ppicschedule(){
        $mc   = DB::select("SELECT * FROM mst_machine WHERE is_active=1");
        $data = array(
            'mc'    => $mc,
            'title' => 'PPIC - Schedule'
        );

        return view('Produksi.ppicschedule')->with($data);
    }

    function prodoutput(){
        $mc   = DB::select("SELECT * FROM mst_machine WHERE is_active=1");
        $data = array(
            'mc'    => $mc,
            'title' => 'Production - Output'
        );

        return view('Produksi.prodoutput')->with($data);
    }

    function prodefisiensi(){
        $mc   = DB::select("SELECT * FROM mst_machine WHERE is_active=1");
        $data = array(
            'mc'    => $mc,
            'title' => 'Production - Efisiensi'
        );

        return view('Produksi.prodefisiensi')->with($data);
    }

    function prodmanpower(){
        $mc   = DB::select("SELECT * FROM mst_machine WHERE is_active=1");
        $mp   = DB::select("SELECT * FROM mst_man_power WHERE is_active=1");
        $data = array(
            'mc'    => $mc,
            'mp'    => $mp,
            'title' => 'Production - Man Power'
        );

        return view('Produksi.prodmanpower')->with($data);
    }

    function masterbaseprice(){
        $arr        = DB::select("SELECT a.*, b.grade AS material_name, c.name AS shape_name FROM trx_quartal a LEFT JOIN mst_material b ON a.id_material=b.id LEFT JOIN mst_shape c ON b.shape=c.id ORDER BY a.thn DESC");
        $material   = DB::select("SELECT * FROM mst_material WHERE shape=1 AND is_active=1");
        $shape      = DB::select("SELECT * FROM mst_shape WHERE is_active=1");
        $data = array(
            'title'     => 'Quartal',
            'arr'       => $arr,
            'material'  => $material,
            'shape'     => $shape
        );

        return view('Produksi.masterbaseprice')->with($data);
    }

    

    // Action List Data Schedule
    function listdataschedule(){
        // $field  = $request['field'];
        // $table  = $request['table'];
        $arr    = DB::select("SELECT a.*, b.name FROM trx_prod_in a LEFT JOIN mst_machine b ON a.id_mc=b.id ORDER BY a.id DESC");
        return response($arr);
    }

    // Action List Data Out
    function listdataout(){
        // $field  = $request['field'];
        // $table  = $request['table'];
        $arr    = DB::select("SELECT a.*, b.name FROM trx_prod_out a LEFT JOIN mst_machine b ON a.id_mc=b.id ORDER BY a.id DESC");
        return response($arr);
    }

    // Select Machine By tanggal IN
    function machinebytglin(Request $request) : object {
        $date   = $request['date'];
        $arr    = DB::select("SELECT a.* FROM mst_machine a LEFT JOIN trx_prod_in b ON a.id=b.id_mc WHERE b.date='$date'");
        return response($arr);
    }

    // Action list effisiensi
    function listeffisiensi(){
        // $field  = $request['field'];
        // $table  = $request['table'];
        $arr    = DB::select("SELECT a.*, b.name FROM trx_eff_machine a LEFT JOIN mst_machine b ON a.id_mc=b.id ORDER BY a.id DESC");
        return response($arr);
    }

    // Action list manpower
    function listmanpower(){
        $arr    = DB::select("SELECT a.*, b.name FROM trx_act_manpower a LEFT JOIN mst_machine b ON a.id_mc=b.id ORDER BY a.id DESC");
        return response($arr);
    }

    // Count Validasi Out
    function countvalidasi(Request $request) : object {
        $date   = $request['date'];
        $id_mc  = $request['id_mc'];
        $in     = collect(\DB::select("SELECT SUM(jml_wo) AS total_wo, SUM(pcs) AS total_pcs, SUM(kg) AS total_kg FROM trx_prod_in WHERE id_mc='$id_mc' AND date='$date'"))->first();
        $out    = collect(\DB::select("SELECT SUM(jml_wo) AS total_wo, SUM(pcs) AS total_pcs, SUM(kg) AS total_kg FROM trx_prod_out WHERE id_mc='$id_mc' AND date='$date'"))->first();
        $sisa   = collect(\DB::select("SELECT SUM(jml_wo) AS total_wo, SUM(pcs) AS total_pcs, SUM(kg) AS total_kg FROM trx_prod_sisa WHERE id_mc='$id_mc' AND date='$date'"))->first();

        $t_wo   = ($in->total_wo+$sisa->total_wo)-$out->total_wo;
        $t_pcs  = ($in->total_pcs+$sisa->total_pcs)-$out->total_pcs;
        $t_kg   = ($in->total_kg+$sisa->total_kg)-$out->total_kg;

        $arr    = array(
            't_wo'  => (int)$t_wo,
            't_pcs' => (int)$t_pcs,
            't_kg'  => (int)$t_kg,
            'o_wo'  => (int)$out->total_wo,
            'o_pcs' => (int)$out->total_pcs,
            'o_kg'  => (int)$out->total_kg,
        );
        return response($arr);
    }

    // Action effisiensi
    function actioncheckeff(Request $request) : object {
        $id_mc      = $request['id_mc'];
        $date       = $request['date'];
        $shift      = $request['shift'];
        $arr        = DB::select("SELECT * FROM trx_eff_machine WHERE id_mc='$id_mc' AND date='$date' AND shift='$shift'");
        return response($arr);
    }

    // Action Cek Man Power
    function actioncheckmanpower(Request $request) : object {
        $id_mc      = $request['id_mc'];
        $date       = $request['date'];
        $shift      = $request['shift'];
        $arr        = DB::select("SELECT * FROM trx_act_manpower WHERE id_mc='$id_mc' AND date='$date' AND shift='$shift'");
        return response($arr);
    }

    // Action List Data
    function actionlistdata(Request $request) : object {
        if($request['id'] == 0 || $request['id'] == null){
            $id     = 1;
        }else{
            $id     = $request['id'];
        }
        $field  = $request['field'];
        $table  = $request['table'];
        $arr    = DB::select("SELECT * FROM $table WHERE $field=$id AND is_active=1 ");
        return response($arr);
    }

    // Data Quartal
    function dataquartal(Request $request) : object {
        $id_material    = $request['id'];
        $arr            = dataquartal($id_material);
        return response($arr);
    }

    // Action Edit
    function actionedit(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $dt         = $request['dats'];
        if($table == 'users'){
            $data   = array(
                'username'  => $dt['username'],
                'password'  => Hash::make($dt['password']),
                'pass'      => $dt['password'],
                'role_id'   => $dt['role_id'],
                'name'      => $dt['name'],
                'email'     => $dt['email'],
                'no_tlp'    => $dt['no_tlp'],
                'foto'      => $dt['foto'],
                'update_by' => auth::user()->id,
            );
        }else{
            $data   = $request['dats'];
        }

        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    function actioneditwmulti(Request $request) : object {
        $table      = $request['table'];
        $id1        = $request['id1'];
        $whr1       = $request['whr1'];
        $id2        = $request['id2'];
        $whr2       = $request['whr2'];
        $data       = $request['dats'];

        DB::table($table)->where($whr1, $id1)->where($whr2, $id2)->update($data);
        return response('success');
    }

    // Action Delete
    function actiondelete(Request $request) : object {
        $table      = $request['table'];
        $id         = $request['id'];
        $whr        = $request['whr'];
        $data   = array(
            'is_active' => 0,
            'update_by' => auth::user()->id,
        );
        DB::table($table)->where($whr, $id)->update($data);
        return response('success');
    }

    // Action Show Data
    function actionshowdata(Request $request) : object {
        $id     = $request['id'];
        $field  = $request['field'];
        $table  = $request['table'];
        $arr['data']    = DB::table($table)->where($field, $id)->first();
        return response($arr);
    }

    function actionshowdatawmulti(Request $request) : object {
        $id1     = $request['id1'];
        $field1  = $request['field1'];
        $id2     = $request['id2'];
        $field2  = $request['field2'];
        $table   = $request['table'];
        $arr['data']    = DB::table($table)->where($field1, $id1)->where($field2, $id2)->first();
        return response($arr);
    }

    // Tes Looping
    function tesmain(){
        $id     = 0;
        $start  = '2023-11-17';
        $end    = '2023-11-22';
        $arr    = dataactmanpower($start, $end);
        echo "<pre>";print_r($arr);exit;
    }
}

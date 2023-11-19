<?php
    // Ubah menjadi format tanggal indo
    function indFormat($tanggal){
        return \Carbon\Carbon::parse($tanggal)->format('d-m-Y');
    }

    // Action Update Data
    function actionupdate($table,$id,$data){
        DB::table($table)->where('id', $id)->update($data);
    }
    // End Action

    //Action Cek Data
    function cekdata($data){
        $table      = $data['table'];
        $whr        = $data['whr'];
        $id         = $data['id'];

        $arr['row'] = collect(\DB::select("SELECT * FROM $table WHERE $whr='$id'"))->first();

        return $arr;
    }
    //End Action Cek Data

    function dataprodpcs($id,$start,$end){
        $mc         = DB::select("SELECT * FROM mst_machine");
        $date_now   = date('Y-m-d');

        if($id == null || $id == 0){
            foreach ($mc as $key => $val){
                $cat[]      = $val->name;
                $arrin      = DB::table('trx_prod_in')->selectRaw('SUM(pcs) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $in[]       = (int)$arrin->jml;
                $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(pcs) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $out[]      = (int)$arrout->jml;
                $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(pcs) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $sisa[]      = (int)$arrsisa->jml;
            }
        }else{

            $start_timestamp    = strtotime($start);
            $end_timestamp      = strtotime($end);
            $array_tanggal = array();
            for($current_timestamp = $start_timestamp; $current_timestamp <= $end_timestamp; $current_timestamp += 86400){
                $tanggal = date("Y-m-d", $current_timestamp);
                array_push($array_tanggal, $tanggal);
            }

            foreach ($array_tanggal as $tanggal) {
                $cat[]      = indFormat($tanggal)."\n";
                $arrin      = DB::table('trx_prod_in')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $in[]       = (int)$arrin->jml;
                $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $out[]      = (int)$arrout->jml;
                $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $sisa[]      = (int)$arrsisa->jml;
            }
        }

        $data['category']   = $cat;
        $data['in']         = $in;
        $data['out']        = $out;
        $data['sisa']       = $sisa;
        return $data;
    }

    function dataprodkg($id,$start,$end){
        $mc         =  DB::select("SELECT * FROM mst_machine");
        $date_now   = date('Y-m-d');

        if($id == null || $id == 0){
            foreach ($mc as $key => $val){
                $cat[]      = $val->name;
                $arrin      = DB::table('trx_prod_in')->selectRaw('SUM(kg) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $in[]       = (int)$arrin->jml;
                $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(kg) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $out[]      = (int)$arrout->jml;
                $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(kg) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $sisa[]      = (int)$arrsisa->jml;
            }
        }else{
            $start_timestamp    = strtotime($start);
            $end_timestamp      = strtotime($end);
            $array_tanggal = array();
            for($current_timestamp = $start_timestamp; $current_timestamp <= $end_timestamp; $current_timestamp += 86400){
                $tanggal = date("Y-m-d", $current_timestamp);
                array_push($array_tanggal, $tanggal);
            }

            foreach ($array_tanggal as $tanggal) {
                $cat[]      = indFormat($tanggal)."\n";
                $arrin      = DB::table('trx_prod_in')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $in[]       = (int)$arrin->jml;
                $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $out[]      = (int)$arrout->jml;
                $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $sisa[]     = (int)$arrsisa->jml;
            }
        }



        $data['category']   = $cat;
        $data['in']         = $in;
        $data['out']        = $out;
        $data['sisa']       = $sisa;
        return $data;
    }

    function dataeffmachine($id,$start,$end){
        $mc         =  DB::select("SELECT * FROM mst_machine");
        $date_now   = date('Y-m-d');
        // $date_now   = '2023-11-18';

        if($id == null || $id == 0){
            foreach ($mc as $key => $val){
                $cat[]      = $val->name;
                $shift1     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $date_now)->where('id_mc', $val->id)->where('shift', '1')->first();
                $shift2     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $date_now)->where('id_mc', $val->id)->where('shift', '2')->first();
                $dshift1[]  = ((int)$shift1->jml/8)*100;
                $dshift2[]  = ((int)$shift2->jml/7)*100;
            }
        }else{
            $start_timestamp    = strtotime($start);
            $end_timestamp      = strtotime($end);
            $array_tanggal = array();
            for($current_timestamp = $start_timestamp; $current_timestamp <= $end_timestamp; $current_timestamp += 86400){
                $tanggal = date("Y-m-d", $current_timestamp);
                array_push($array_tanggal, $tanggal);
            }

            foreach ($array_tanggal as $tanggal) {
                $cat[]      = indFormat($tanggal)."\n";
                $shift1     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $tanggal)->where('id_mc', $id)->where('shift', '1')->first();
                $shift2     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $tanggal)->where('id_mc', $id)->where('shift', '2')->first();
                $dshift1[]  = ((int)$shift1->jml/8)*100;
                $dshift2[]  = ((int)$shift2->jml/7)*100;
            }
        }

        $data['category']   = $cat;
        $data['shift1']     = $dshift1;
        $data['shift2']     = $dshift2;
        return $data;
    }

    function dataactmanpower($start,$end){
        $date_now   = date('Y-m-d');

        if($start == null || $start == 0){
            $start_timestamp    = strtotime(date('Y-m-d', strtotime($date_now . ' -6 days')));
            $end_timestamp      = strtotime($date_now);
        }else{
            $start_timestamp    = strtotime($start);
            $end_timestamp      = strtotime($end);
        }
        $array_tanggal = array();
        for($current_timestamp = $start_timestamp; $current_timestamp <= $end_timestamp; $current_timestamp += 86400){
            $tanggal = date("Y-m-d", $current_timestamp);
            array_push($array_tanggal, $tanggal);
        }

        foreach ($array_tanggal as $tanggal) {
            $c_cts1     = 0;
            $c_cts2     = 0;
            $c_mcs1     = 0;
            $c_mcs2     = 0;
            $cat[]      = indFormat($tanggal)."\n";
            $a_cts1     = DB::select("SELECT a.id_manpower FROM trx_act_manpower a LEFT JOIN mst_machine b ON a.id_mc=b.id WHERE b.type='CUTTING' AND a.date='$tanggal' AND a.shift='1'");
            foreach($a_cts1 as $k => $v){
                $b_cts1 = json_decode($v->id_manpower);
                $c_cts1 += count($b_cts1);
            }
            $cts1[]     = (int)$c_cts1;

            $a_cts2     = DB::select("SELECT a.id_manpower FROM trx_act_manpower a LEFT JOIN mst_machine b ON a.id_mc=b.id WHERE b.type='CUTTING' AND a.date='$tanggal' AND a.shift='2'");
            foreach($a_cts2 as $k => $v){
                $b_cts2 = json_decode($v->id_manpower);
                $c_cts2 += count($b_cts2);
            }
            $cts2[]     = (int)$c_cts2;
            $ct[]       = (int)$c_cts1+$c_cts2;

            $a_mcs1     = DB::select("SELECT a.id_manpower FROM trx_act_manpower a LEFT JOIN mst_machine b ON a.id_mc=b.id WHERE b.type='MACHINING' AND a.date='$tanggal' AND a.shift='1'");
            foreach($a_mcs1 as $k => $v){
                $b_mcs1 = json_decode($v->id_manpower);
                $c_mcs1 += count($b_mcs1);
            }
            $mcs1[]     = (int)$c_mcs1;

            $a_mcs2     = DB::select("SELECT a.id_manpower FROM trx_act_manpower a LEFT JOIN mst_machine b ON a.id_mc=b.id WHERE b.type='MACHINING' AND a.date='$tanggal' AND a.shift='2'");
            foreach($a_mcs2 as $k => $v){
                $b_mcs2 = json_decode($v->id_manpower);
                $c_mcs2 += count($b_mcs2);
            }
            $mcs2[]     = (int)$c_mcs2;
            $mc[]       = (int)$c_mcs1+$c_mcs2;
        }
        

        $data['category']   = $cat;
        $data['ct']         = $ct;
        $data['cts1']       = $cts1;
        $data['cts2']       = $cts2;
        $data['mc']         = $mc;
        $data['mcs1']       = $mcs1;
        $data['mcs2']       = $mcs2;
        return $data;
    }

    // Quartal
    function dataquartal($id_material){
        $year           = date('Y');
        if($id_material == 0 || $id_material == null){
            $id_material    = 1;
        }else{
            $id_material    = $id_material;
        }
        $qry            = DB::select("SELECT * FROM trx_quartal WHERE id_material=$id_material ORDER BY thn ASC");
        $dats           = DB::table('mst_material')->where('id', $id_material)->first();
    
        foreach($qry as $key => $val){
    
            // Quartal 1
            $cat[]      = "Q1 <br>".$val->thn;
            $base[]     = $val->q1_base;
            $alloy[]    = $val->q1_alloy;
            $cnf[]      = $val->q1_cnf;
            $freight[]  = $val->q1_freight;
            // End Quartal 1
    
            // Quartal 2
            $cat[]      = "Q2 <br>".$val->thn;
            $base[]     = $val->q2_base;
            $alloy[]    = $val->q2_alloy;
            $cnf[]      = $val->q2_cnf;
            $freight[]  = $val->q2_freight;
            //ENd Quartal 2
    
            // Quartal 3
            $cat[]      = "Q3 <br>".$val->thn;
            $base[]     = $val->q3_base;
            $alloy[]    = $val->q3_alloy;
            $cnf[]      = $val->q3_cnf;
            $freight[]  = $val->q3_freight;
            //End Quartal 3
    
            //Quartal 4
            $cat[]      = "Q4 <br>".$val->thn;
            $base[]     = $val->q4_base;
            $alloy[]    = $val->q4_alloy;
            $cnf[]      = $val->q4_cnf;
            $freight[]  = $val->q4_freight;
            //End Quartal 4
    
        }
    
        $data['category']       = $cat;
        $data['dt_base']        = $base;
        $data['dt_alloy']       = $alloy;
        $data['dt_cnf']         = $cnf;
        $data['dt_freight']     = $freight;
        $data['material_name']  = $dats->grade;
        return $data;
    }
    
?>

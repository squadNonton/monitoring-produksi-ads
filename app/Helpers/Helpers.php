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

        if($id == null || $id == 0){
            foreach ($mc as $key => $val){
                $cat[]      = $val->name;
                $shift1     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $date_now)->where('id_mc', $val->id)->where('shift', '1')->first();
                $shift2     = DB::table('trx_eff_machine')->selectRaw('SUM(waktu) as jml')->where('date', $date_now)->where('id_mc', $val->id)->where('shift', '2')->first();
                $eff[]      = (int)number_format(((((int)$shift1->jml/8)+((int)$shift2->jml/7))/2)*100, 2);
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
                $eff[]      = (int)number_format(((((int)$shift1->jml/8)+((int)$shift2->jml/7))/2)*100, 2);
            }
        }

        $data['category']   = $cat;
        $data['eff']        = $eff;
        return $data;
    }

    function dataactmanpower($id,$start,$end){
        $mc         =  DB::select("SELECT * FROM mst_machine");
        $date_now   = date('Y-m-d');


        if($id == null || $id == 0){
            foreach ($mc as $key => $val){
                $cat[]      = $val->name;
                $arr        = DB::table('trx_act_manpower')->selectRaw('SUM(man_power) as jml')->where('date', $date_now)->where('id_mc', $val->id)->first();
                $mp[]      = (int)$arr->jml;
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
                $arr        = DB::table('trx_act_manpower')->selectRaw('SUM(man_power) as jml')->where('date', $tanggal)->where('id_mc', $id)->first();
                $mp[]      = (int)$arr->jml;
            }
        }

        $data['category']   = $cat;
        $data['mp']         = $mp;
        return $data;
    }
    
?>

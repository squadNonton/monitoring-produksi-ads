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

    function dataprodpcs($id){

        $tanggal_sekarang = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
        $array_tanggal = array();
        for ($i = 6; $i >= 1; $i--) {
            $tanggal = date('Y-m-d', strtotime("-$i days", strtotime($tanggal_sekarang)));
            array_push($array_tanggal, $tanggal);
        }

        foreach ($array_tanggal as $tanggal) {
            $cat[]      = indFormat($tanggal)."\n";
            $arrsch     = DB::table('trx_prod_in')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->first();
            $sch[]      = (int)$arrsch->jml;
            $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->first();
            $sisa[]     = (int)$arrsisa->jml;;
            $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(pcs) as jml')->where('date', $tanggal)->first();
            $out[]      = (int)$arrout->jml;;
        }


        $data['category']       = $cat;
        $data['schedule']       = $sch;
        $data['sisa']           = $sisa;
        $data['out']            = $out;
        return $data;
    }

    function dataprodkg($id){

        $tanggal_sekarang = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
        $array_tanggal = array();
        for ($i = 6; $i >= 1; $i--) {
            $tanggal = date('Y-m-d', strtotime("-$i days", strtotime($tanggal_sekarang)));
            array_push($array_tanggal, $tanggal);
        }

        foreach ($array_tanggal as $tanggal) {
            $cat[]      = indFormat($tanggal)."\n";
            $arrsch     = DB::table('trx_prod_in')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->first();
            $sch[]      = (int)$arrsch->jml;
            $arrsisa    = DB::table('trx_prod_sisa')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->first();
            $sisa[]     = (int)$arrsisa->jml;;
            $arrout     = DB::table('trx_prod_out')->selectRaw('SUM(kg) as jml')->where('date', $tanggal)->first();
            $out[]      = (int)$arrout->jml;;
        }


        $data['category']       = $cat;
        $data['schedule']       = $sch;
        $data['sisa']           = $sisa;
        $data['out']            = $out;
        return $data;
    }

?>

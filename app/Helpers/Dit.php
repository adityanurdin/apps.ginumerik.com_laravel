<?php

namespace App\Helpers;

use Auth;
use \App\Log;


class Dit 
{

    public static function Rupiah($value) 
    {

        return "Rp. " . number_format($value,2,',','.');

    }

    public static function penyebut($nilai)
    {
        $nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = Self::penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = Self::penyebut($nilai/10)." puluh". Self::penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . Self::penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = Self::penyebut($nilai/100) . " ratus" . Self::penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . Self::penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = Self::penyebut($nilai/1000) . " ribu" . Self::penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = Self::penyebut($nilai/1000000) . " juta" . Self::penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = Self::penyebut($nilai/1000000000) . " milyar" . Self::penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = Self::penyebut($nilai/1000000000000) . " trilyun" . Self::penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
    }

    public static function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(Self::penyebut($nilai));
		}     		
		return $hasil;
	}

	public static function encode($value)
	{
		$encode = base64_encode('LTCD/'.$value);
		return $encode;
	}

	public static function decode($value)
	{
		$decode = base64_decode($value);
		$parsing = explode('/', $decode);
		$data = $parsing[1];
		return $data;
	}

	public static function Log($status, $msg, $status_log)
	{
		$user_id = Auth::user()->id;

		$log = Log::create([
			'user_id' => $user_id,
			'status'  => $status,
			'msg'	  => $msg,
			'status_log'  => $status_log,
		]);

		if ($log) {
            $result = [
                'status' => true,
                'msg'    => 'Success create logs',
                'data'   => $log
            ];
            $code   = 200;
        } else {
            $result = [
                'status' => false,
                'msg'    => 'Failed create logs',
                'data'   => $log
            ];
            $code   = 500;
        }
        
        return response()->json($result, $code);
	}

}

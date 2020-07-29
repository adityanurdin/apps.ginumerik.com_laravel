<?php

namespace App\Helpers;

use Auth;
use \App\Log;
use \App\Models\Finance;


class Dit 
{

    public static function Rupiah($value) 
    {
		if ($value > 0) {
			return "Rp. " . number_format($value,2,',','.');
		} else {
			return "Rp. #N/A";
		}

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
		return ucfirst($hasil);
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

	public static function GrandTotal($id)
	{
		$finance = Finance::find($id);
		if ($finance) {
			// $pre_grand_total = $finance->total_bayar - $finance->discount + $finance->tat;
			$pre_grand_total = $finance->total_bayar + $finance->pph - $finance->discount;
			$ppn			 = $pre_grand_total * 0.1;
			$grand_total 	 = $pre_grand_total + $ppn + $finance->tat;

			return $grand_total;
		}else {
			exit();
		}
	}

	public static function PPn($id)
	{
		$finance = Finance::find($id);
		if($finance) {
			// $subtotal = $finance->total_bayar - $finance->discount + $finance->tat;
			$subtotal = $finance->total_bayar + $finance->pph - $finance->discount;
			$ppn	  = $subtotal * 0.1;
			return $ppn;
		} else {
			exit();
		}
	}

	public static function Roman($num) 
	{
		$n = intval($num);
		$result = ''; 
	 
		$lookup = array(
			'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 
			'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 
			'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1
		); 
	 
		foreach ($lookup as $roman => $value)  
		{
			$matches = intval($n / $value);
			$result .= str_repeat($roman, $matches);
			$n = $n % $value; 
		} 
	
		return $result;

	}

}

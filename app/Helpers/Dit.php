<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use Auth;
use \App\Log;
use \App\Models\Finance;
use \App\Models\HistoryPembayaran;
use \App\Models\Order;
use \App\Models\KartuAlat;
use \App\Models\Barang;
use \App\SerahTerima;
use \App\Setting;
use Str;
use Carbon\Carbon;
use Storage;



class Dit 
{

	/* public static function ImageName($path, $extension)
    {
        $fileName = Carbon::now()->timestamp;
        while (Storage::disk('public')->exists($path . $fileName . $extension)) {
            $fileName = Carbon::now()->timestamp;
        }

        return $path . $fileName . '.' . $extension;
	}
	
	public static function UploadImage(Request $request, $field, $path)
    {
        $file = $request->file($field);
        $path = $path . '/'. date('Y') . '/' . date('F') . '/';
        $full_path = Self::ImageName($path, $file->getClientOriginalExtension());

        $image = Image::make($file)->encode($file->getClientOriginalExtension(), 75);
        Storage::disk('public')->put($full_path, $image, 'public');

        return $full_path;
    } */

    public static function Rupiah($value, $rp = true) 
    {
		if ($value > 0) {
			$result = number_format($value,2,',','.');
		} else {
			$result = "#N/A";
		}

		if ($rp == true) {
			return "Rp. ".$result;
		} else {
			return $result;
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
			$hasil = "minus ". trim(Self::penyebut($nilai));
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
		$data = substr($decode, 5);
		return $data;
	}

	public static function Log($status, $msg, $status_log)
	{
		$user_id = Auth::user()->id;

		$log = Log::create([
			'user_id' => $user_id,
			'status'  => $status,
			'msg'	  => $msg,
			'status_log'  => ucfirst($status_log),
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
			// new 
			$total 		= $finance->total_bayar;
			$discount 	= $finance->discount;
			$subtotal	= $total - $discount;
			$ppn		= $subtotal * 0.1;
			$pph		= $subtotal * 0.02;
			$tat		= $finance->tat;
			
			if($finance->pph == 'on') {
				$grand_total = ( $subtotal + $ppn ) - $pph + $tat;
			} else {
				$grand_total = ( $subtotal + $ppn ) + $tat;
			}
			
			return $grand_total;
		}else {
			exit();
		}
	}

	public static function sisaBayar($id)
	{
		$finance = Finance::find($id);

		$sisa_bayar = $finance->sisa_bayar;
		// $discount	= 
		
		return $result;
	}

	public static function PPn($id)
	{
		$finance = Finance::find($id);
		if($finance) {
			// $subtotal = $finance->total_bayar - $finance->discount + $finance->tat;

			//remove PPH
			$subtotal = $finance->total_bayar - $finance->discount;
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

	public static function Checked($name, $value)
	{
		if ($name == $value) {
			return 'checked';
		} else {
			return '';
		}
	}
	
	public static function Selected($name, $value, $option = '')
	{
		if ($name == $value) {
			return 'Selected '.$option;
		} else {
			return '';
		}
	}

	public static function Remove_($text, $opt = '')
	{
		return ucfirst(str_replace('_', ' ', $text));
	}

	public static function Setting($value)
	{
		$setting = Setting::where('key', $value)->first('value');
		if ($setting) {
			return $setting->value;
		} else {
			$setting = Setting::where('key', $value)->first();
			return $setting;
		}

	}

	public static function setSetting($request, $value)
	{
		if (Self::Setting($value)) {
            Setting::where('key', $value)->update([
                'value' => $request->$value
            ]);
        } else {
            Setting::create([
                'key'   => $value,
                'value' => $request->$value
            ]);
        }
	}

	public static function getUser($id)
	{
		$user = \App\User::find($id);

		return $user;
	}

	public static function getRole($id)
	{
		$user = \App\User::find($id);
		$role = $user->role;

		if ( $role == 'TEK') {
			$role = 'Teknis';
		} else if ($role == 'ADMIN') {
			$role = 'Admin System';
		} else if ($role == 'FIN') {
			$role = 'Finance';
		} else if ($role == 'ADM'){
			$role = 'Administrasi';
		}
		return $user->sub_role;
	}

	public static function getLab($lab)
	{
		if ($lab == 'in_lab') {
			$lab = 'In-Lab';
		} else if ($lab == 'on_site') {
			$lab = 'On-Site';
		} else if ($lab == 'sub_con') {
			$lab = 'Sub-Contractor';
		}

		return $lab;
	}

	public static function getStatusAlat($alat)
	{
		if ($alat == 'alat_datang') {
			$result = 'Alat Datang';
		} elseif ($alat == 'belum_datang') {
			$result = 'Belum Datang';
		}

		return $result;
	}

	public static function getStatusTeknis($sub_role_block, $second = NULL)
	{
		$sub_role = Auth::user()->sub_role;
		
		if ($sub_role == $sub_role_block) {
			return 'disabled';
		} else if (!is_null($second)) {
			if ($sub_role == $second) {
				return 'disabled';
			}
		}
	}

	public static function changeMonth($month)
	{
		if ($month === 1) {
			return 'Januari';
		} else if ($month === 2) {
			return 'Februari';
		} else if ($month === 3) {
			return 'Maret';
		} else if ($month === 4) {
			return 'April';
		} else if ($month === 5) {
			return 'Mei';
		} else if ($month === 6) {
			return 'Juni';
		} else if ($month === 7) {
			return 'Juli'; 
		} else if ($month === 8) {
			return 'Agustus';
		} else if ($month === 9) {
			return 'September';
		} else if ($month === 10) {
			return 'Oktober';
		} else if ($month === 11) {
			return 'November';
		} else if ($month === 12) {
			return 'Desember';
		}
	}

	public static function checkSerahTerima($id)
	{
		$order = Order::with('serahterima')->find($id);

		if(isset($order->serahterima['id'])) {
			if ($order->serahterima['id_upk_penerima'] == NULL) {
				return false;
			} else if ($order->serahterima['id_upk_penyerah'] == NULL) {
				return false;
			} else if ($order->serahterima['id_lab_penerima'] == NULL) {
				return false;
			} else if ($order->serahterima['id_lab_penyerah'] == NULL) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}

	}

	public static function getOrderByBarang($id)
	{
		$order = Barang::with(['barangs'])->find($id);
		return $order;
	}

	public static function checkKartuAlatByBarang($id, $order_id)
	{
		$barang = Barang::with(['KartuAlat'])->find($id);
		$kartu_alat = $barang->KartuAlat;
		if (is_null($barang->AS)) {
			// check kartu alat
			if ($kartu_alat['paraf_alat'] == '*') {
				if($kartu_alat['paraf_sertifikat'] == '*') {
					return '<a href="'.route('administrasi.force-as', [$id, $order_id]).'" data-toggle="tooltip" title="Klik jika bermasalah dengan AS ?"><i class="fas fa-question-circle"></i></a>';
				} else {
					return 'A';
				}
			}
		} else {
			return $barang->AS;
		}
	}

	public static function lagChecking()
	{
		try {

			// ambil data $orders diurutkan dari tanggal tertua ke termuda
			$orders = Order::orderBy('created_at', 'ASC')->get();
			// Melalukan perulangan terhadap data $orders
			foreach ($orders as $order) {
				
				// Melakukang perulangan terhadap data barang
				foreach($order->barangs as $item) {
					// Ambil data $barang berdasarkan id barang dan status batal = 0
					$barang = Barang::whereId($item->id)
                                ->where('status_batal', '0')
								->where('status_alat', 'belum_datang')
                                ->first();

					$kartu_alat = KartuAlat::where('barang_id', $item->id)->first();
					\Log::info($kartu_alat);

					// Melakukan validasi paraf alat
					/* if ($barang->KartuAlat['paraf_alat'] == NULL) {

						// Melakukan validasi status kedatangan alat
						if ($barang->status_alat == "alat_datang") {

							# Inisialisasi lama hari kerja
							$hari_kerja = $order->hari_kerja;
							# Inisialisasi hari ini 
							$hari_ini = strtotime(date('Y-m-d'));
							# Inisialisasi tgl masuk barang
							$tgl_barang_masuk = strtotime($barang->created_at);

							\Log::info('lag bertambah pada id '.$barang->id.': ' . $tgl_barang_masuk);
							
						} else {
							// Alat belum datang
							\Log::info('Alat belum datang');
						}
					} else {
						// alat sudah di paraf oleh teknis
						\Log::info('Alat sudah di paraf oleh teknis');
					} */

				}

			}

		} catch (\Throwable $th) {
			\Log::error($th);
		}
	}

}

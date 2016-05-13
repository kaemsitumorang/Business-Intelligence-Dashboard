<?php

namespace App\Http\Controllers;
use DB;
use App\Debitur;
use App\Kredit;
use File;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function index(){
        $debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->get();
        $debiturDiterima = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->where('approved', '=', "y")->get();
        $debiturDitolak = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->where('approved', '=', "n")->get();
        $totalTransaction = DB::table('kredits')->count();
        $thisMonth = date('m');
        $thisMonthString = date('M');
        // $today = date('Y-m-d');
        $transactionThisMonth=DB::table("kredits")->whereMonth('tanggalpinjam', '=', $thisMonth)->count();
        $transactionPending=DB::table("kredits")->where('approved', '=', "notset")->count();
        // dd($today);
        $transactionJanuary=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "01")->count();
        $transactionFebruary=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "02")->count();
        $transactionMarch=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "03")->count();
        $transactionApril=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "04")->count();
        $transactionMay=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "05")->count();

        $transactionJanuaryYes=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "01")->where('approved', '=', "y")->count();
        $transactionJanuaryNo=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "01")->where('approved', '=', "n")->count();
        $transactionFebruaryYes=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "02")->where('approved', '=', "y")->count();
        $transactionFebruaryNo=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "02")->where('approved', '=', "n")->count();
        $transactionMarchYes=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "03")->where('approved', '=', "y")->count();
        $transactionMarchNo=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "03")->where('approved', '=', "n")->count();
        $transactionAprilYes=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "04")->where('approved', '=', "y")->count();
        $transactionAprilNo=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "04")->where('approved', '=', "n")->count();
        $transactionMayYes=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "05")->where('approved', '=', "y")->count();
        $transactionMayNo=DB::table("kredits")->whereMonth('tanggalpinjam', '=', "05")->where('approved', '=', "n")->count();


        return view('home', compact('debitur', 'debiturDiterima', 'debiturDitolak', 'totalTransaction', 'transactionThisMonth', 'thisMonthString', 'transactionJanuary', 'transactionFebruary', 'transactionMarch', 'transactionApril', 'transactionMay', 'transactionJanuaryNo', 'transactionJanuaryYes', 'transactionFebruaryYes', 'transactionFebruaryNo', 'transactionMarchYes', 'transactionMarchNo', 'transactionAprilYes', 'transactionAprilNo', 'transactionMayYes', 'transactionMayNo', 'transactionPending'));
    }
    public function showdebitur(){
    	$debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->orderBy('debiturs.created_at', 'desc')->paginate(20);
    	return view('pages/debitur', compact('debitur'));
    }
    public function showdebiturnew(){
        $debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->where('approved', '=', "notset")->paginate(20);
        return view('pages/debitur_new', compact('debitur'));
    }
    public function storedebitur(Request $request){
        $input = $request->all();
        $nama=$input['nama'];
        $no_ktp=$input['no_ktp'];
        $gaji=$input['gaji'];
        $tanggungan=$input['tanggungan'];
        $ttl=$input['ttl'];
        $gender=$input['gender'];
        $occupation=$input['occupation'];
        $pinjaman=$input['pinjaman'];
        $kebutuhan=$input['kebutuhan'];
        $today = date('Y-m-d');
        $id=debitur::create(['nama' => $nama, 'no_ktp' => $no_ktp, 'ttl' => $ttl,'gaji' => $gaji, 'tanggungan' => $tanggungan, 'kebutuhan' => $kebutuhan, 'gender' => $gender, 'occupation' => $occupation,])->id;
        kredit::create(['status' => "Pending", 'approved' => "notset", 'id_debitur' => $id, 'pinjaman' => $pinjaman, 'tanggalpinjam' => $today]);
    	return redirect('debitur-new');
    }
    public function forecastdebitur($id)
    {
        $debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->where('kredits.id', '=', $id)->get();
        $yes = null;
        $no = null;

        foreach ($debitur as $debiturs) {

            if($debiturs->gaji >= 4881456) {
                if($debiturs->gaji >= 6836770) {
                    if($debiturs->pinjaman >= 1000000 && $debiturs->pinjaman <= 10000000){
                        $yes = 4/82;
                    }
                    elseif ($debiturs->pinjaman >= 10000001 && $debiturs->pinjaman <= 30000000) {
                        $yes = 15/82;
                    }
                    elseif ($debiturs->pinjaman >= 30000001 && $debiturs->pinjaman <= 50000000) {
                        $yes = 10/82;
                    }
                    elseif ($debiturs->pinjaman >= 50000001 && $debiturs->pinjaman <= 70000000) {
                        $yes = 14/82;
                    }
                    else {
                        if ($debiturs->tanggungan <= 3) {
                            $yes = 7/82;
                        }
                        else {
                            if ($debiturs->gaji > 8966787) {
                                $yes = 5/82;
                            }
                            else {
                                $no = 3/118;
                            }

                        }
                    }

                }
                else {
                    if ($debiturs->tanggungan > 4) {
                        $no = 8/118;
                    }
                    else {
                        if($debiturs->pinjaman >= 1000000 && $debiturs->pinjaman <= 10000000){
                            $yes = 1/82;
                        }
                        elseif ($debiturs->pinjaman >= 10000001 && $debiturs->pinjaman <= 30000000) {
                            $yes = 6/82;
                        }
                        elseif ($debiturs->pinjaman >= 30000001 && $debiturs->pinjaman <= 50000000) {
                            $yes = 5/82;
                        }
                        elseif ($debiturs->pinjaman >= 50000001 && $debiturs->pinjaman <= 70000000) {
                            $yes = 3/82;
                        }
                        else {
                            if ($debiturs->tanggungan > 2) {
                                $no = 4/118;
                            }
                            else {
                                $yes = 5/82;
                            }
                        }
                    }

                }

            }
            else {
                if ($debiturs->tanggungan > 2) {
                    $no = 63/118;
                }
                else {
                    if ($debiturs->gaji <= 3562558) {
                        $no = 32/118;
                    }
                    else {
                        if($debiturs->pinjaman >= 1000000 && $debiturs->pinjaman <= 10000000){
                            $yes = 0;
                        }
                        elseif ($debiturs->pinjaman >= 10000001 && $debiturs->pinjaman <= 30000000) {
                            $yes = 5/82;
                        }
                        elseif ($debiturs->pinjaman >= 30000001 && $debiturs->pinjaman <= 50000000) {
                            $yes = 2/82;
                        }
                        elseif ($debiturs->pinjaman >= 50000001 && $debiturs->pinjaman <= 70000000) {
                            $no = 4/118;
                        }
                        else{
                            $no = 4/118;
                        }
                    }
                }
            }
            }
            if ($yes != null) {
                $yes =$yes*(82/15);
            }
            else{
                $no = $no*(118/63);
            }
        return view ('pages/debitur_forecast', compact('debitur', 'yes', 'no'));
    }
    public function updateapproved($id)
    {
        DB::table('kredits') -> where('id','=', $id) -> update(['approved' => "y"]);
        return redirect ('debitur-new');
    }
    public function updateapproved2($id)
    {
        DB::table('kredits') -> where('id','=', $id) -> update(['approved' => "n"]);
        return redirect ('debitur-new');
    }
    public function deletedebitur($id)
    {
        $id_debitur = DB::table('kredits') -> where('id','=', $id) -> value('id_debitur');
        DB::table('kredits') -> where('id','=', $id) -> delete();
        DB::table('debiturs') -> where('id','=', $id_debitur) -> delete();
        return redirect ('debitur');
    }
    public function insertdata()
    {
        $json = File::get("data/debiturs.json");
        $data = json_decode($json);
        
        foreach ($data as $obj) {
        // dd(date_create($obj->tanggalpinjam));
        $id=debitur::create(['nama' => $obj->nama, 'no_ktp' => $obj->no_ktp, 'ttl' => $obj->ttl,'gaji' => $obj->gaji, 'tanggungan' => $obj->tanggungan, 'kebutuhan' => $obj->kebutuhan, 'gender' => $obj->gender, 'occupation' => $obj->occupation])->id;
        $idk=kredit::create(['status' => "Pending", 'id_debitur' => $id, 'pinjaman' => $obj->pinjaman, 'tanggalpinjam' => $obj->tanggalpinjam, 'approved' => $obj->approved])->id;
        // dd(DB::table('kredits')->where('id', '=', $idk)->value('tanggalpinjam'));
        // break;
        }
        return redirect ('debitur');
    }
}

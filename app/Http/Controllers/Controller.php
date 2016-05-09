<?php

namespace App\Http\Controllers;
use DB;

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

    public function showdebitur(){
    	$debitur = DB::table('debiturs')->get();
    	return view('pages/debitur', compact('debitur'));
    }
    public function storedebitur(Request $request){
        $input = $request->all();
        $nama=$input['nama'];
        $no_ktp=$input['no_ktp'];
        $gaji=$input['gaji'];
        $tanggungan=$input['tanggungan'];
        $kebutuhan=$input['kebutuhan'];
        DB::table('debiturs')->insert(['nama' => $nama, 'no_ktp' => $no_ktp, 'gaji' => $gaji, 'tanggungan' => $tanggungan, 'kebutuhan' => $kebutuhan]);
    	return redirect('debitur');
    }
}

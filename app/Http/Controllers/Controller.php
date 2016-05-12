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
        $debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->paginate(10);
        return view('home', compact('debitur'));
    }
    public function showdebitur(){
    	$debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->paginate(10);
    	return view('pages/debitur', compact('debitur'));
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
        $id=debitur::create(['nama' => $nama, 'no_ktp' => $no_ktp, 'ttl' => $ttl,'gaji' => $gaji, 'tanggungan' => $tanggungan, 'kebutuhan' => $kebutuhan, 'gender' => $gender, 'occupation' => $occupation,])->id;
        kredit::create(['status' => "Pending", 'id_debitur' => $id, 'pinjaman' => $pinjaman,]);
    	return redirect('debitur');
    }
    public function deletedebitur($id)
    {
        DB::table('debiturs') -> where('id','=', $id) -> delete();
        return redirect ('debitur');
    }
    public function insertdata()
    {
        $json = File::get("data/debiturs.json");
        $data = json_decode($json);
        
        foreach ($data as $obj) {
        $id=debitur::create(['nama' => $obj->nama, 'no_ktp' => $obj->no_ktp, 'ttl' => $obj->ttl,'gaji' => $obj->gaji, 'tanggungan' => $obj->tanggungan, 'kebutuhan' => $obj->kebutuhan, 'gender' => $obj->gender, 'occupation' => $obj->occupation])->id;
        $idk=kredit::create(['status' => "Pending", 'id_debitur' => $id, 'pinjaman' => $obj->pinjaman, 'tanggalpinjam' => $obj->tanggalpinjam])->id;
        // dd(DB::table('kredits')->where('id', '=', $idk)->value('tanggalpinjam'));
        // break;
        }
        return redirect ('debitur');
    }
}

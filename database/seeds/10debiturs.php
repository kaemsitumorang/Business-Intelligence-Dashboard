<?php
namespace App\Http\Controllers;
use DB;
use App\Debitur;
use App\Kredit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class 10debiturs extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$json = File::get("database/data/debiturs.json");
dd($json);
$data = json_decode($json);
foreach ($data as $obj) {
debitur::create(['nama' => $nama, 'no_ktp' => $no_ktp, 'ttl' => $ttl,'gaji' => $gaji, 'tanggungan' => $tanggungan, 'kebutuhan' => $kebutuhan, 'gender' => $gender, 'occupation' => $occupation]);
}
}
}
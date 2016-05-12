<?php
namespace App\Http\Controllers;
use DB;
use App\Debitur;
use Illuminate\Database\Seeder;

class KreditsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/debiturs.json");
		$data = json_decode($json);
		foreach ($data as $obj) {
		debitur::create(['nama' => $data->nama, 'no_ktp' => $data->no_ktp, 'ttl' => $data->ttl,'gaji' => $data->gaji, 'tanggungan' => $data->tanggungan, 'kebutuhan' => $data->kebutuhan, 'gender' => $data->gender, 'occupation' => $data->occupation]);
		}
    }
}

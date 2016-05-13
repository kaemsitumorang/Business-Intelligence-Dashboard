if ($bol == true){
if($result == 0)
{
# MENAMBAHKAN USER BARU
$newUser = new users;
$newUser->username = $usernameSSO;
$newUser->nama = $nameSSO;
$newUser->role = $roleSSO;
$newUser->save();
# MENAMBAHKAN MAHASISWA
if($newUser->role == "mahasiswa")
{
$newMahasiswa = new mahasiswas;
$newMahasiswa->username = $newUser->username;
$newMahasiswa->npm = $user->npm;
$newMahasiswa->save();
}
# MENAMBAHKAN STAFF
else
{
$newStaff = new staffs;
$newStaff->username = $newUser->username;
$newStaff->nip = $user->nip;
$newStaff->save();
}
}
$email = DB::table('mahasiswas')->where('username', '=', $usernameSSO)->value('email');
$no_hp = DB::table('mahasiswas')->where('username', '=', $usernameSSO)->value('no_hp');
$roledatabase = DB::table('users')->where('username', '=', $usernameSSO)->value('role');
return view('action.home', ['username' => $usernameSSO, 'role' => $roledatabase, 'email' => $email, 'no_hp' => $no_hp]);
}
<?php
$debitur = DB::table('debiturs')->join('kredits', 'debiturs.id', '=', 'kredits.id_debitur' )->where('id_debitur', '=', $id)->get();
$yes = 0;
$no = 0;
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

?>
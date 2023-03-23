<?php 
  $bulanIndo =[
        '01' => 'januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

         $query = "SELECT siswa.*,angkatan.* FROM siswa,angkatan WHERE siswa.id_angkatan = angkatan.id_angkatan ORDER BY siswa.id_siswa DESC LIMIT 1";
          $exec = mysqli_query($conn,$query);
          $res = mysqli_fetch_assoc($exec);
          $biaya = $res['biaya'];
          $id_siswa  = $res['id_siswa'];
        $awaltempo = date('Y-m-d');
            for ($i=0 ; $i<36;$i++){
                // tanggal jatuh tempo setiap tanggal 10
                $jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));

                $bulan  = $bulanIndo[date('m' ,strtotime($jatuhtempo))]."  ".date('Y', strtotime($jatuhtempo));
                // simpan data
                $add = mysqli_query($conn,"INSERT INTO pembayaran(id_siswa , jatuhtempo, bulan, jumlah) VALUES ('$id_siswa','$jatuhtempo','$bulan','$biaya')");
                
            }
?>
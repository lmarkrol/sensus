<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../../config/database.php";
// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
   if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
               $kk                = mysqli_real_escape_string($mysqli, trim($_POST['kk']));
             $nik                 = mysqli_real_escape_string($mysqli, trim($_POST['nik']));
            $nama                 = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jenis_kel            = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
             $tempat              = mysqli_real_escape_string($mysqli, trim($_POST['tempat']));
              $status             = mysqli_real_escape_string($mysqli, trim($_POST['status']));
               $agama             = mysqli_real_escape_string($mysqli, trim($_POST['agama']));
               $hubungan          = mysqli_real_escape_string($mysqli, trim($_POST['hub']));
            
              $pend                = mysqli_real_escape_string($mysqli, trim($_POST['pend']));
               $pekerjaan          = mysqli_real_escape_string($mysqli, trim($_POST['pekerjaan']));
                $ket               = mysqli_real_escape_string($mysqli, trim($_POST['ket']));
                $rt                = mysqli_real_escape_string($mysqli, trim($_POST['rt']));
                 $rw               = mysqli_real_escape_string($mysqli, trim($_POST['rw']));
                  $no_rumah        = mysqli_real_escape_string($mysqli, trim($_POST['no_rumah']));
               

              $tgl_lahir       = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_lahir']));
            $tgl              = explode('-',$tgl_lahir);
            $tanggal_lahir    = $tgl[2]."-".$tgl[1]."-".$tgl[0];
           
            $created_user            = $_SESSION['id_user'];
            $user            = $_SESSION['nama_user'];

            $nama_file   = $_FILES['data']['name'];
            $ukuran_file = $_FILES['data']['size'];
            $tipe_file   = $_FILES['data']['type'];
            $tmp_file    = $_FILES['data']['tmp_name'];

            // tentukan extension yang diperbolehkan
            $allowed_extensions = array('jpg','jpeg','png','xls','xlsx','pdf','pptx','JPG','docx');

            // Set path folder tempat menyimpan gambarnya
            $path = "../../upload/KK/".$nama_file;

            // check extension
            $file = explode(".", $nama_file);
            $extension = array_pop($file);

            // jika foto tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel siswa
      $query = mysqli_query($mysqli, "INSERT INTO sub(NO_KK,NIK,NAMA,JK,TEMPAT,AGAMA,STATUS,SUSUNAN,PEND,PERKERJAAN,KET,RT,RW,NO_RUMAH) 
   VALUES('$kk','$nik','$nama','$jenis_kel','$tempat','$agama','$status','$hubungan','$pend','$pekerjaan','$ket','$rt','$rw','$no_rumah')")
                                                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../../main.php?module=view_sub&id=".$_POST['kk']."&alert=1");
                }   
            }
            // jika foto diisi
            else {
                // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                if(in_array($extension, $allowed_extensions)) {
                    // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                    if($ukuran_file <= 1000000000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                        // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                        // Proses upload
                        if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                            // Jika gambar berhasil diupload, Lakukan : 
                            // perintah query untuk menyimpan data ke tabel siswa
                            $query = mysqli_query($mysqli, "INSERT INTO kl(NO_KK,,NIK,NAMA,JK,TEMPAT,AGAMA,STATUS,SUSUNAN,PEND,PEKERJAAN,KET,RT,RW,NO_RUMAH,TANGGAL) 
                                            VALUES('$kk','$nik','$nama','$jenis_kel','$tempat','$agama','$status','$hubungan','$pend','$pekerjaan','$ket','$rt','$rw','$no_rumah','$tanggal_lahir')")
                                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    




                            // cek query
                            if ($query) {
                                // jika berhasil tampilkan pesan berhasil update data
                                header("location: ../../../main.php?module=view_pks&alert=1");
                            }
                        } else {
                            // Jika gambar gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../../main.php?module=view_pks&alert=4");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                        header("location: ../../../main.php?module=view_pks&alert=5");
                    }
                } else {
                    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                    header("location: ../../../main.php?module=view_pks&alert=6");
                }
            }
        }   
    } 
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_customer'])) {
                // ambil data hasil submit dari form
                $id_customer         = mysqli_real_escape_string($mysqli, trim($_POST['id_customer']));
                 $corporate         = mysqli_real_escape_string($mysqli, trim($_POST['corporate']));
                 $support             = mysqli_real_escape_string($mysqli, trim($_POST['support']));
                $status             = mysqli_real_escape_string($mysqli, trim($_POST['status_tiket']));
                 $handleby             = mysqli_real_escape_string($mysqli, trim($_POST['handleby']));
             
                
                
                $date                    = date("d-m-Y");
                

                $nama_file   = $_FILES['data']['name'];
                $ukuran_file = $_FILES['data']['size'];
                $tipe_file   = $_FILES['data']['type'];
                $tmp_file    = $_FILES['data']['tmp_name'];

                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png','xls','xlsx','pdf','pptx','JPG');

                // Set path folder tempat menyimpan gambarnya
                $path = "../../upload/support/".$nama_file;

                // check extension
                $file = explode(".", $nama_file);
                $extension = array_pop($file);

                // jika foto tidak diubah
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel siswa
                    $query = mysqli_query($mysqli, "UPDATE is_tiket_new SET  
                                                    status_tiket='$status',
                                                    handleby='$handleby'

                                                   
                 
                                                  WHERE  idtiket = '$id_customer'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));


if ($query) {
    $con=mysql_connect("10.250.193.23","samapps","samapps@321");
mysql_select_db("SAMS",$con);
$SQL="SELECT 
 * FROM 
 `is_tiket_new` a
 

  WHERE a.`createuser` >= CURDATE() && a.`createuser` < (CURDATE() + INTERVAL 1 DAY) 
  and 
  a.divisi='Non Service'
GROUP BY a.idtiket DESC";
$daftar=mysql_query($SQL) or die (mysql_error());
    $laporan="<table width=\"100%\" border=\"1\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    $laporan .="<tr>";
    $laporan .="<td>AM</td><td>NAMA PROJECT</td><td>STATUS</td><td>Create</td>";
    $laporan .="</tr>";
    while($dataku=mysql_fetch_object($daftar))
    {
        $laporan .="<tr>";
        $laporan .="<td>$dataku->am</td><td>$dataku->project_name</td><td>$dataku->status_tiket</td><td>$dataku->createuser</td>";
        $laporan .="</tr>";
    }
    $laporan .="</table>";
$message .= "<html>\n";
$message .= "<meta http-equiv='pragma' content='no-cache'/>\n";
$message .= "<html>\n";
$message .= "<style>
table { 
  border: 0; 
  font-family: arial; 
  font-size:11px; 
} 
th { 
  background-color:yellow; 
  text-align:center     
} 
td { 
  border-bottom:1 solid #000000;
  text-align:center 
} 
.fail { 
  color:#FF0000; 
} 

</style>\n";

$message .= "<body>\n";
$hasil=mysql_query($SQL,$con);
$message .= "<p>Dear<br><i>REKANS<i></p>\n";

$message .= "<center><b>Support Tiket</b></center>\n";
$message .= "<br>\n";
$message .= "<table border=1 style=border-collapse:collapse align=center bordercolor=#003366>";
$message .= " <tr align=center bgcolor=#ddffcc>
  
    <td width=56>AM</td>   
    <td width=56>Nama Project</td>   
    <td width=58>Status</td>
     <td width=58>Create</td>
    </tr>";

WHILE ($res=mysql_fetch_array($hasil)) {
$message .="<tr><td>$res[am]</td><td>$res[project_name]</td><td>$res[status_tiket]</td><td>$res[createuser]</td></tr>";
//$no=$no+1;
}
//echo "$no - $res[1] - $res[2] - $ress[15] - $ress[20] - $ress[35] - $ress[jml]  <br>";
//$no=$no+1;
$message .= "</table>";
$message .= "<br> Terimakasih";
$message .= "<br>\n";
$message .= "</body>\n";
//echo "$message";


$mail = new PHPMailer(true);
                    $mail->IsSMTP();
                    
                    try {
                      $mail->Host       = "10.2.126.85"; //isi dengan host email server
                      $mail->SMTPDebug  = 1;     
                      $mail->SMTPSecure = false;
                      $mail->SMTPAuth   = false;                                 
                     // $mail->AddAddress('fandie_achmad_x@telkomsel.co.id','Fandie Achmad'); 
                      $mail->AddAddress('chairul_arief@telkomsel.co.id','Chairul Arief'); 
                      $mail->AddAddress('alvin_lucian@telkomsel.co.id','Alvin Lucian'); 
                      $mail->AddAddress('anindito_a_sampurno@telkomsel.co.id','Anindito A Sampurno'); 
                      $mail->AddAddress('firman_rasyid@telkomsel.co.id','Firman Rasyid'); 
                      $mail->AddAddress('muhammad_h_hizburrahman@telkomsel.co.id','Muhammad H Hizburrahman'); 
                      $mail->AddAddress('revin_r_nurfadly@telkomsel.co.id','Revin R Nurfadly'); 
                       $mail->AddAddress('Jafar_Shodiq@telkomsel.co.id','Jafar Shodiq'); 
                        $mail->AddAddress('makki_fauzi@telkomsel.co.id','Makki Fauzi'); 
                         $mail->AddAddress('harliano_adelsa@telkomsel.co.id','Harliano'); 
                          $mail->AddAddress('eka_budiandri@telkomsel.co.id','Eka Budiandri'); 
                           $mail->AddAddress('angga_normawan@telkomsel.co.id','Angga Normawan'); 
                            $mail->AddAddress('asep_kurniawan1@telkomsel.co.id','Asep Kurniawan'); 
                             $mail->AddAddress('muhammad_h_oetama@telkomsel.co.id','Muhammad H Oetama'); 
                              $mail->AddAddress('adie_krisnanto@telkomsel.co.id','Adie Krisnanto'); 
                               $mail->AddAddress('arasyan_albar@telkomsel.co.id','Arasyan Albar'); 
                                $mail->AddAddress('hardiansyah2@telkomsel.co.id','Hardiansyah'); 
                                 $mail->AddAddress('doni_laksono@telkomsel.co.id','Doni Laksono'); 
                                  $mail->AddAddress('benny_welan@telkomsel.co.id','Benny Welan'); 

                          

                          
                          

           

           
           
           
           

                     
                      $mail->SetFrom('support_CAM@telkomsel.co.id'); // email pengirim
                      $mail->Subject = 'Support Tiket';                       
                      $mail->MsgHTML('<p>'.$message);
                      $mail->Send();
                    
                //echo "    <div class='success-message'>";
                //echo "<p>SUKSES MENGIRIM EMAIL DARI LOCALHOST</p>";
                //echo "</div>";    
                } catch (phpmailerException $e) {
                      echo $e->errorMessage(); 
                    }



}

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=support&alert=2");
                    }
                }
                // jika foto diubah
                else {
                    // Cek apakah tipe file yang diupload sesuai dengan allowed_extensions
                    if(in_array($extension, $allowed_extensions)) {
                        // Jika tipe file yang diupload sesuai dengan allowed_extensions, lakukan :
                        if($ukuran_file <= 100000000000) { // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
                            // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
                            // Proses upload
                            if(move_uploaded_file($tmp_file, $path)) { // Cek apakah gambar berhasil diupload atau tidak
                                // Jika gambar berhasil diupload, Lakukan : 
                                // perintah query untuk mengubah data pada tabel siswa
                                $query = mysqli_query($mysqli, "UPDATE is_tiket_new SET  status_tiket='$status',
                                                                                            dokumen='$nama_file',
                                                                                             status_tiket='$status',
                                                                                              handleby='$handleby',
                                                                                             
                                                                                             
                                                                                          
                                                                                     WHERE  idtiket = '$id_customer'")
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));


if ($query) {
    $con=mysql_connect("10.250.193.23","samapps","samapps@321");
mysql_select_db("SAMS",$con);
$SQL="SELECT 
 * FROM 
 `is_tiket_new` a
 

  WHERE a.`createuser` >= CURDATE() && a.`createuser` < (CURDATE() + INTERVAL 1 DAY) 

 and a.divisi='Non Service'
GROUP BY a.idtiket DESC";
$daftar=mysql_query($SQL) or die (mysql_error());
    $laporan="<table width=\"100%\" border=\"1\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    $laporan .="<tr>";
    $laporan .="<td>AM</td><td>NAMA PROJECT</td><td>STATUS</td><td>Create</td>";
    $laporan .="</tr>";
    while($dataku=mysql_fetch_object($daftar))
    {
        $laporan .="<tr>";
        $laporan .="<td>$dataku->am</td><td>$dataku->project_name</td><td>$dataku->status_tiket</td><td>$dataku->createuser</td>";
        $laporan .="</tr>";
    }
    $laporan .="</table>";
$message .= "<html>\n";
$message .= "<meta http-equiv='pragma' content='no-cache'/>\n";
$message .= "<html>\n";
$message .= "<style>
table { 
  border: 0; 
  font-family: arial; 
  font-size:11px; 
} 
th { 
  background-color:yellow; 
  text-align:center     
} 
td { 
  border-bottom:1 solid #000000;
  text-align:center 
} 
.fail { 
  color:#FF0000; 
} 

</style>\n";

$message .= "<body>\n";
$hasil=mysql_query($SQL,$con);
$message .= "<p>Dear<br><i>REKANS<i></p>\n";

$message .= "<center><b>Support Tiket</b></center>\n";
$message .= "<br>\n";
$message .= "<table border=1 style=border-collapse:collapse align=center bordercolor=#003366>";
$message .= " <tr align=center bgcolor=#ddffcc>
  
    <td width=56>AM</td>   
    <td width=56>Nama Project</td>   
    <td width=58>Status</td>
     <td width=58>Create</td>
    </tr>";

WHILE ($res=mysql_fetch_array($hasil)) {
$message .="<tr><td>$res[am]</td><td>$res[project_name]</td><td>$res[status_tiket]</td><td>$res[createuser]</td></tr>";
//$no=$no+1;
}
//echo "$no - $res[1] - $res[2] - $ress[15] - $ress[20] - $ress[35] - $ress[jml]  <br>";
//$no=$no+1;
$message .= "</table>";
$message .= "<br> Terimakasih";
$message .= "<br>\n";
$message .= "</body>\n";
//echo "$message";


$mail = new PHPMailer(true);
                    $mail->IsSMTP();
                    
                    try {
                      $mail->Host       = "10.2.126.85"; //isi dengan host email server
                      $mail->SMTPDebug  = 1;     
                      $mail->SMTPSecure = false;
                      $mail->SMTPAuth   = false;                                 
                     $mail->AddAddress('chairul_arief@telkomsel.co.id','Chairul Arief'); 
                      $mail->AddAddress('alvin_lucian@telkomsel.co.id','Alvin Lucian'); 
                      $mail->AddAddress('anindito_a_sampurno@telkomsel.co.id','Anindito A Sampurno'); 
                      $mail->AddAddress('firman_rasyid@telkomsel.co.id','Firman Rasyid'); 
                      $mail->AddAddress('muhammad_h_hizburrahman@telkomsel.co.id','Muhammad H Hizburrahman'); 
                      $mail->AddAddress('revin_r_nurfadly@telkomsel.co.id','Revin R Nurfadly'); 
                       $mail->AddAddress('Jafar_Shodiq@telkomsel.co.id','Jafar Shodiq'); 
                        $mail->AddAddress('makki_fauzi@telkomsel.co.id','Makki Fauzi'); 
                         $mail->AddAddress('harliano_adelsa@telkomsel.co.id','Harliano'); 
                          $mail->AddAddress('eka_budiandri@telkomsel.co.id','Eka Budiandri'); 
                           $mail->AddAddress('angga_normawan@telkomsel.co.id','Angga Normawan'); 
                            $mail->AddAddress('asep_kurniawan1@telkomsel.co.id','Asep Kurniawan'); 
                             $mail->AddAddress('muhammad_h_oetama@telkomsel.co.id','Muhammad H Oetama'); 
                              $mail->AddAddress('adie_krisnanto@telkomsel.co.id','Adie Krisnanto'); 
                               $mail->AddAddress('arasyan_albar@telkomsel.co.id','Arasyan Albar'); 
                                $mail->AddAddress('hardiansyah2@telkomsel.co.id','Hardiansyah'); 
                                 $mail->AddAddress('doni_laksono@telkomsel.co.id','Doni Laksono'); 
                                  $mail->AddAddress('benny_welan@telkomsel.co.id','Benny Welan'); 
                     
                      $mail->SetFrom('support_CAM@telkomsel.co.id'); // email pengirim
                      $mail->Subject = 'Support Tiket';                       
                      $mail->MsgHTML('<p>'.$message);
                      $mail->Send();
                    
                //echo "    <div class='success-message'>";
                //echo "<p>SUKSES MENGIRIM EMAIL DARI LOCALHOST</p>";
                //echo "</div>";    
                } catch (phpmailerException $e) {
                      echo $e->errorMessage(); 
                    }



}

                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../main.php?module=support&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../main.php?module=support&alert=4");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../main.php?module=support&alert=5");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                        header("location: ../../main.php?module=support&alert=6");
                    }
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $nisn = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel siswa
            $query = mysqli_query($mysqli, "DELETE FROM tbl_siswa WHERE nisn='$nisn'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=siswa&alert=3");
            }
        }
    }       
}       
?>
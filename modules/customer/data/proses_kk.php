<?php
session_start();
require_once "../../../config/database.php";
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
            $path = "../../../upload/kk/".$nama_file;

            // check extension
            $file = explode(".", $nama_file);
            $extension = array_pop($file);

            // jika foto tidak diisi
            if (empty($nama_file)) {
                // perintah query untuk menyimpan data ke tabel siswa
      $query = mysqli_query($mysqli, "INSERT INTO kl(NO_KK,NIK,NAMA,JK,TEMPAT,TANGGAL,AGAMA,STATUS,SUSUNAN,PEND,PERKERJAAN,KET,RT,RW,NO_RUMAH) 
   VALUES('$kk','$nik','$nama','$jenis_kel','$tempat','$tanggal_lahir','$agama','$status','$hubungan','$pend','$pekerjaan','$ket','$rt','$rw','$no_rumah')")
                                                or die('Ada kesalahan pada query insert bro : '.mysqli_error($mysqli));

                                                if($query){
 $query = mysqli_query($mysqli, "INSERT INTO sub(NO_KK,NIK,NAMA,JK,TEMPAT,TANGGAL,AGAMA,STATUS,SUSUNAN,PEND,PERKERJAAN,KET,RT,RW,NO_RUMAH) 
   VALUES('$kk','$nik','$nama','$jenis_kel','$tempat','$tanggal_lahir','$agama','$status','$hubungan','$pend','$pekerjaan','$ket','$rt','$rw','$no_rumah')")
                                                or die('Ada kesalahan pada query insert cuy : '.mysqli_error($mysqli));

                                                }
                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../../main.php?module=view_kk&alert=1");
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
                            $query = mysqli_query($mysqli, "INSERT INTO kl(NO_KK,,NIK,NAMA,JK,TEMPAT,TANGGAL,AGAMA,STATUS,SUSUNAN,PEND,PEKERJAAN,KET,RT,RW,NO_RUMAH,TANGGAL) 
                                            VALUES('$kk','$nik','$nama','$jenis_kel','$tempat','$tanggal_lahir','$agama','$status','$hubungan','$pend','$pekerjaan','$ket','$rt','$rw','$no_rumah','$tanggal_lahir')")
                                                            or die('Ada kesalahan pada query insert bro 2 : '.mysqli_error($mysqli));    




                            // cek query
                            if ($query) {
                                // jika berhasil tampilkan pesan berhasil update data
                                header("location: ../../../main.php?module=view_kk&alert=1");
                            }
                        } else {
                            // Jika gambar gagal diupload, tampilkan pesan gagal upload
                            header("location: ../../../main.php?module=view_kk&alert=4");
                        }
                    } else {
                        // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                        header("location: ../../../main.php?module=view_kk&alert=5");
                    }
                } else {
                    // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                    header("location: ../../../main.php?module=view_kk&alert=6");
                }
            }
        }   
    } 
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['kk'])) {
                // ambil data hasil submit dari form
                $kk                = mysqli_real_escape_string($mysqli, trim($_POST['kk']));
             $nik                 = mysqli_real_escape_string($mysqli, trim($_POST['nik']));
            $nama                 = mysqli_real_escape_string($mysqli, trim($_POST['nama']));
            $jenis_kel            = mysqli_real_escape_string($mysqli, trim($_POST['jk']));
             $tempat              = mysqli_real_escape_string($mysqli, trim($_POST['tempat']));
              $status             = mysqli_real_escape_string($mysqli, trim($_POST['status']));
               $agama             = mysqli_real_escape_string($mysqli, trim($_POST['agama']));
               $hubungan          = mysqli_real_escape_string($mysqli, trim($_POST['hubungan']));
                $tanggal          = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
                $keterangan          = mysqli_real_escape_string($mysqli, trim($_POST['ket']));
            
              $pend                = mysqli_real_escape_string($mysqli, trim($_POST['pend']));
               $pekerjaan          = mysqli_real_escape_string($mysqli, trim($_POST['pekerjaan']));
                $ket               = mysqli_real_escape_string($mysqli, trim($_POST['ket']));
                $rt                = mysqli_real_escape_string($mysqli, trim($_POST['rt']));
                 $rw               = mysqli_real_escape_string($mysqli, trim($_POST['rw']));
                  $no_rumah        = mysqli_real_escape_string($mysqli, trim($_POST['no_rumah']));
               

              $tgl_lahir       = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_lahir']));
            $tgl              = explode('-',$tgl_lahir);
            $tanggal_lahir    = $tgl[2]."-".$tgl[1]."-".$tgl[0];
            
             
                
                
                $date                    = date("d-m-Y");
                

                $nama_file   = $_FILES['data']['name'];
                $ukuran_file = $_FILES['data']['size'];
                $tipe_file   = $_FILES['data']['type'];
                $tmp_file    = $_FILES['data']['tmp_name'];

                // tentukan extension yang diperbolehkan
                $allowed_extensions = array('jpg','jpeg','png','xls','xlsx','pdf','pptx','JPG','docx','gif','GIF');

                // Set path folder tempat menyimpan gambarnya
                $path = "../../../upload/kk/".$nama_file;

                // check extension
                $file = explode(".", $nama_file);
                $extension = array_pop($file);

                // jika foto tidak diubah
                if (empty($nama_file)) {
                    // perintah query untuk mengubah data pada tabel siswa
                    $query = mysqli_query($mysqli, "UPDATE kl SET  
                                                    NO_KK='$kk',
                                                    NIK='$nik',
                                                    NAMA ='$nama',
                                                   
                                                     TEMPAT='$tempat',
                                                     TANGGAL='$tanggal',
                                                     AGAMA ='$agama',
                                                     STATUS='$status',
                                                     SUSUNAN='$hubungan',
                                                     KET='$keterangan'
                                              

                                                   
                 
                                                  WHERE  NO_KK = '$kk'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));




                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../../main.php?module=view_kk&alert=2");
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
                                $query = mysqli_query($mysqli, "UPDATE kl SET  
                                                    NO_KK='$kk',
                                                    NIK='$nik',
                                                    NAMA ='$nama',
                                                   
                                                     TEMPAT='$tempat',
                                                     TANGGAL='$tanggal',
                                                     AGAMA ='$agama',
                                                     STATUS='$status',
                                                     SUSUNAN='$hubungan',
                                                     KET='$keterangan',
                                                     DOC = '$nama_file'
                                              

                                                   
                 
                                                  WHERE  NO_KK = '$kk'")
                
                                                                                             
                                                                                          
                                                                                     
                                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));




                                // cek query
                                if ($query) {
                                    // jika berhasil tampilkan pesan berhasil update data
                                    header("location: ../../../main.php?module=view_kk&alert=2");
                                }
                            } else {
                                // Jika gambar gagal diupload, tampilkan pesan gagal upload
                                header("location: ../../../main.php?module=view_kk&alert=4");
                            }
                        } else {
                            // Jika ukuran file lebih dari 1MB, tampilkan pesan gagal upload
                            header("location: ../../../main.php?module=view_kk&alert=5");
                        }
                    } else {
                        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, tampilkan pesan gagal upload
                        header("location: ../../../main.php?module=view_kk&alert=6");
                    }
                }
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $nisn = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel siswa
            $query = mysqli_query($mysqli, "DELETE FROM kl WHERE NO='$nisn'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=view_kk&alert=3");
            }
        }
    }       
}       
?>
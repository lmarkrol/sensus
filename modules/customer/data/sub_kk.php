<div class="breadcrumbs breadcrumbs-fixed" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="?module=beranda">Beranda</a>
        </li>
    </ul><!-- /.breadcrumb -->
</div>

<div class="page-content">
    <div class="page-header">
        <h1 style="color:#585858">
            <i class="ace-icon fa fa-list"></i> Data Anggota Keluarga
            <a href="?module=form_sub&form=add">
                <button class="btn btn-primary pull-right">
                    <i class="ace-icon fa fa-plus"></i> Tambah
                </button>
            </a>
        </h1>
         <div class="row">
<!-- ./col -->
        
    </div><!-- /.page-header -->

    
         <!--<div class="page-header">

                    <form action="main.php?module=pencarian" method="POST">
                    <input type="text" name="cari" placeholder="Cari Nomor / Nama PKS ..." class="menu-search form-control round" autocomplete="off" />
                </form>
            
             </div>-->
         

<?php
// fungsi untuk menampilkan pesan
// jika alert = "" (kosong)
// tampilkan pesan "" (kosong)
if (empty($_GET['alert'])) {
}
// jika alert = 1
// tampilkan pesan "data Support baru berhasil disimpan"
elseif ($_GET['alert'] == 1) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        data Support baru berhasil disimpan.
        <br>
    </div>
<?php
} 
// jika alert = 2
// tampilkan pesan Sukses "data Support berhasil diubah"
elseif ($_GET['alert'] == 2) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        data Support berhasil diubah.
        <br>
    </div>
<?php
}
// jika alert = 3
// tampilkan pesan Sukses "data Support berhasil dihapus"
elseif ($_GET['alert'] == 3) { ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
        data Support berhasil dihapus.
        <br>
    </div>
<?php
} 
// jika alert = 4
// tampilkan pesan Upload Gagal "pastikan file yang diupload sudah benar"
elseif ($_GET['alert'] == 4) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan file yang diupload sudah benar.
        <br>
    </div>
<?php
}
// jika alert = 5
// tampilkan pesan Upload Gagal "pastikan ukuran foto tidak lebih dari 1MB"
elseif ($_GET['alert'] == 5) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan ukuran foto tidak lebih dari 1MB.
        <br>
    </div>
<?php
} 
// jika alert = 6
// tampilkan pesan Upload Gagal "pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
elseif ($_GET['alert'] == 6) { ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="ace-icon fa fa-times"></i>
        </button>
        <strong><i class="ace-icon fa fa-times-circle"></i> Upload Gagal! </strong><br>
        pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
        <br>
    </div>
<?php
} 
?>

<br>
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                        <div class="row">

           
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class='center'>No</th>
                                    <th class='center'>No.KK</th>
                                     <th class='center'>No.KTP</th>
                                     <th class='center'>Nama</th>
                                     
                                      <th class='center'>ALamat</th>
                                       <th class='center'>RT</th>
                                        <th class='center'>RW</th>
                                         <th class='center'>Status</th>
                                       
                                  
                                   
                                    
                               <th class='center'>Action</th>
                                </tr>
                            </thead>

                            <?php
                            $no = 1;
                            //$created_user = $_SESSION['id_user'];
                            // fungsi query untuk menampilkan data dari tabel upload


            if (isset($_GET['id'])) {
            $kode_project = $_GET['id'];
           
            }
            
                            $query = mysqli_query($mysqli, "SELECT
                                                         * from sub where  NO_KK='$kode_project'
                                                          GROUP BY NIK")
                                                or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

                            while ($data = mysqli_fetch_assoc($query)) { 
                                //$tgl           = substr($data['tanggal_kirim'],0,10);
                                //$exp           = explode('-',$tgl);
                                //$tanggal_kirim = $exp[2]."-".$exp[1]."-".$exp[0];

                                //$disabled = $data['hak_akses']=='feby' ? "" : "disabled";
                            ?>
                            <tr>
                                    <td width="10" class="center"><?php echo $no; ?></td>
                                    
                                    <td width="100"><?php echo $data['NO_KK']; ?></td>
                                     <td width="100"><?php echo $data['NIK']; ?></td>
                                      <td width="100"><?php echo $data['NAMA']; ?></td>
                                     
                                        <td width="100"><?php echo $data['NO_RUMAH']; ?></td>
                                         <td width="100"><?php echo $data['RT']; ?></td>
                                          <td width="100"><?php echo $data['RW']; ?></td>
                                           <td width="100"><?php echo $data['SUSUNAN']; ?></td>
                                 
                                        

                                    <td class='center' width='30'>
                        <div>
                           <a data-toggle='tooltip' data-placement='top' title='Detail' style='margin-right:5px' class='btn btn-primary btn-sm' href="?module=form_pks&form=detail&id=<?php echo $data['no_kk']; ?>">
                                                <i style='color:#fff' class='glyphicon glyphicon-th-list'></i>

                                            </a>

                                           <!-- <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href="?module=form_tiket&form=edit&id=<?php echo $data['idtiket']; ?>">
                                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                                            </a>-->
                                    
                                             
                                    
                                        </div>
                                        </td>
                                        
                                    
                                    
                                    
            
                          <!--<a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/customer/proses_all.php?act=delete&id=<?php echo $data['id_customer'];?>" onclick="return confirm('Anda yakin ingin menghapus barang <?php echo $data['nama_customer']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>-->
                                    
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            } ?>
                            </tbody>
                        </table>
                    

                </div>
            </div>
        </div>
</div>
</div>
</div>
               
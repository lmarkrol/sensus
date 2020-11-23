

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
        INPUT KK
      </h1>
    </div>
   
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/customer/feby/proses_kk.php?act=insert" method="POST" enctype="multipart/form-data" />
           <div class="box-body">
              <?php  
              error_reporting(0);
         $created_user = $_SESSION['id_user'];
         $user = $_SESSION['nama_user'];
           $hak = $_SESSION['hak_akses'];
           $dept = $_SESSION['depart'];
    



         
                $query = mysqli_query($mysqli, "SELECT * from is_users_support") 
                                      or die('Ada kesalahan pada query tampil Data Vendor: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);

              ?>


  
 
           
            <div class="form-group">
                <label class="col-sm-2 control-label">No.KK</label>*
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kk" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NIK</label>*
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nik" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>*
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" required>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="jk" data-placeholder="-- Pilih --" autocomplete="off">
                     <option value=""></option>
          <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                   
                       
                    
                  </select>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Lahir</label>*
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tempat" autocomplete="off" required>
                </div>
              </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right">Tanggal</label>
                  
                  <div style="padding-right:20px;" class="col-sm-4">
                    <div class="input-group">
                      <input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_lahir" />
                      <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                      </span>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="agama" data-placeholder="-- Pilih --" autocomplete="off">
          <option value="ISLAM">ISLAM</option>
                    <option value="KRISTEN">KRISTEN</option>
                    <option value="HINDU">HINDU</option>
                     <option value="BUDHA">BUDHA</option>

                       
                    
                  </select>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="status" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hubungan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hub" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Pendidikan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pend" autocomplete="off" required>
                </div>
              </div>

 <div class="form-group">
                <label class="col-sm-2 control-label">Pekerjaan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pekerjaan" autocomplete="off" required>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">keterangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ket" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">RT</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rt" autocomplete="off" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">RW</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rw" autocomplete="off" required>
                </div>
              </div>
               <div class="form-group">
                <label class="col-sm-2 control-label">NO.Rumah</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="no_rumah" autocomplete="off" required>
                </div>
              </div>
              

        <div class="form-group">
            <label class="col-sm-2 control-label">Attachment</label>

            <div class="col-sm-4">
              <input type="file" name="data"/>
            </div>
          </div>
        
            <!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=view_pks" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section>
  </div><!-- /.content -->
<?php
error_reporting(0);
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
   
        
      // fungsi query untuk menampilkan data dari tabel barang
      $query = mysqli_query($mysqli, "SELECT * from kl where NO_KK='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Vendor: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);

      $tgl_lahir           = $data['TANGGAL'];
                    $tgl                   = explode('-',$tgl_lahir);
                    $tanggal_lahir       = $tgl[2]."-".$tgl[1]."-".$tgl[0];
                

        
            
      $user = $_SESSION['nama_user'];
     
      
    }
  
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="page-content">
    <div class="page-header">
      <h1 style="color:#585858">
        <i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
        Edit  KK
      </h1>
    </div>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/customer/feby/proses_kk.php?act=update" method="POST" enctype="multipart/form-data" />
          
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">NO.KK</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kk" autocomplete="off" value="<?php echo $data['NO_KK']; ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">NIK</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nik" autocomplete="off" value="<?php echo $data['NIK']; ?>"readonly>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $data['NAMA']; ?>"readonly>
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Lahir</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tempat" autocomplete="off" value="<?php echo $data['TEMPAT']; ?>">
                </div>
              </div>

               <!--<div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tanggal" autocomplete="off" value="<?php echo $data['TANGGAL']; ?>">
                </div>
              </div>-->

               <div class="form-group">
                  <label class="col-sm-2 control-label no-padding-right">Tanggal Lahir</label>
                  
                  <div style="padding-right:20px;" class="col-sm-4">
                    <div class="input-group">
                      <input class="form-control date-picker" type="text" data-date-format="dd-mm-yyyy" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" />
                      <span class="input-group-addon">
                        <i class="fa fa-calendar bigger-110"></i>
                      </span>
                    </div>
                  </div>
                </div>

               
         <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="agama" data-placeholder="-- Pilih --" autocomplete="off">
                    <option value="<?php echo $data['AGAMA']; ?>"><?php echo $data['AGAMA']; ?></option>
          <option value="ISLAM">ISLAM</option>
                    <option value="KRISTEN">KRISTEN</option>
                    <option value="KATOLIK">KATOLIK</option>
                       <option value="HINDU">HINDU</option>
                          <option value="BUDHA">BUDHA</option>
                            
                    
                  </select>
                </div>
              </div>

             
        
       
         <div class="form-group">
                <label class="col-sm-2 control-label"> Status</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="status" autocomplete="off" value="<?php echo $data['STATUS']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hubungan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hubungan" autocomplete="off" value="<?php echo $data['SUSUNAN']; ?>">
                </div>
              </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">KETERANGAN</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ket" autocomplete="off" value="<?php echo $data['KET']; ?>">
                </div>
              </div>

               
        
        
        <div class="form-group">
            <label class="col-sm-2 control-label">File</label>

            <div class="col-sm-4">
              <input type="file" id="id-input-file-2" name="data"/>Extention File harus .Xls, .Xlsx, .Pdf, .Pptx
            </div>
          </div>

          
            
</div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=view_pks" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>
  </div>
  </div>
  </div>
  </section>


  <!-- /.row -->
  <!-- /.content -->
<?php
      }
     
?>
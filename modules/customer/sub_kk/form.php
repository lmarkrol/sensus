

 <?php  
error_reporting(0);
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
		
if ($_GET['form']=='add') {
	
	if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel
      $query = mysqli_query($mysqli, "SELECT * from kl where NO_KK ='$_GET[id]'")
												or die('Ada kesalahan pada query tampil Data: '.mysqli_error($mysqli));

      $data  = mysqli_fetch_assoc($query);	 
    }

?>
	
	
	
	
	
	
	
		

	

  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="page-header">
			<h1 style="color:#585858">
				<i style="margin-right: 5px" class="ace-icon fa fa-edit"></i>
				Input Anggota
			</h1>
		</div>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/customer/sub_kk/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
			  <div class="form-group">

			  	 <div class="form-group">
                <label class="col-sm-2 control-label">NO.KK</label>
                <div class="col-sm-5">
                 <input type="text" class="form-control" name="kk" autocomplete="off" value="<?php echo $data['NO_KK']; ?>" readonly>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">NIK </label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nik" required>
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
 
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=view_sub&id=<?php echo $data['NO_KK']; ?>" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      <!-- /.row -->
  </section><!-- /.content -->
<?php
}

// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel jenis
      $query = mysqli_query($mysqli, "SELECT * FROM is_progress WHERE id_progress='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Progress
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=project">Progress </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/progress/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <input type="hidden" name="id_progress" value="<?php echo $data['id_progress']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">kode_project</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_project" autocomplete="off" value="<?php echo $data['kode_project']; ?>" readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Nama Project</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_project" autocomplete="off" value="<?php echo $data['nama_project']; ?>" readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Support Needed</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="support" autocomplete="off" value="<?php echo $data['support']; ?>" required>
                </div>
              </div>
			  
			    <div class="form-group">
                <label class="col-sm-2 control-label">Update Status</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="note" autocomplete="off" value="<?php echo $data['update_status']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Plan Next Week</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="plan" autocomplete="off" value="<?php echo $data['plan']; ?>" required>
                </div>
              </div>
			   <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="status" data-placeholder="-- Pilih Vendor --" autocomplete="off" required>
                    <option value="<?php echo $data['status']; ?>"><?php echo $data['status']; ?></option>
					<option value="PROGRESS - INITIAL COMMUNICATION">PROGRESS - INITIAL COMMUNICATION</option>
						<option value="PROGRESS - PROPOSAL/ QUOTATION">PROGRESS - PROPOSAL/ QUOTATION</option>	
						<option value="PROGRESS - NEGOTIATION">PROGRESS - NEGOTIATION</option>	
						<option value="PROGRESS - POC">PROGRESS - POC</option>	
						<option value="PROGRESS - SIGN AGREEMENT">PROGRESS - SIGN AGREEMENT</option>	
						<option value="ON HOLD">ON HOLD</option>	
						<option value="CLOSED - WON">CLOSED - WON</option>	
						<option value="CLOSED - LOSE">CLOSED - LOSE</option>	
                    
                  </select>
</div>
</div>	
<br/><br/>

	                	<!--<div class="form-group">
	                  		<label class="col-sm-2 control-label"><strong><i style="margin-right:7px" class="fa fa-user"></i> Distribution Area Pospaid</strong></label>
	                	</div>
						<hr>
						<div class="form-group">
                <label class="col-sm-2 control-label">Area 1</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are1pospaid" value="<?php echo $data['area1_pospaid']; ?>" autocomplete="off" readonly>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area 2</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are2pospaid" value="<?php echo $data['area2_pospaid']; ?>" autocomplete="off" readonly>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area 3</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are3pospaid"value="<?php echo $data['area3_pospaid']; ?>" autocomplete="off" readonly>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area 4</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are4pospaid" value="<?php echo $data['area4_pospaid']; ?>"autocomplete="off" readonly>
                </div>
              </div>
						
						<br/><br/>

	                	<div class="form-group">
	                  		<label class="col-sm-2 control-label"><strong><i style="margin-right:7px" class="fa fa-user"></i> Distribution Area Prepaid</strong></label>
	                	</div>
						<hr>
						<div class="form-group">
                <label class="col-sm-2 control-label">Area 1</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are1prepaid"value="<?php echo $data['are1_prepaid']; ?>" autocomplete="off" readonly>
                </div>
              </div>
						<div class="form-group">
                <label class="col-sm-2 control-label">Area 2</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are2prepaid" value="<?php echo $data['are2_prepaid']; ?>"autocomplete="off" readonly>
                </div>
              </div>
						<div class="form-group">
                <label class="col-sm-2 control-label">Area 3</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are3prepaid" value="<?php echo $data['are3_prepaid']; ?>" autocomplete="off" readonly>
                </div>
              </div>
						
						<div class="form-group">
                <label class="col-sm-2 control-label">Area 4</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="are4prepaid" value="<?php echo $data['are4_prepaid']; ?>"autocomplete="off" readonly>
                </div>
              </div>
			  <br><br>
			  <div class="form-group">
	                  		<label class="col-sm-2 control-label"><strong><i style="margin-right:7px" class="fa fa-user"></i> Incremental Revenue</strong></label>
	                	</div>
						<hr>
						
			  <div class="form-group">
                <label class="col-sm-2 control-label">Pospaid Revenue</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="posrev" value="<?php echo $data['pos_rev'];?>" autocomplete="off" readonly>
                </div>
              </div>
			  <div class="form-group">
                <label class="col-sm-2 control-label">Prepaid Revenue</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="prerev" value="<?php echo $data['pre_rev'];?>" autocomplete="off" readonly>
                </div>
              </div>
			  

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=support" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>
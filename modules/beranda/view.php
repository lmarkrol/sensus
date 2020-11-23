
<?php
error_reporting(0);
?>
<div class="page-content">
	<div class="page-header">
		<h4>
			Data Kependudukan
		</h4>
	</div><!-- /.page-header -->
	<div class="row">
	<?php
if ($_SESSION['hak_akses']=='admin') { ?>
<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-user"></i>
				</button>
				<i class="ace-icon fa fa-user green"></i>
				Selamat datang
				<strong class="green"><?php echo $_SESSION['nama_user']; ?></strong> di Sistem Database Kependudukan
			</div>
			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->

	<!-- Small boxes (Stat box) -->
	 <div class="row">
<div class="col-lg-3 col-xs-6">
            <!-- small box -->
             <div style="background-color:#dd4b39;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='001'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.001</p>
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='002'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.002</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='003'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.003</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='004'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.004</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='005'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.005</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='006'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.006</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='007'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.007</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
         <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div style="background-color:#f39c12;color:#fff" class="small-box">
                <?php  
                //$user= $_SESSION['id_user'];
                //$users= $_SESSION['nama_user'];
                $query = mysqli_query($mysqli, "SELECT 
 
  COUNT(DISTINCT (`NO_KK`)) AS kk

  
FROM
kl WHERE susunan ='KEPALA KELUARGA' and RT='008'")


                                                or die('Ada kesalahan pada query tampil data: '.mysqli_error($mysqli));

                $data = mysqli_fetch_assoc($query);

                
                ?>

                <div class="inner">

                    <h3><?php echo $data['kk']; ?></h3>
                    <p>Total Kepala Keluarga RT.008</p>
                    
                    
                </div>
                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
		<?php
	}
	
	 ?>
	 
	 <!-- /.page-content -->
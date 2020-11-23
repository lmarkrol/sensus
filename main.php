<?php
session_start();      // memulai session
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Admin Panel</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />

<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

	    <!-- favicon -->
    	<link rel="shortcut icon" href="assets/img/favicon.png">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" />
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
		<link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css" />

		<!--fonts-->
		<link rel="stylesheet" type="text/css" href="assets/fonts/fonts.googleapis.com.css" />

		<!--ace styles-->
		<link rel="stylesheet" type="text/css" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" type="text/css" href="assets/js/ace-extra.min.js" />

		 <!--<link href="assets/css/style.css" rel="stylesheet" type="text/css" />-->
     <link href=" https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
      <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
		
		
		
		<!-- 
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		-->
		<!-- Fungsi untuk membatasi karakter yang diinputkan -->
    	<script language="javascript">
      	function getkey(e)
      	{
	      	if (window.event)
	         	return window.event.keyCode;
	      	else if (e)
	         	return e.which;
	      	else
	         	return null;
      	}

      	function goodchars(e, goods, field)
      	{
	      	var key, keychar;
	      	key = getkey(e);
	      	if (key == null) return true;
	       
	      	keychar = String.fromCharCode(key);
	      	keychar = keychar.toLowerCase();
	      	goods = goods.toLowerCase();
	       
	      	// check goodkeys
	      	if (goods.indexOf(keychar) != -1)
	          	return true;
	      	// control keys
	      	if ( key==null || key==0 || key==8 || key==9 || key==27 )
	         	return true;
	          
	      	if (key == 13) {
	          	var i;
	          	for (i = 0; i < field.form.elements.length; i++)
	              	if (field == field.form.elements[i])
	                  	break;
	          	i = (i + 1) % field.form.elements.length;
	          	field.form.elements[i].focus();
	          	return false;
	          	};
	      	// else return false
	      	return false;
    	}
    	</script>

	</head>

	<body class="no-skin">
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
				Data Kependudukan Warga
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<i class="ace-icon fa fa-user"></i>
								<span class="user-info">
									<?php echo $_SESSION['username']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a data-toggle="modal" href="#logout">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">
			<div id="sidebar" class="sidebar responsive sidebar-fixed sidebar-scroll" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">

				<!-- panggil file "sidebar-menu.php" untuk menampilkan menu -->
              	<?php include "sidebar-menu.php"; ?>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">

					<!-- panggil file "content.php" untuk menampilkan halaman konten-->
              		<?php include "content.php"; ?>
					
					<!-- Modal Logout -->
					<div class="modal fade" id="logout">
						<div class="modal-dialog">
						  	<div class="modal-content">
						    	<div class="modal-header">
						      		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						      		<h4 class="modal-title"><i class="ace-icon fa fa-sign-out"> Logout</i></h4>
						    	</div>
						    	<div class="modal-body">
						      		<p>Apakah Anda yakin ingin logout? </p>
						    	</div>
						    	<div class="modal-footer">
						      		<a type="button" class="btn btn-danger" href="logout.php">Ya, Logout</a>
						      		<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
						    	</div>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<marquee>&copy; 2020 -
							<span class="red bolder">Data Kependudukan Warga </span>
						</span></marquee>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		 <script src="assets/js/jquery-chained.min.js"></script>
		
		<!-- <![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->
		
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>

	<!--<script src="assets/plugins/dataTables/jquery.dataTables.min.js"></script>-->
		<script src="assets/plugins/dataTables/jquery.dataTables.bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
 <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js " type="text/javascript"></script>




		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				if(!ace.vars['touch']) {
					// chosen select
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}

				// tooltip
        		$('[data-rel=tooltip]').tooltip();

        		// input mask
				$('.input-mask-ta').mask('9999-9999');
				$('.input-mask-no-ijazah').mask('a*-99 a* 9999999');
				$('.input-mask-no-skhu').mask('a*-99 a* 9999999');
				$('.input-mask-no-ujian').mask('9-99-99-99-999-999-9');

				// datepicker plugin
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})

				// initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
					  "dom": 'Blfrtip',
					"buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();

				var oTable3 = 
				$('#dynamic-table3')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
					  "dom": 'Blfrtip',
					"buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
				
				var oTable2 = 
				$('#dynamic-table2')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aaSorting": [[ 0, "asc" ]],
					  "dom": 'Blfrtip',
					"buttons": [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "width": "100%",
        "word-wrap": 'break-word',

			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );


				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'Tidak ada file ...',
					btn_choose:'Browse',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false, //| true | large
					whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
			})


			
		</script>


		<script>
            $(document).ready(function() {
                $("#kota").chained("#provinsi");
                $("#kecamatan").chained("#kota");
                 $("#email").chained("#kecamatan");

            });


            var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
        </script>

    
    


		
	</body>
</html>

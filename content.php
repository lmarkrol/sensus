

<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";
// panggil fungsi untuk format tanggal
require_once "config/fungsi_tanggal.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module']=='beranda') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih customer, panggil file view customer
	elseif ($_GET['module']=='view_admin') {
		include "modules/customer/view_admin.php";
	}


	// jika halaman konten yang dipilih customer, panggil file view customer
	elseif ($_GET['module']=='form_kk') {
		include "modules/customer/data/form_kk.php";
	}

	elseif ($_GET['module']=='form_sub') {
		include "modules/customer/sub_kk/form.php";
	}



	elseif ($_GET['module']=='view_kk') {
		include "modules/customer/data/view.php";
	}

	elseif ($_GET['module']=='view_sub') {
		include "modules/customer/sub_kk/sub_kk.php";
	}

	
	elseif ($_GET['module']=='usermanage') {
		include "modules/user/view.php";
	}

	elseif ($_GET['module']=='password') {
		include "modules/password/view.php";
	}

	elseif ($_GET['module']=='form_user') {
		include "modules/user/form.php";
	}
	
	// jika halaman konten yang dipilih customer, panggil file view customer
	elseif ($_GET['module']=='view_doc') {
		include "modules/customer/data/view_doc.php";
	}

	

	



}
?>
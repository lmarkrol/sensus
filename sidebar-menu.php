<?php 
// fungsi pengecekan hak_akses untuk menampilkan menu sesuai dengan hak_akses
// jika hak_akses = Tata Usaha, tampilkan menu

if ($_SESSION['hak_akses']=='admin'){ ?>
    <ul class="nav nav-list">
    <?php
    // fungsi untuk pengecekan menu aktif
    // jika menu beranda dipilih, menu beranda aktif
    if ($_GET["module"] == "beranda") {
        echo '  <li class="active">
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
    // jika tidak, menu beranda tidak aktif
    else {
        echo '  <li>
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

     if ($_GET["module"] == "view_kk" || $_GET["module"] == "view_kk") {
        echo '  <li class="active">
                    <a href="?module=view_kk">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">List</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
    // jika tidak, menu identitas tidak aktif
    else {
        echo '  <li>
                    <a href="?module=view_kk">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">List</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

  
    ?>



    </ul>

    <?php
}
?>
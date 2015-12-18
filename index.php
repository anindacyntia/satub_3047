<?php
include "lib/koneksi.php";
include "lib/kalender.php";
include "lib/fungsi_indotgl.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SI Angkutan Cirebon Kota</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/icon.png" sizes="16x16" type="image/png">
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
</head>
<body>
<div class="main">
  
  <div class="hbg">
  <!--<img style="margin:0 auto; width:970px; height:189px;" src="images/header.jpg" />-->
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
	  <h2 style="text-align:center;color:#6666FF;"><marquee scrolldelay="100">Sistem Informasi Angkutan Umum Kota Cirebon</marquee></h2>
       <?php
					$module = @$_GET["module"];
					if(empty($module) || $module=="" ) { $module="main"; }
					if(file_exists($module)) {
						include "$module";
					}
					else {
                                include "home.php";
                            }
      ?>
      </div>
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>Menu</span> Utama</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="?module=home.php">Home</a></li>
            <li><a href="?module=cari_jalur.php">Cari Jalur</a></li>
            <li><a href="?module=berita.php&index=0">Berita</a></li>
            <li><a href="?module=peta.php">Peta</a></li>
          </ul>
        </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">Aninda Cyntia</a>.</p>
      <div class="clr"></div>
    </div>
  </div>
</div>
</body>
</html>

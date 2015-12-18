<?php
session_start();
if($_SESSION['siangkutan']!=1){
echo "<script>window.alert('silahkan login untuk mengakses halaman ini');
        window.location=('../login.php')</script>";
}else{
include "../lib/koneksi.php";
include "../lib/kalender.php";
include "../lib/fungsi_indotgl.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Administrator</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="../images/icon.png" sizes="16x16" type="image/png">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" type="text/css" href="../stylesheets/theme.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">

    <script src="../lib/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- Demo page code -->

    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .brand { font-family: georgia, serif; }
        .brand .first {
            color: #ccc;
            font-style: italic;
        }
        .brand .second {
            color: #fff;
            font-weight: bold;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class=""> 
  <!--<![endif]-->

    <div class="sidebar-nav">
        <a href="index.php" class="nav-header"><i class="icon-dashboard"></i>Home</a>
        <a href="index.php?module=jalur.php&index=0" class="nav-header"><i class="icon-briefcase"></i>Jalur</a>
        <a href="index.php?module=jalan.php&index=0" class="nav-header"><i class="icon-briefcase"></i>Jalan</a>
        <a href="index.php?module=cari_jalur.php" class="nav-header" ><i class="icon-legal"></i>Cari Jalur</a>
        <a href="index.php?module=user.php&index=0" class="nav-header" ><i class="icon-question-sign"></i>User</a>
        <a href="index.php?module=angkot.php&index=0" class="nav-header" ><i class="icon-comment"></i>Angkot</a>
		<a href="index.php?module=berita.php&index=0" class="nav-header" ><i class="icon-comment"></i>Berita</a>
		<a href="../logout.php" class="nav-header" ><i class="icon-comment"></i>Keluar</a>
    </div>
    

    
    <div class="content">
        
        <div class="header">
 		<img src="../images/header.jpg">
        </div>
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


                    
                    <footer>
                        <hr>

                        
                        <p class="pull-right">A <a href="#" target="_blank">Angkutan Kota Cirebon </a> by <a href="#" target="_blank">Aninda Cyntia</a></p>

                        <p>&copy; 2013 <a href="#" target="_blank">Aninda Cyntia</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </body>
</html>
<?php
}
?>



<ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">User</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="?module=user_tambah.php"><button class="btn btn-primary"><i class="icon-plus"></i> Tambah User</button></a>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>User</th>
		  <th>Password</th>
          <th style="width: 75px;">Aksi</th>
        </tr>
      </thead>
      <tbody>
	  <?php
	  	$index=$_GET['index'];
		
		//mengambil data dari database
		$query_user = mysql_query("select * from login LIMIT $index, 10");
			
		//mengecek jumlah data yang ada
		$sum_user = mysql_num_rows($query_user);
		if($sum_user == "") {
			echo "tidak ada data user";
		}else{
			
		$nomor=0;
		//mebuat tabel bayangan untuk menampilkan data
		while ($view_user=mysql_fetch_array($query_user)){
		$id_user=$view_user['id_user'];
		$nama_lengkap=$view_user['nama_lengkap'];
		$email=$view_user['email'];
		$password=$view_user['password'];
		$nomor = $nomor+1;
		echo "
        <tr>
          <td>$nomor</td>
          <td>$nama_lengkap</td>
          <td>$email</td>
		  <td>$password</td>
          <td>
              <a href='?module=user_edit.php&id_user=$id_user'>Edit</a> |
              <a href='?module=user_hapus.php&id_user=$id_user'>Hapus</a>";
		}
		}
		?>
          </td>
        </tr>
        
		
		
      </tbody>
    </table>
</div>
<div class="pagination">
    <ul>
        <li><a href="#">Select Pages</a></li>
        <?php include "user_page.php"; ?>
    </ul>
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure want to delete ?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <?php echo "<a href='?module=user_hapus.php&id_user=$id_user' class='btn btn-danger'>Delete</a>"; ?>
    </div>
</div>

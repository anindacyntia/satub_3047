 <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Edit User</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form action="?module=user_edit_p.php" method="post">
	
	<?php
		$id_user = $_GET['id_user'];
		
		//mengambil data dari database
		$query_user = mysql_query("select * from login where id_user='$id_user'");
			
		//mebuat tabel bayangan untuk menampilkan data
		$view_user=mysql_fetch_array($query_user);
	?>
	
        <label>Nama Lengkap</label>
        <input type="text" value="<?php echo "$view_user[nama_lengkap]" ?>" name="nama_lengkap" class="input-xlarge">
		<label>Email</label>
        <input type="text" value="<?php echo "$view_user[email]" ?>" name="email" class="input-xlarge">
        <label>Password</label>
        <input type="password"  name="password1" class="input-xlarge">
		<label>Ulangi Password</label>
        <input type="password"  name="password2" class="input-xlarge">
	<div>
	<input type="hidden" value="<?php echo "$view_user[id_user]" ?>" name="id_user" />
	<button type="submit" class="btn btn-primary"><i class="icon-save"></i> Simpan</button>
    <button type="reset" class="btn">Batal</button>
	</div>
    </form>
		
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>

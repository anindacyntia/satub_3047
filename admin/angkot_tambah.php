 <ul class="breadcrumb">
            <li><a href="index.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Tambah Angkot</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form action="?module=angkot_tambah_p.php" method="post">
        <label>Kode Angkot</label>
        <input type="text" value="Otomatis" class="input-xlarge" disabled="disabled">
        <label>Nama Angkot</label>
        <input type="text" name="nama_angkot" class="input-xlarge">
        <label>Tarif Angkot</label>
        <input type="text" name="tarif_angkot" class="input-xlarge">
        <label>Ciri Angkot</label>
        <textarea name="ciri_angkot" rows="3" class="input-xlarge"></textarea>
	<div>
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
<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Buku</label>
        <div class="col-lg-5">
            <input type="text" name="kode_buku" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Judul Buku</label>
        <div class="col-lg-5">
            <input type="text" name="judul_buku" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Pengarang</label>
        <div class="col-lg-5">
            <input type="text" name="pengarang" class="form-control">
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Tahun Terbit</label>
        <div class="col-lg-5">
         <?php   echo "<select name='tahun_terbit' class='form-control'>";
		for ($i=1980; $i<=2015; $i++)
		{
			if ($i == $thn) echo "<option selected>".$i."</option>";
			else echo "<option>".$i."</option>";
		}
		echo "</select>";
		?>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Kategori</label>
        <div class="col-lg-5">
            <input type="checkbox" name="kategori" value="Agama" class="form-control"> Agama<br>
			<input type="checkbox" name="kategori" value="Anak" class="form-control"> Buku Anak<br>
			<input type="checkbox" name="kategori" value="Novel" class="form-control"> Novel<br>
			<input type="checkbox" name="kategori" value="Buku Sekolah" class="form-control"> Buku Sekolah<br>
			<input type="checkbox" name="kategori" value="Komik" class="form-control"> Komik<br>
			<input type="checkbox" name="kategori" value="Teknologi" class="form-control"> Teknologi<br>
			<input type="checkbox" name="kategori" value="Majalah & Tabloid" class="form-control"> Majalah & Tabloid<br>
        </div>
    </div>
	
	<div class="form-group">
        <label class="col-lg-2 control-label">Keterangan Stok</label>
        <div class="col-lg-5">
            <input type="radio" name="keterangan_stok" value="Masih" class="form-control"> Masih<br>
			<input type="radio" name="keterangan_stok" value="Habis" class="form-control"> Habis<br>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Deskripsi</label>
        <div class="col-lg-10">
            <textarea name="deskripsi"></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Gambar</label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('buku');?>" class="btn btn-default">Kembali</a>
    </div>
</form>
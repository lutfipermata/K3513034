<legend><?php echo $title;?></legend>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" />
    <?php echo validation_errors(); echo $message;?>
    <div class="form-group">
        <label class="col-lg-2 control-label">Kode Buku</label>
        <div class="col-lg-5">
            <input type="text" name="kode_buku" class="form-control" value="<?php echo $buku['kode_buku'];?>" readonly="readonly">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Judul Buku</label>
        <div class="col-lg-5">
            <input type="text" name="judul_buku" class="form-control" value="<?php echo $buku['judul_buku'];?>">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Pengarang</label>
        <div class="col-lg-5">
            <input type="text" name="pengarang" class="form-control" value="<?php echo $buku['pengarang'];?>">
        </div>
    </div>
    
    <<div class="form-group">
        <label class="col-lg-2 control-label">Tahun Terbit</label>
        <div class="col-lg-5">
         <?php   echo "<select name='tahun_terbit' class='form-control'>";
		for ($i=1980; $i<=2015; $i++)
		{
			if ($i == $buku['tahun_terbit']) echo "<option selected>".$i."</option>";
			else echo "<option>".$i."</option>";
		}
		echo "</select>";
		?>
        </div>
    </div>
	
    <div class="form-group">
        <label class="col-lg-2 control-label">Kategori</label>
        <div class="col-lg-10">
            <input type="text" name="kategori" class="form-control" value="<?php echo $buku['kategori'];?>">
        </div>
    </div>
	
	
    <div class="form-group">
        <label class="col-lg-2 control-label">Keterangan Stok</label>
        <div class="col-lg-10">
		<?php
           if ($buku['keterangan_stok'] == "Masih") 
		   {
			echo "<input type='radio' name='keterangan_stok' value='Masih' checked class='form-control'> Masih<br>";
			echo "<input type='radio' name='keterangan_stok' value='Habis' class='form-control'> Habis";
			}
		if ($buku['keterangan_stok'] == "Habis") 
			{
			echo "<input type='radio' name='keterangan_stok' value='Masih' class='form-control'> Masih<br>";
			echo "<input type='radio' name='keterangan_stok' value='Habis' checked class='form-control'> Habis";
			}
		echo "<br>";
		?>
        </div>
    </div>
	
	
    <div class="form-group">
        <label class="col-lg-2 control-label">Deskripsi</label>
        <div class="col-lg-10">
            <textarea name="deskripsi"><?php echo $buku['deskripsi'];?></textarea>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-lg-2 control-label">Gambar</label>
        <div class="col-lg-10">
            <img src="<?php echo base_url('assets/img/'.$buku['gambar']);?>" height="200px" width="200px">
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-lg-2 control-label"></label>
        <div class="col-lg-5">
            <input type="file" name="gambar" class="form-control">
        </div>
    </div>
    
    <div class="form-group well">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
        <a href="<?php echo site_url('buku');?>" class="btn btn-default">Kembali</a>
    </div>
</form>
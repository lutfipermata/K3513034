<div class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search" action="<?php echo site_url('buku/cari');?>" method="post">
        <div class="form-group">
            <label>Cari Kode / Judul Buku</label>
            <input type="text" class="form-control" placeholder="Search" name="cari">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
    </form>
</div>
<a href="<?php echo site_url('buku/tambah');?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
<hr>
<legend>Detail Buku</legend>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>Gambar</td>
            <td>Kode Buku</td>
            <td>Judul</td>
            <td>Pengarang</td>
			<td>Tahun Terbit</td>
			<td>Kategori</td>
			<td>Keterangan Stok</td>
			<td>Deskripsi Buku</td>
            <td colspan="2"></td>
        </tr>
    </thead>
   
    <tr>
        <td><img src="<?php echo base_url('assets/img/'.$buku['gambar']);?>" height="100px" width="100px"></td>
        <td><?php echo $buku['kode_buku'];?></td>
        <td><?php echo $buku['judul_buku'];?></td>
        <td><?php echo $buku['pengarang'];?></td>
        <td><?php echo $buku['tahun_terbit'];;?></td>
		<td><?php echo $buku['kategori'];?></td>
		<td><?php echo $buku['keterangan_stok'];?></td>
		<td><?php echo $buku['deskripsi'];?></td>
    </tr>
    
</Table>

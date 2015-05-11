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
<?php echo $message;?>
<Table class="table table-striped">
    <thead>
        <tr>
            <td>No.</td>
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
    <?php $no=0; foreach($buku as $row ): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><img src="<?php echo base_url('assets/img/'.$row->gambar);?>" height="100px" width="100px"></td>
        <td><?php echo $row->kode_buku;?></td>
        <td><?php echo $row->judul_buku;?></td>
        <td><?php echo $row->pengarang;?></td>
        <td><?php echo $row->tahun_terbit;?></td>
		<td><?php echo $row->kategori;?></td>
		<td><?php echo $row->keterangan_stok;?></td>
		<td><?php echo $row->deskripsi;?></td>
        <td><a href="<?php echo site_url('buku/edit/'.$row->kode_buku);?>"><i class="glyphicon glyphicon-edit"></i></a></td>
        <td><a href="#" class="hapus" kode_buku="<?php echo $row->kode_buku;?>"><i class="glyphicon glyphicon-trash"></i></a></td>
		 <td><a href="<?php echo site_url('buku/detail/'.$row->kode_buku);?>" class="detail"><i class="glyphicon glyphicon-book"></i></a></td>
    </tr>
    <?php endforeach;?>
</Table>
<?php echo $pagination;?>

<script>
    $(function(){
        $(".hapus").click(function(){
            var kode_buku=$(this).attr("kode_buku");
            
            $("#idhapus").val(kode_buku);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('buku/hapus');?>",
                type:"POST",
                data:"kode_buku="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('buku/index/delete_success');?>";
                }
            });
        });
    });
    
</script>

<?php $this->load->view('header');
?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open_multipart('BahanBaku/tambahBahan');?>
				<?php echo validation_errors(); ?>

                <div class="form-group">
					<label for="" >ID Bahan Baku :  </label>
					<input type="text" name="id_bahan" class="form-control" id="id_barang" value="<?=$id;?>" readonly>
				</div>
                <div class="form-group">
                    <label for="">Nama Bahan :</label>
                    <input class="form-control" type="text" name="nama_bahan" id="">
                </div>
                <div class="form-group">
                    <label for="">Satuan :</label>
                    <input class="form-control" type="text" name="satuan" id="">
                </div>
                <div class="form-group">
                    <label for="">Harga :</label>
                    <input class="form-control" type="text" name="harga" id="">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer');
?>
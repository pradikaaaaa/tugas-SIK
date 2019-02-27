<?php $this->load->view('header');?>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open_multipart('Customer/index');?>
				<?php echo validation_errors(); ?>

                <div class="form-group">
					<label for="" >ID Customer :  </label>
					<input type="text" name="id_customer" class="form-control" id="id_barang" value="<?= $id  ?>" readonly>
				</div>
                <div class="form-group">
                    <label for="">Nama Customer :</label>
                    <input class="form-control" type="text" name="nama_customer" id="">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" id="ckeditor1"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Telepon :</label>
                    <input class="form-control" type="text" name="telepon" id="">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('footer');?>
<script src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function(){
        CKEDITOR.replace('ckeditor1');
    });
</script>


</body>
</html>

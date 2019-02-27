<?php $this->load->view('header'); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
					<label for="" >Kode Transaksi :  </label>
					<input type="text" name="nama" class="form-control" id="nama" value="<?=$kode_transaksi;?>" readonly>
				</div>
                <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <input class="form-control" type="date" name="tgl_transaki" id="">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Produksi</label>
                    <input class="form-control" type="date" name="tgl_produksi" id="">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Selesai Produksi</label>
                    <input class="form-control" type="date" name="tgl_selesai_produksi" id="">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pengiriman</label>
                    <input class="form-control" type="date" name="tgl_pengiriman" id="">
                </div>
                <div class="form-group">
                    <label>Kode Customer</label>
                    <select class="form-control">
                        <option id="title">----Pilih Kode Customer----</option>
                            <?php foreach ($kode_customer as $kc) { ?>
                                <option><?=$kc->id_customer;?></option>
                            <?php } ?>
                    </select>
                </div>


            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer');?>


</body>
</html>
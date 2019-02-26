<?php $this->load->view('header'); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                
                <div class="form-group">
					<label for="" >Kode Transaksi :  </label>
					<input type="text" name="nama" class="form-control" id="nama" placeholder="<?=$kode_transaksi;?>" readonly>
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
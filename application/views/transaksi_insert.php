<?php $this->load->view('header'); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="form-group">
					<label for="" >Kode Transaksi :  </label>
					<input type="text" name="nama" class="form-control" id="nama" value="<?=$kode_transaksi;?>" readonly>
				</div>

                
                
                <div class="row">
                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                        <label>Tanggal Transaksi</label>
                            <div class="input-group date form_date_transaksi col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value=""  readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                        <input type="hidden" id="dtp_input1" value="" name="tanggal" />
                        </div>
                    </div>


                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Pengiriman</label>
                                <div class="input-group date form_date_pengiriman col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input4">
                                    <input class="form-control" size="16" type="text" value=""  readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                </div>
                            <input type="hidden" id="dtp_input4" value="" name="tanggal" />
                        </div>
                    </div>
                    
                    
                </div>
                



                

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                        <label>Tanggal Produksi</label>
                            <div class="input-group date form_date_produksi col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2">
                                <input class="form-control" size="16" type="text" value=""  readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                        <input type="hidden" id="dtp_input2" value="" name="tanggal" />
                        </div>
                    </div>

                    
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                        <label>Tanggal Selesai Produksi</label>
                            <div class="input-group date form_date_selesai col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input3">
                                <input class="form-control" size="16" type="text" value=""  readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                        <input type="hidden" id="dtp_input3" value="" name="tanggal" />
                    </div>




                    </div>
                    
                


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

<script src="<?=base_url()?>assets/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?=base_url()?>assets/datetimepicker/js/locales/bootstrap-datetimepicker.id.js"></script>

<script type="text/javascript">
    $('.form_date_transaksi').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

    $('.form_date_produksi').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

    $('.form_date_selesai').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

    $('.form_date_pengiriman').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });


    </script>



</body>
</html>
<?php $this->load->view('header'); ?>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Kode Transaksi : </label>
                    <input type="text" name="kode_transaksi" class="form-control" id="kode_transaksi" value="<?=$kode_transaksi;?>"
                        readonly>
                </div>
                <div class="row">

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Transaksi</label>
                            <div class="input-group date form_date_transaksi col-md-12" data-date="" data-date-format="dd MM yyyy"
                                data-link-field="dtp_input1">
                                <input class="form-control" size="16" type="text" value="" disabled>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input1" value="" name="tanggal" />
                        </div>
                    </div>



                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Pengiriman</label>
                            <div class="input-group date form_date_pengiriman col-md-12" data-date="" data-date-format="dd MM yyyy"
                                data-link-field="dtp_input4">
                                <input class="form-control" size="16" type="text" value="" readonly>
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
                            <div class="input-group date form_date_produksi col-md-12" data-date="" data-date-format="dd MM yyyy"
                                data-link-field="dtp_input2">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input2" value="" name="tanggal" />
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label>Tanggal Selesai Produksi</label>
                            <div class="input-group date form_date_selesai col-md-12" data-date="" data-date-format="dd MM yyyy"
                                data-link-field="dtp_input3">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                            </div>
                            <input type="hidden" id="dtp_input3" value="" name="tanggal" />
                        </div>




                    </div>




                </div>




                <div class="form-group">
                    <label>Kode Customer</label>
                    <select class="form-control" name="id_customer" id="id_customer">
                        <option id="title">----Pilih Kode Customer----</option>
                        <?php foreach ($kode_customer as $kc) { ?>
                        <option>
                            <?=$kc->id_customer;?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Barang">Barang</label>
                    <input class="form-control" type="text" name="barang" id="barang" placeholder="Barang">
                    <input type="hidden" id="id" name="id_barang">
                    <input type="hidden" id="nama_barang" name="nama_barang">
                    <input type="hidden" id="satuan" name="satuan">
                    <input type="hidden" id="harga" name="harga">
                </div>
                <div class="form-group">
                    <label for="">quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                </div>

                <button type="button" class="btn btn-primary add_cart" id="btn">button</button>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-body" id="cart_details">
                Cart Kosong
            </div>
            <?php echo form_open_multipart('Barang_cart/proses_order');?>
			<?php echo validation_errors(); ?>
            <input type="hidden" name="idcustomer" id="">
            <input type="hidden" name="kode_transaksi" class="form-control" id="kode_transaksi" value="<?=$kode_transaksi;?>">
            <button type="submit" class="btn btn-primary btn-block">Insert Data</button>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>


<?php $this->load->view('footer');?>

<script src="<?=base_url()?>assets/datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?=base_url()?>assets/datetimepicker/js/locales/bootstrap-datetimepicker.id.js"></script>
<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_customer').on('change',function(){
            var idcustomer = $('#id_customer').val();
            $('[name="idcustomer"]').val(idcustomer);
        });

        $('#barang').autocomplete({
                source: "<?php echo site_url('Barang/get_autocomplete');?>",

                select: function (event, ui) {
                    $('[name="id_barang"]').val(ui.item.id_barang);
					$('[name="nama_barang"]').val(ui.item.nama_barang);
                    $('[name="satuan"]').val(ui.item.satuan);
                    $('[name="harga"]').val(ui.item.harga);
                }
        });

        $('.add_cart').click(function(){
                var id              = $('#id').val();
                var nama_barang     = $('#nama_barang').val();
                var satuan          = $('#satuan').val();
                var harga           = $('#harga').val();
                var kode_transaksi  = $('#kode_transaksi').val();
                var id_customer     = $('#id_customer').val();
                var quantity        = $('#quantity').val();

                if (quantity != '' && quantity > 0) {
                    $.ajax({
                        url:"<?php echo base_url();?>index.php/Barang_cart/add",
                        method: "POST",
                        data: {
                            id:id,
                            nama_barang:nama_barang,
                            satuan:satuan,
                            quantity:quantity,
                            harga:harga,
                            kode_transaksi:kode_transaksi,
                            id_customer:id_customer,
                        },
                        success:function(data){
                            $('#cart_details').html(data);
                            alert("Product add to cart");
                        }
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Quantity belum di isi!'

                    });
                }
        });
        $(document).on('click', '.remove_inventory', function(){
                var row_id = $(this).attr('id');
                if (confirm("Are you sure to delete this?")) {
                    $.ajax({
                            url: "<?php echo base_url();?>index.php/Barang_cart/remove",
                            method: "POST",
                            data: {row_id:row_id},
                            success:function(data){
                                Swal.fire(
                                    'Good job!',
                                    'Product remove from cart!',
                                    'success'
                                );
                                $('#cart_details').html(data);
                            }
                    });
                }else{
                    return false;
                }
                });

            $(document).on('click', '#clear_cart', function(){
                if (confirm("Are you sure to clear this cart?")) {
                    $.ajax({
                        url: "<?php echo base_url();?>index.php/Barang_cart/clear",
                        success:function(data){
                            Swal.fire(
                                    'Good job!',
                                    'Clear the cart!',
                                    'success'
                            );
                            $('#cart_details').html(data);
                        }
                    });
                } else {
                    return false;
                }
            });
        $('#cart_details').load("<?php echo base_url();?>index.php/Barang_cart/load");

    });
    $('.form_date_transaksi').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    $('.form_date_produksi').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    $('.form_date_selesai').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    $('.form_date_pengiriman').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });


</script>



</body>

</html>
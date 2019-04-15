<?php $this->load->view('header'); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

            Bahan Baku List

            <table width="100%" class="table table-striped table-bordered table-hover" id="dt-transaksi">
                    <thead>
                        <tr>
                            <th>ID Bahan</th>
                            <th>Nama Bahan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php 
                            foreach ($bahan as $key) {
                            ?>
                            <tr>
                                <td><?=$key->id_bahan?></td>
                                <td><?=$key->nama_bahan?></a></td>
                                <td><?=$key->satuan?></td>
                                <td><?=$key->harga?></td>
                            </tr>
                            <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


<?php $this->load->view('footer');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dt-transaksi').DataTable();
	});

</script>
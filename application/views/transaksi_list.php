<?php $this->load->view('header'); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">

                Transaksi
                <table width="100%" class="table table-striped table-bordered table-hover" id="dt-transaksi">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php 
                            foreach ($transaksi as $key) {
                            ?>
                            <tr>
                                <td><?=$key->id_transaksi?></td>
                                <td><?=$key->tgl_transaksi?></a></td>
                                <td><?=$key->nama_customer?></td>
                                <td>
                                    <a href="<?=site_url()?>/Transaksi/detailtransaksi/<?=$key->id_transaksi?>">
                                    <button type="button" class="btn btn-info btn-block" >Detail</button>
                                    </a>
                                    
                                </td>
                            </tr>
                            <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->



<?php $this->load->view('footer');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#dt-transaksi').DataTable();
	});

</script>
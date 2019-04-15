<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    
</head>
<body>


<table align="center" border="0">
    <tr>
        <td>ID Transaksi</td>
        <td><?=$header[0]->id_transaksi?></td>
        <td></td>
        <td>ID Customer</td>
        <td><?=$header[0]->id_customer?></td>
    </tr>
    <tr>
        <td>Tanggal Transaksi</td>
        <td><?=$header[0]->tgl_transaksi?></td>
        <td></td>
        <td>Tanggal Produksi</td>
        <td><?=$header[0]->tgl_produksi?></td>
    </tr>
    <tr>
        <td>Tanggal Selesai</td>
        <td><?=$header[0]->tgl_selesai_produksi?></td>
        <td></td>
        <td>Tanggal Pengiriman</td>
        <td><?=$header[0]->tgl_pengiriman?></td>
    </tr>
    <tr>
        <td colspan="5">
            <table align="center" border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Barang</th>
                    <th>Total</th>
                </tr>
                <?php
                    $i = 0; 
                    $semua = 0;
                    foreach ($orderItem as $key) {
                        $i++;
                        $total = $key->jumlah * $key->harga;
                        $semua+=$total;
                ?>
                <tr>
                        <td><?=$i?></td>
                        <td><?=$key->nama?></td>
                        <td><?=$key->jumlah?></td>
                        <td><?=$key->harga?></td>
                        <td><?=$total?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="4">Total</td>
                    <td><?=$semua?></td>
                </tr>


            </table>
        </td>
    </tr>
</table>
    
    
</body>
</html>
<?php 
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*, nama, SUM(dimensi*harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_user ON tb_user.id = tb_order.customer
LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_pemesanan ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}

//$select_kat_produk = mysqli_query($conn, "SELECT id_kat_produk,kategori_produk FROM tb_kategori_produk");
?>
<body onload="print()">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="frmedit">
        <center><h2> Laporan Daftar Pemesanan</h2></center>
        <center>
            <table class="table table-bordered">
            <thead>
                    <tr>
                    <th scope="col">No</th>

                    <th scope="col">Kode Order</th>

                    <th scope="col">Waktu Order</th>

                    <th scope="col">Waktu Bayar</th>

                    <th scope="col">Pelanggan</th>

                    <th scope="col">Alamat</th>

                    <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1; 
                        foreach ($result as $row) {
                        ?>  
                        <tr >
                            <th scope="row"><?php echo $no++ ?></th>

                            <td><?php echo $row['id_order'] ?></td>

                            <td><?php echo $row['waktu_pemesanan'] ?></td>

                            <td><?php echo $row['waktu_bayar'] ?></td>

                            <td><?php echo $row['pelanggan'] ?></td>

                            <td><?php echo $row['address'] ?></td>

                            <td><?php echo number_format($row['harganya'], 0, ',','.')  ?></td>

                        
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </center>
    </form>
</body>


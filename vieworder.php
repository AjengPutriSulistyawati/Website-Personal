<?php 
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*, nama, SUM(dimensi*harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_user ON tb_user.id = tb_order.customer
LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_pemesanan DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}

//$select_kat_produk = mysqli_query($conn, "SELECT id_kat_produk,kategori_produk FROM tb_kategori_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Daftar Order
        </div>
        <div class="card-body">
        
            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>

            <?php
            }
            
            ?>
            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">No</th>
                        <th scope="col">Kode Order</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Status</th>
                        <th scope="col">Waktu Order</th>
                        <th scope="col">Aksi</th>
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
                        <td><?php echo $row['pelanggan'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo number_format($row['harganya'], 0, ',','.')  ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>Dibayar</span>" : " " ; ?></td> 
                        <td><?php echo $row['waktu_pemesanan'] ?></td>
                        <td >
                            <div class="d-flex">
                            <a class="btn btn-info btn-sm me-1" href="./?x=vieworderitem&order=<?php echo $row['id_order']."&pelanggan=".$row['pelanggan']."&address=".$row['address']."&hp=".$row['hp'] ?>"><i class="bi bi-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php 
        }
        ?>
    </div>
</div>
</div>




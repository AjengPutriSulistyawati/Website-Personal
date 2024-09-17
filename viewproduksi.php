<?php 
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT * FROM tb_list_order
LEFT JOIN tb_order ON tb_order.id_order =  tb_list_order.kode_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order 
ORDER BY waktu_pemesanan ASC");

while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
    
}

$select_produk = mysqli_query($conn, "SELECT id,nama_produk FROM tb_daftar_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Daftar Produksi
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
                        <th scope="col">Waktu Order</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Panjang</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result as $row) {
                        if($row['status'] !=2){

                    ?>  
                    <tr >
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['kode_order']?></td>
                        <td><?php echo $row['waktu_pemesanan']?></td>
                        <td><?php echo $row['nama_produk']?></td>
                        <td><?php echo $row['panjang']?></td>
                        <td><?php echo $row['lebar']?></td>
                        <td><?php echo $row['jumlah']?></td>
                        <td><?php echo $row['catatan']?></td>
                        <td>
                            <?php 
                                if($row['status']==1){
                                    echo "<span class='badge text-bg-warning'> Process </span>";
                                }elseif($row['status']==2){
                                    echo "<span class='badge text-bg-primary'> Ready </span>";
                                }
                            ?>
                        </td>
                    </tr>
                    <?php 
                    }
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




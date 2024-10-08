<?php 
include "proses/connect.php";

$query = mysqli_query($conn, "SELECT *, SUM(dimensi*harga*jumlah) AS harganya FROM tb_list_order
LEFT JOIN tb_order ON tb_order.id_order =  tb_list_order.kode_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_list_order
HAVING tb_list_order.kode_order = $_GET[order]");

$kode = $_GET['order'];
$address = $_GET['address'];
$pelanggan = $_GET['pelanggan'];
$hp = $_GET['hp'];

while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
    //$kode = $record['id_order'];
    //$address = $record['address'];
    //$pelanggan = $record['pelanggan'];
    //$hp = $_GET['hp'];
}

$select_produk = mysqli_query($conn, "SELECT id,nama_produk FROM tb_daftar_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order Item
        </div>
        <div class="card-body">
        <a href="vieworder" class="btn btn-info mb-3"> <i class="bi bi-arrow-left"></i> Kembali</a> 
            <div class= "row">
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="kodeorder"  value="<?php echo $kode; ?>">
                    <label  for="uploadFoto">Kode Order</label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="pelanggan"  value="<?php echo $pelanggan; ?>">
                    <label  for="uploadFoto">Nama</label>  
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="address"  value="<?php echo $address; ?>">
                    <label  for="uploadFoto">Alamat</label>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-floating mb-3">
                    <input disabled type="text" class="form-control" id="hp"  value="<?php echo $hp; ?>">
                    <label  for="uploadFoto">No.Hp</label>  
                </div>
            </div>
            </div>
            <!-- Modal Tambah Item Baru-->
            
            <!-- End Modal Tambah Item Baru-->

            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>
            <!-- Modal View-->
        
            <!-- End Modal View-->

            <!-- Modal Edit-->
           
            <!-- End Modal Edit-->


             <!-- Modal Delete-->
            
            <!-- End Modal Delete-->

            <?php
            }
            
            ?>

            <!-- Modal Bayar-->
            
            <!-- End Modal Bayar-->

            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Panjang</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">Dimensi</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total=0; 
                    foreach ($result as $row) {
                    ?>  
                    <tr >
                        <td><?php echo $row['nama_produk']?></td>
                        <td><?php echo number_format($row['harga'], 0, ',','.')?></td>
                        <td><?php echo $row['panjang']?></td>
                        <td><?php echo $row['lebar']?></td>
                        <td><?php echo $row['dimensi']?></td>
                        <td><?php echo $row['jumlah']?></td>
                        <td>
                            <?php 
                                if($row['status']==1){
                                    echo "<span class='badge text-bg-warning'> Process </span>";
                                }elseif($row['status']==2){
                                    echo "<span class='badge text-bg-primary'> Ready </span>";
                                }
                            ?>
                        </td>
                        <td><?php echo $row['catatan']?></td>
                        <td><?php echo number_format($row['harganya'], 0, ',','.')?></td>
                    </tr>
                    <?php 
                    $total +=$row['harganya'];
                    }
                    ?>
                    <tr>
                        <td class="fw-bold" colspan ="8">
                            Total Harga
                        </td>
                        <td class="fw-bold">
                            <?php echo number_format($total,0,',','.'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php 
        }
        ?>
    </div>
</div>
</div>




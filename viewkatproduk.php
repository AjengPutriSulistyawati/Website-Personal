<?php 
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_kategori_produk");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Kategori Produk
        </div>
        <div class="card-body">
        
            <?php 
            foreach ($result as $row){
            ?>

            <?php
            }
            if(empty($result)){
                echo "Data user tidak ada";
            }else {

            
            ?>
            <!-- Tabel Daftar Kategori Produk -->
            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th> 
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Kategori Produk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1; 
                    foreach ($result as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php 
                                if($row['jenis_produk'] ==1){
                                    echo "Banner/Spanduk";
                                }elseif($row['jenis_produk'] ==2){
                                    echo "Stiker";
                                }elseif($row['jenis_produk'] ==3){
                                    echo "Buku Menu";
                                }
                                elseif($row['jenis_produk'] ==4){
                                    echo "Kartu Nama";
                                }
                                ?></td>
                        <td><?php echo $row['kategori_produk'] ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
         <!-- End Tabel Daftar Kategori Produk -->
        <?php 
        }
        ?>
    </div>
</div>
</div>




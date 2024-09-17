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
            Halaman Produksi
        </div>
        <div class="card-body">
           
            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>
            
            <!-- Modal Terima Produksi-->
            <div class="modal fade" id="terima<?php echo $row['id_list_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Terima Produksi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_terima_orderitem.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="produk" id="" disabled >
                                                <option selected hidden value=""> Pilih Produk</option>
                                                <?php 
                                                    foreach($select_produk as $value){
                                                        if($row['produk'] == $value['id']){
                                                            echo "<option selected value=$value[id]>$value[nama_produk]</option>";
                                                        }else{
                                                        echo "<option value=$value[id]>$value[nama_produk]</option>";
                                                    }
                                                    }
                                                ?>
                                            </select>
                                            <label for="produk"> Produk RJ Digital Printing</label>
                                            <div class="invalid-feedback">Pilih Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" value="<?php echo $row['jumlah']?>" readonly>
                                            <label for="floatingInput">Qty</label>
                                            <div class="invalid-feedback">Masukkan Jumlah Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Panjang" name="panjang"  value="<?php echo $row['panjang']?>" readonly>
                                            <label for="floatingInput">Panjang</label>
                                            <div class="invalid-feedback">Masukkan Panjang Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Lebar" name="lebar"  value="<?php echo $row['lebar']?>" readonly>
                                            <label for="floatingInput">Lebar</label>
                                            <div class="invalid-feedback">Masukkan Lebar Produk.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan"  value="<?php echo $row['catatan']?>" name="catatan">
                                            <label for="floatingPassword">Catatan</label>
                                            <div class="invalid-feedback">Masukkan Catatan Produk .</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="terima_orderitem_validate" value="1234">Terima</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Terima Produksi-->

            <!-- Modal Siap Diambil-->
            <div class="modal fade" id="siapdiambil<?php echo $row['id_list_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Siap Diambil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_siapdiambil_orderitem.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="produk" id="" disabled >
                                                <option selected hidden value=""> Pilih Produk</option>
                                                <?php 
                                                    foreach($select_produk as $value){
                                                        if($row['produk'] == $value['id']){
                                                            echo "<option selected value=$value[id]>$value[nama_produk]</option>";
                                                        }else{
                                                        echo "<option value=$value[id]>$value[nama_produk]</option>";
                                                    }
                                                    }
                                                ?>
                                            </select>
                                            <label for="produk"> Produk RJ Digital Printing</label>
                                            <div class="invalid-feedback">Pilih Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" value="<?php echo $row['jumlah']?>" readonly>
                                            <label for="floatingInput">Qty</label>
                                            <div class="invalid-feedback">Masukkan Jumlah Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Panjang" name="panjang"  value="<?php echo $row['panjang']?>" readonly>
                                            <label for="floatingInput">Panjang</label>
                                            <div class="invalid-feedback">Masukkan Panjang Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Lebar" name="lebar"  value="<?php echo $row['lebar']?>" readonly>
                                            <label for="floatingInput">Lebar</label>
                                            <div class="invalid-feedback">Masukkan Lebar Produk.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan"  value="<?php echo $row['catatan']?>" name="catatan">
                                            <label for="floatingPassword">Catatan</label>
                                            <div class="invalid-feedback">Masukkan Catatan Produk .</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="siapdiambil_orderitem_validate" value="1234">Siap Diambil</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Siap Diambil-->

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
                        <th scope="col">Aksi</th>
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
                        <td >
                            <div class="d-flex">
                            <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary btn-sm me-1 text-nowrap disabled" : "btn btn-primary btn-sm me-1" ; ?> "data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_order']?>">Terima</button>
                            <button class="<?php echo (empty($row['status']) || $row['status'] !=1) ? "btn btn-secondary btn-sm me-1 text-nowrap disabled" : "btn btn-success btn-sm me-1 text-nowrap" ; ?> " data-bs-toggle="modal" data-bs-target="#siapdiambil<?php echo $row['id_list_order']?>">Siap Diambil</button>
                            </div>
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




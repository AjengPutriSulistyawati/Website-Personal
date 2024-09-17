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
        <a href="order" class="btn btn-info mb-3"> <i class="bi bi-arrow-left"></i> Kembali</a> 
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
            <div class="modal fade" id="tambahItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  class="needs-validation" novalidate action="proses/proses_input_orderitem.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="address" value="<?php echo $address ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="hp" value="<?php echo $hp ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="produk" id="">
                                                <option selectrd hidden value=""> Pilih Produk</option>
                                                <?php 
                                                    foreach($select_produk as $value){
                                                        echo "<option value=$value[id]>$value[nama_produk]</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label for="produk"> Produk RJ Digital Printing</label>
                                            <div class="invalid-feedback">Pilih Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" required>
                                            <label for="floatingInput">Qty</label>
                                            <div class="invalid-feedback">Masukkan Jumlah Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Panjang" name="panjang" required>
                                            <label for="floatingInput">Panjang</label>
                                            <div class="invalid-feedback">Masukkan Panjang Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Lebar" name="lebar" required>
                                            <label for="floatingInput">Lebar</label>
                                            <div class="invalid-feedback">Masukkan Lebar Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Dimensi" name="dimensi" >
                                            <label for="floatingInput">Dimensi</label>
                                            <div class="invalid-feedback">Masukkan Dimensi Produk.</div>
                                        </div>
                                    </div>
                                    <small>*panjang, lebar,dan dimensi dalam satuan meter</small>
                                <div><small class= "text-danger">*panjang, lebar,dan dimensi diisi hanya untuk pemesanan spanduk/banner selain itu isikan angka 1</small></div>
                                </div>
                                <div class="row">
                                <div class="col-lg-12">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="design" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Produk</label>
                                            <div class="invalid-feedback">Masukkan Foto Produk.</div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Catatan"  name="catatan">
                                            <label for="floatingPassword">Catatan</label>
                                            <div class="invalid-feedback">Masukkan Catatan Produk .</div>
                                        </div>
                                         <b> *Jika Anda Memiliki Design Sendiri Atau Ingin Dibuatkan Dapat Menghubungi Via <a href="https://wa.link/nwgrg7">Whatsapp </b></a>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer"> 
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_orderitem_validate" value="1234">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
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
            <div class="modal fade" id="ModalEdit<?php echo $row['id_list_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_edit_orderitem.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="address" value="<?php echo $address ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="hp" value="<?php echo $hp ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="produk" id="" >
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
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Jumlah" name="jumlah" value="<?php echo $row['jumlah']?>" required>
                                            <label for="floatingInput">Qty</label>
                                            <div class="invalid-feedback">Masukkan Jumlah Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Panjang" name="panjang"  value="<?php echo $row['panjang']?>" required>
                                            <label for="floatingInput">Panjang</label>
                                            <div class="invalid-feedback">Masukkan Panjang Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Lebar" name="lebar"  value="<?php echo $row['lebar']?>" required>
                                            <label for="floatingInput">Lebar</label>
                                            <div class="invalid-feedback">Masukkan Lebar Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Dimensi" name="dimensi"  value="<?php echo $row['dimensi']?>" required>
                                            <label for="floatingInput">Dimensi</label>
                                            <div class="invalid-feedback">Masukkan Dimensi Produk.</div>
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
                                <button type="submit" class="btn btn-primary" name="edit_orderitem_validate" value="1234">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit-->


             <!-- Modal Delete-->
             <div class="modal fade" id="ModalDelete<?php echo $row['id_list_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_delete_orderitem.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id_list_order'] ?>">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="address" value="<?php echo $address ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="hp" value="<?php echo $hp ?>">
                            <div class="col-lg-12">
                                Apakah anda ingin menghapus produk <b><?php echo $row['nama_produk']?></b> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_orderitem_validate" value="1234">Delete</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Delete-->

            <?php
            }
            
            ?>

            <!-- Modal Bayar-->
            <div class="modal fade" id="bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pembayaran</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

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
                                <td><?php echo $row['status']?></td>
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
                            <div><span class="text-danger fs-6 fw-semibold"> Apakah Anda Yakin Ingin Melakukan Pembayaran ?</span></div>
                            <div><span class="text fs-6 fw-semibold"> Pembayaran dapat dilakukan dengan transfer ke nomor rekening Bank <b> BCA 081464784 a/n  wahyu</b></span></div>
                            <form  class="needs-validation" novalidate action="proses/proses_bayar.php" method="POST">
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="address" value="<?php echo $address ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <input type="hidden" name="hp" value="<?php echo $hp ?>">
                                <input type="hidden" name="total" value="<?php echo $total ?>">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Nominal Uang" name="uang" required>
                                            <label for="floatingInput"> Nominal Uang</label>
                                            <div class="invalid-feedback">Masukkan Jumlah Nominal Uang.</div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="bayar_validate" value="1234">Bayar</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                        <th scope="col">Aksi</th>
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
                        <td >
                            <div class="d-flex">
                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1" ; ?> "data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_list_order']?>"><i class="bi bi-pencil-square"></i></button>
                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1" ; ?> " data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_list_order']?>"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
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
        <div>
        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary" ; ?>"data-bs-toggle="modal" data-bs-target="#tambahItem"><i class="bi bi-bag-plus-fill"></i> Tambah Item</button>
        <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success" ; ?>"data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-cash-coin"></i> Bayar</button>    
        </div>
        <div class="text-danger"><b>*Jika sudah melakukan pembayaran via transfer harap kirimkan bukti pembayaran via <a href="https://wa.link/nwgrg7">Whatsapp </b></a></b></div>
    </div>
</div>
</div>




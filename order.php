<?php 
include "proses/connect.php"; 
date_default_timezone_set('Asia/Jakarta');

$id_user = $_SESSION['id_RJ'];
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*, nama, SUM(dimensi*harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_user ON tb_user.id = tb_order.customer
LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
WHERE customer = '$id_user'
GROUP BY id_order ORDER BY waktu_pemesanan DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record; 
}

//$select_kat_produk = mysqli_query($conn, "SELECT id_kat_produk,kategori_produk FROM tb_kategori_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order
        </div>
        <div class="card-body">
            <div class= "row">
                <div class= "col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Order</button>
                </div>
            </div>
            <!-- Modal Tambah Order Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Order Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  class="needs-validation" novalidate action="proses/proses_input_order.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="uploadFoto" name="kode_order" value="<?php echo date('ymdHi').rand(100,999) ?>" readonly>
                                            <label for="uploadFoto">Kode Order</label>
                                            <div class="invalid-feedback">Masukkan Kode Order.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan" placeholder="pelanggan" name="pelanggan" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">Masukkan Nama Pelanggan.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="hp" placeholder="hp" name="hp" required>
                                            <label for="hp">No.Hp</label>
                                            <div class="invalid-feedback">Masukkan No.Hp Anda.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12 text-area">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="address" placeholder="Alamat" name="address" required>
                                            <label for="address">Alamat</label>
                                            <div class="invalid-feedback">Masukkan Alamat.</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="row">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_order_validate" value="1234">Buat Order</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Order Baru-->

            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>

            <!-- Modal Edit-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_order']?>">" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_edit_order.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input readonly type="text" class="form-control" id="uploadFoto" name="kode_order" value="<?php echo $row['id_order'] ?>" readonly>
                                            <label for="uploadFoto">Kode Order</label>
                                            <div class="invalid-feedback">Masukkan Kode Order.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pelanggan" placeholder="Pelanggan" name="pelanggan" value="<?php echo $row['pelanggan'] ?>" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">Masukkan Nama Pelanggan.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="hp" placeholder="hp" name="hp" value="<?php echo $row['hp'] ?>" required>
                                            <label for="hp">No.Hp</label>
                                            <div class="invalid-feedback">Masukkan No.Hp Anda.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-12 text-area">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="address" placeholder="Alamat" name="address" value="<?php echo $row['address'] ?>" required>
                                            <label for="address">Alamat</label>
                                            <div class="invalid-feedback">Masukkan Alamat.</div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="row">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="edit_order_validate" value="1234">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit-->


             <!-- Modal Delete-->
             <div class="modal fade" id="ModalDelete<?php echo $row['id_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id_order']?>"name="kode_order">
                            <div class="col-lg-12">
                                Apakah anda ingin menghapus order atas nama <b><?php echo $row['pelanggan']?></b> dengan kode order <b><?php echo $row['id_order']?></b>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_order_validate" value="1234">Delete</button>
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
            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">No</th>
                        <th scope="col">Kode Order</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">User</th>
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
                            <a class="btn btn-info btn-sm me-1" href="./?x=orderitem&order=<?php echo $row['id_order']."&pelanggan=".$row['pelanggan']."&address=".$row['address']."&hp=".$row['hp'] ?>"><i class="bi bi-eye"></i></a>
                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-warning btn-sm me-1" ; ?> "data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order']?>"><i class="bi bi-pencil-square"></i></button>
                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm me-1 disabled" : "btn btn-danger btn-sm me-1" ; ?> " data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order']?>"><i class="bi bi-trash"></i></button>
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




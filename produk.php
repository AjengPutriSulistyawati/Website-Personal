<?php 
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_produk
LEFT JOIN tb_kategori_produk ON tb_kategori_produk.id_kat_produk = tb_daftar_produk.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}

$select_kat_produk = mysqli_query($conn, "SELECT id_kat_produk,kategori_produk FROM tb_kategori_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Produk
        </div>
        <div class="card-body">
            <div class= "row">
                <div class= "col d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahUser">Tambah Produk</button>
                </div>
            </div>
            <!-- Modal Tambah Produk Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  class="needs-validation" novalidate action="proses/proses_input_produk.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Produk</label>
                                            <div class="invalid-feedback">Masukkan Foto Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Produk" name="nama_produk" required>
                                            <label for="floatingInput">Nama Produk</label>
                                            <div class="invalid-feedback">Masukkan Nama Produk.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6"> 
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_produk" required >
                                                <option selected hidden value="">Pilih Kategori Produk</option>
                                                <?php
                                                foreach ($select_kat_produk as $value){
                                                    echo "<option value=".$value['id_kat_produk'].">$value[kategori_produk]<?option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Produk</label>
                                            <div class="invalid-feedback">Pilih Kategori Produk .</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">Masukkan Harga Produk .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"  name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                            <div class="invalid-feedback">Masukkan Keterangan Produk .</div>
                                        </div>
                                    </div>
                                </div>
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_produk_validate" value="1234">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Tambah Produk Baru-->

            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>
            <!-- Modal View-->
            <div class="modal fade" id="ModalView<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  class="needs-validation" novalidate action="proses/proses_input_produk.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_produk'] ?>" disabled>
                                            <label for="floatingInput">Nama Produk</label>
                                            <div class="invalid-feedback">Masukkan Nama Produk.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"  disabled>
                                                <option selected hidden value="">Pilih Kategori Produk</option>
                                                <?php
                                                foreach ($select_kat_produk as $value){
                                                    if ($row['kategori']==$value['id_kat_produk']){
                                                        echo "<option selected value=" . $value['id_kat_produk'] .">$value[kategori_produk]<?option>";
                                                    } else {
                                                        echo "<option value=" . $value['id_kat_produk'] .">$value[kategori_produk]<?option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Produk</label>
                                            <div class="invalid-feedback">Pilih Kategori Produk .</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>" disabled>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">Masukkan Harga Produk .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  value="<?php echo $row['keterangan'] ?>" disabled>
                                            <label for="floatingPassword">Keterangan</label>
                                            <div class="invalid-feedback">Masukkan Keterangan Produk .</div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal View-->

            <!-- Modal Edit-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id']?>">" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form  class="needs-validation" novalidate action="proses/proses_edit_produk.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required >
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Produk</label>
                                            <div class="invalid-feedback">Masukkan Foto Produk.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Produk" name="nama_produk" required value="<?php echo $row['nama_produk'] ?>">
                                            <label for="floatingInput">Nama Produk</label>
                                            <div class="invalid-feedback">Masukkan Nama Produk.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="kat_produk">
                                                <option selected hidden value="">Pilih Kategori Produk</option>
                                                <?php
                                                foreach ($select_kat_produk as $value){
                                                    if ($row['kategori']==$value['id_kat_produk']){
                                                        echo "<option selected value=" . $value['id_kat_produk'] .">$value[kategori_produk]<?option>";
                                                    } else {
                                                        echo "<option value=" . $value['id_kat_produk'] .">$value[kategori_produk]<?option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Produk</label>
                                            <div class="invalid-feedback">Pilih Kategori Produk .</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="Harga" name="harga" required value="<?php echo $row['harga'] ?>">
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">Masukkan Harga Produk .</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan"  name="keterangan" value="<?php echo $row['keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                            <div class="invalid-feedback">Masukkan Keterangan Produk .</div>
                                        </div>
                                    </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_produk_validate" value="1234">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal Edit-->


             <!-- Modal Delete-->
             <div class="modal fade" id="ModalDelete<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_delete_produk.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id']?>"name="id">
                            <input type="hidden" value="<?php echo $row['foto']?>"name="foto">
                            <div class="col-lg-12">
                                Apakah anda ingin menghapus produk <b><?php echo $row['nama_produk']?></b> ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="delete_produk_validate" value="1234">Delete</button>
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
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jenis Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
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
                        <td> <div style="width: 90px"><img src="assets/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="..."></div></td>
                        <td><?php echo $row['nama_produk'] ?></td>
                        <td><?php echo $row['keterangan'] ?></td>
                        <td>
                        <?php 
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
                                ?>
                        </td>
                        <td><?php echo $row['kategori_produk'] ?></td>
                        <td><?php echo $row['harga'] ?></td>
                        <td >
                            <div class="d-flex">
                            <button class="btn btn-info btn-sm me-1"data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id']?>"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-warning btn-sm me-1"data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id']?>"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id']?>"><i class="bi bi-trash"></i></button>
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




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
            Halaman Daftar Produk
        </div>
        <div class="card-body">
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




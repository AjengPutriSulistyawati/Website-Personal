<form  class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">Masukkan nama.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">Masukkan username.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="level" required >
                                                <option selected hidden value="">Pilih Level User</option>
                                                <option value="1">Pimpinan</option>
                                                <option value="2">Admin</option>
                                                <option value="3">Customer</option>
                                                <option value="4">Produksi</option>  
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                            <div class="invalid-feedback">Pilih level User.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3" name="nohp">
                                            <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" >
                                            <label for="floatingInput">No HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="floatingInput" placeholder="Password" disabled value="12345" name="password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="" style="height:100px" name="alamat"></textarea>
                                <label for="floatingInput">Alamat</label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="input_user_validate" value="1234">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





            
<?php 
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Registrasi
        </div>
        <div class="card-body">
            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Akun </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
            <form class="row g-3 needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                <div class="col-md-12">
                    <label for="validationCustom01" class="form-label">Nama </label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Your Name" name="nama" required>
                    <label for="validationCustom01">Nama</label>
                    <div class="invalid-feedback">Masukkan nama.</div>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom02" class="form-label">Username</label>
                    <input type="email" class="form-control" id="validationCustom02" placeholder="name@example.com" name="username" required>
                    <label for="validationCustom02">Username</label>
                    <div class="invalid-feedback">Masukkan username.</div>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustomUsername" class="form-label">Level</label>
                    <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <select class="form-select" aria-label="Default select example" name="level" required >
                            <option selected hidden value="">Pilih Level User</option>
                            <option value="3">Customer</option> 
                        </select>
                        <div class="invalid-feedback">Pilih level User.</div>
                        <div class="valid-feedback">
                    Looks good!
                    </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom03" class="form-label">Nomor Hp</label>
                    <input type="number" class="form-control" id="validationCustom03" placeholder="08xxxxxxxxxx" name="nohp" required>
                    <label for="validationCustom03">Nomor Hp</label>
                    <div class="invalid-feedback">Masukkan Nomor Hp.</div>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom04" class="form-label">Pasword</label>
                    <input type="password" class="form-control" id="validationCustom04" placeholder="Password" disabled value="12345" name="password">
                    <label for="validationCustom04">Password</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="validationCustom05" class="form-label">Alamat</label>
                    <textarea class="form-control" id="validationCustom05" style="height:100px" name="alamat" required></textarea>
                    <div class="invalid-feedback">Masukkan Alamat.</div>
                    <div class="valid-feedback">
                    Looks good!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="input_user_validate" value="1234">Save changes</button>
                </div>
            </form>
            <!-- End Modal Tambah User Baru-->

            <?php 
            foreach ($result as $row){
            ?>
            <!-- Modal View-->
           
            <!-- End Modal View-->

            <!-- Modal Edit-->
           
            <!-- End Modal Edit-->


             <!-- Modal Delete-->
            
            <!-- End Modal Delete-->


            <!-- Modal Reset Password-->
            
            <!-- End Modal Reset Password-->

            <?php
            }
            if(empty($result)){
                echo "Data user tidak ada";
            }else {

            
            ?>
            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php 

        ?>
    </div>
</div>
</div>




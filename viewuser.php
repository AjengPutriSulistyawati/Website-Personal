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
            Halaman Daftar User
        </div>
        <div class="card-body">

            <?php 
            foreach ($result as $row){
            ?>
            <!-- Modal View-->
             <div class="modal fade" id="ModalView<?php echo $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                            
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-floating mb-3">
                                            <input disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama']?>">
                                            <label for="floatingInput"> Nama</label>
                                            <div class="invalid-feedback">Masukkan nama.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username']?>">
                                            <label for="floatingInput"> Username</label>
                                            <div class="invalid-feedback">Masukkan username.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select disabled class= "form-select" aria-label ="Default select example" required name="level" id="">
                                            <?php
                                            $data = array ("Pimpinan","Admin","Customer");
                                            foreach($data as $key =>$value){
                                                if($row['level'] == $key+1){
                                                    echo "<option selected value='$key'>$value</option>";
                                                }else {
                                                    echo "<option value='$key'>$value</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                            <label for="floatingInput"> Level User</label>
                                            <div class="invalid-feedback">Pilih level User.</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3" name="nohp">
                                            <input disabled type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" value="<?php echo $row['nohp']?>">
                                            <label for="floatingInput"> No HP</label>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-floating">
                                <textarea disabled class="form-control" id="" style="height:100px" name="alamat" ><?php echo $row['alamat']?></textarea>
                                <label for="floatingInput"> Alamat</label>
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
            if(empty($result)){
                echo "Data user tidak ada";
            }else {

            
            ?>
            <div class= "table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Level</th>
                        <th scope="col">No.HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no=1; 
                    foreach ($result as $row) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php 
                                if($row['level'] ==1){
                                    echo "Pemimpin";
                                }elseif($row['level'] ==2){
                                    echo "Admin";
                                }elseif($row['level'] ==3){
                                    echo "Customer";
                                }elseif($row['level'] ==4){
                                    echo "Produksi";
                                }
                                ?>
                        </td>
                        <td><?php echo $row['nohp'] ?></td>
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




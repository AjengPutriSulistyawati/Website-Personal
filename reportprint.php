<?php 
include "proses/connect.php";
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*, nama, SUM(dimensi*harga*jumlah) AS harganya FROM tb_order
LEFT JOIN tb_user ON tb_user.id = tb_order.customer
LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.id_order
LEFT JOIN tb_daftar_produk ON tb_daftar_produk.id = tb_list_order.produk
JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.id_order
GROUP BY id_order ORDER BY waktu_pemesanan ASC");
while ($record = mysqli_fetch_array($query)) {
    $result[] =$record;
}

//$select_kat_produk = mysqli_query($conn, "SELECT id_kat_produk,kategori_produk FROM tb_kategori_produk");
?>
<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Report
        </div>
        <div class="card-body">
        <div class="d-flex">
            <a class="btn btn-primary mb-3" value="Export PDF" onclick="window.open('laporan-cetak.php', '_blank')"><i class="bi bi-printer"></i> Cetak Laporan</a>
        </div>
            <!-- Modal Tambah Order Baru-->
            
            <!-- End Modal Tambah Order Baru-->

            <?php 
            if(empty($result)){
                echo "Data produk tidak ada";
            } else {
            foreach ($result as $row){
            ?>

            <!-- Modal Edit-->
            
            <!-- End Modal Edit-->

             <!-- Modal Delete-->
             
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
                        <th scope="col">Waktu Order</th>
                        <th scope="col">Waktu Bayar</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Total Harga</th>
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
                        <td><?php echo $row['waktu_pemesanan'] ?></td>
                        <td><?php echo $row['waktu_bayar'] ?></td>
                        <td><?php echo $row['pelanggan'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo number_format($row['harganya'], 0, ',','.')  ?></td>
                        <td >
                            <div class="d-flex">
                            <a class="btn btn-info btn-sm me-1" href="./?x=viewitem&order=<?php echo $row['id_order']."&pelanggan=".$row['pelanggan']."&address=".$row['address']."&hp=".$row['hp'] ?>"><i class="bi bi-eye"></i></a>
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
<?php
//SIMPAN DIBARIS PALING BAWAH UNTUK KONVERSI PDF

    $content = ob_get_clean();
    require_once(dirname(__FILE__).'.proses/html2pdf/html2pdf.class.php');
    try
    {
       $html2pdf = new HTML2PDF('P', 'A4', 'en',  array(8, 8, 8, 8));
       $html2pdf->pdf->SetDisplayMode('fullpage');
       $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
       $html2pdf->Output('laporan.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>





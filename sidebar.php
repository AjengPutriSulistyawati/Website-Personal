<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2 ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo ((isset($_GET['x']) && $_GET['x']=='dashboard') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?> " aria-current="page" href="dashboard"><i class="bi bi-house-door"></i> Dashboard</a>
                        </li>
                        <?php if($hasil['level']==2) { ?>
                         <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='produk') ? 'active link-light' : 'link-dark' ; ?>" href="produk"><i class="bi bi-card-checklist"></i> Daftar Produk</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='katproduk') ? 'active link-light' : 'link-dark' ; ?>" href="katproduk"><i class="bi bi-tags"></i></i> Kategori Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-dark' ; ?>" href="user"><i class="bi bi-person-fill"></i> Daftar User</a>
                        </li>
                    <?php } ?>
                    <?php if($hasil['level']==2 ||$hasil['level']==3) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='order') ? 'active link-light' : 'link-dark' ; ?>" href="order"><i class="bi bi-cart4"></i> Order</a>
                        </li>
                    <?php } ?>

                    <?php if($hasil['level']==3 ||$hasil['level']==2) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='orderhistory') ? 'active link-light' : 'link-dark' ; ?>" href="orderhistory"><i class="bi bi-cart4"></i> History Order</a>
                        </li>
                    <?php } ?>

                    <?php if($hasil['level']==4) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='produksi') ? 'active link-light' : 'link-dark' ; ?>" href="produksi"><i class="bi bi-printer"></i> Produksi</a>
                        </li>
                    <?php } ?>
                    <?php if($hasil['level']==1) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='viewuser') ? 'active link-light' : 'link-dark' ; ?>" href="viewuser"><i class="bi bi-person-fill"></i> Daftar User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='viewkatproduk') ? 'active link-light' : 'link-dark' ; ?>" href="viewkatproduk"><i class="bi bi-tags"></i></i> Daftar Kategori Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='vieworder') ? 'active link-light' : 'link-dark' ; ?>" href="vieworder"><i class="bi bi-cart4"></i> Daftar Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='viewproduksi') ? 'active link-light' : 'link-dark' ; ?>" href="viewproduksi"><i class="bi bi-printer"></i> Daftar Produksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-dark' ; ?>" href="report"><i class="bi bi-file-earmark-bar-graph"></i> Report</a>
                        </li>
                    <?php } ?>
                    <?php if($hasil['level']==1 ||$hasil['level']==3) { ?>
                    <li class="nav-item">
                            <a class="nav-link ps-2 <?php echo (isset($_GET['x']) && $_GET['x']=='viewproduk') ? 'active link-light' : 'link-dark' ; ?>" href="viewproduk"><i class="bi bi-tags"></i></i> Daftar Produk</a>
                        </li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
</div> 
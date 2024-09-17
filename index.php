            <?php 
            session_start();
            if (isset($_GET['x']) && $_GET['x']=='dashboard') {
                $page = "dashboard.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x']=='order') {
                if($_SESSION['level_RJ']==2 ||$_SESSION['level_RJ']==3){
                    $page = "order.php";
                    include "main.php";
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x']=='orderhistory') {
                
                    $page ="historyorder.php";
                    include "main.php";
                    
                
            } elseif (isset($_GET['x']) && $_GET['x']=='orderhistorydetail') {

                $page ="orderhistorydetail.php";
                    include "main.php";

            } elseif (isset($_GET['x']) && $_GET['x']=='produksi') {
                if($_SESSION['level_RJ']==4){
                    $page = "produksi.php";
                    include "main.php";
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='user') {
                if($_SESSION['level_RJ']==2){
                    $page = "user.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='report') {
                if($_SESSION['level_RJ']==1){
                    $page = "report.php";
                    include "main.php";
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='produk') {
                if($_SESSION['level_RJ']==2 ||$_SESSION['level_RJ']==4){
                    $page = "produk.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='login') {
                include "login.php";
            }elseif (isset($_GET['x']) && $_GET['x']=='logout') {
                include "proses/proses_logout.php";
                
            }elseif (isset($_GET['x']) && $_GET['x']=='katproduk') {
                if($_SESSION['level_RJ']==2){
                    $page = "katproduk.php";
                    include "main.php";
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='orderitem') {
                $page = "order_item.php";
                include "main.php";
            }elseif (isset($_GET['x']) && $_GET['x']=='viewitem') {
                if($_SESSION['level_RJ']==1){
                    $page = "view_item.php";
                    include "main.php";
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='viewuser') {
                if($_SESSION['level_RJ']==1){
                    $page = "viewuser.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='viewproduksi') {
                if($_SESSION['level_RJ']==1){
                    $page = "viewproduksi.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='vieworder') {
                if($_SESSION['level_RJ']==1){
                    $page = "vieworder.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='viewproduk') {
                if($_SESSION['level_RJ']==1 ||$_SESSION['level_RJ']==3){
                    $page = "viewproduk.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='viewkatproduk') {
                if($_SESSION['level_RJ']==1 ||$_SESSION['level_RJ']==3){
                    $page = "viewkatproduk.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='vieworderitem') {
                if($_SESSION['level_RJ']==1){
                    $page = "vieworderitem.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            }elseif (isset($_GET['x']) && $_GET['x']=='register') {
                if($_SESSION['level_RJ']==1 ||$_SESSION['level_RJ']==2 ||$_SESSION['level_RJ']==3 ||$_SESSION['level_RJ']==4){
                    $page = "register.php";
                    include "main.php"; 
                }else{
                    $page ="dashboard.php";
                    include "main.php";
                }
            } else {
                $page = "dashboard.php";
                include "main.php";
            }  
            ?>

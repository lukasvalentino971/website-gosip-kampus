<?php 
  ob_start();
  session_start();

  include "../config/config.php";

  if(!$_SESSION['user']) {
    header("location: login.php");
  }


  require_once "template/header.php";

?>
<div class="content">
    <div class="container-fluid">

        <?php 

          if(isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
              case 'home':
                include "dashboard/index.php";
                break;

              case 'tampil-beranda':
                include "beranda/data-beranda.php";
                break;

              case 'tambah-beranda':
                include "beranda/tambah-beranda.php";
                break;

              case 'hapus-beranda':
                include "beranda/hapus-beranda.php";
                break;

              case 'edit-beranda':
                include "beranda/edit-beranda.php";
                break;

              case 'tampil-berita':
                include "berita/data-berita.php";
                break;

              case 'tambah-berita':
                include "berita/tambah-berita.php";
                break;

              case 'hapus-berita':
                include "berita/hapus-berita.php";
                break;

              case 'edit-berita':
                include "berita/edit-berita.php";
                break;

              case 'galeri':
                include "galeri/index.php";
                break;

              case 'hapus-galeri':
                include "galeri/hapus-galeri.php";

              case 'user':
                include "akun/index.php";
                break;

              default:
                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
            }
          } else {
            include "dashboard/index.php";
          }

         ?>

    </div>
</div>

</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>

<?php 

  require_once "template/footer.php";

?>
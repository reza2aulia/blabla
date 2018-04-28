<?php
@$modul = $_GET ['member'];
switch ($modul) {
  case 'registrasi':
    $isi = "modul/register.php"; $judul = "Register";
    break;
  case 'publikasi':
  $isi = "modul/publikasi.php"; $judul = "publikasi";
  break;
  default:
    $isi = "index.php"; $judul = "Dashboard";
    break;
}

 ?>



<?php
include_once 'template/header.php';
?>
    <body>
        <!-- Begin page -->
        <div id="wrapper">



<?php  include_once 'template/menu.php';
?>
<?php
include_once 'template/menuatas.php';
?>
<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">
      <?php include $isi; ?>
    </div> <!-- container -->
</div> <!-- content -->

<?php
include_once 'template/footer.php';
 ?>

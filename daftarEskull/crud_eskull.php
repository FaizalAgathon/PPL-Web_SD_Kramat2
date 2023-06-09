<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Eskull</title>
  <link rel="stylesheet" href="../assets/css/bootstrap-5.3.0/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @font-face {
      font-family: 'Poppins';
      src: url(../assets/font/font-poppins/Poppins-Regular.ttf);
    }

    @media (max-width: 425px) {
      .navbar-pertama {
        display: none;
      }
    }

    * {
      font-family: 'Poppins';
    }
  </style>
</head>

<body>

  <?php 
  include "aksi_ekskul.php";

  if(!isset($_SESSION['login'])){
    header("Location: ../login/login.php");
  }

  if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
  }
  else{
    $login = false;
  } 

  ?>

  <?php include "../assets/components/header.php" ?>
  <div class="container-fluid">
    <!-- SECTION BERITA -->
    <div class="mt-2">
      <div class="d-flex mb-2 gap-2 justify-content-end">
        <a href="tambah_eskull.php" class="btn btn-primary">Tambah Eskull</a>
        <a href="../profile/profile.php" class="btn btn-danger">Kembali</a>
      </div>
      <div class="d-flex flex-wrap">

        <?php if (!$daftarEkskul) : ?>
          <div class="text-center">
            <img src="../assets/imgs/illustrasi/logo 3_2.png" width="50%" alt="">
          </div>
        <?php endif ?>

        <?php foreach ($daftarEkskul as $ekskul) : ?>
          <div class="card mb-3 m-auto w-75">
            <div class="row">
              <div class="col-md-3">
                <!-- <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="..."> -->
                <?php if ($ekskul['gambarEkskul'] == '') : ?>
                  <img src="../assets/imgs/ekskul/noImg.png" class="img-fluid" alt="...">
                <?php else : ?>
                  <img src="../assets/imgs/ekskul/<?= $ekskul['gambarEkskul'] ?>" class="img-fluid" alt="...">
                <?php endif ?>
              </div>
              <div class="col-md-9">
                <div class="card-body">
                  <h3 class="card-title"><?= $ekskul['namaEkskul'] ?></h3>
                  <h6>Hari : <?= $ekskul['jadwalHari'] ?></h6>
                  <h6>Pembimbing : <?= $ekskul['nama_guru'] ?></h6>
                </div>
              </div>
              <div class="p-3">
                <a href="edit_eskull.php?idEkskul=<?= $ekskul['idEkskul'] ?>" class="btn btn-warning w-100 mb-2 text-white">edit</a>
                <form action="" method="post">
                  <button type="submit" class="btn btn-secondary w-100 text-white" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                  <input type="hidden" name="delEkskul" value="<?= $ekskul['idEkskul'] ?>">
                </form>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <!-- !SECTION BERITA -->
  </div>
  <?php include "../assets/components/footer.php" ?>
  <script src="../assets/js/bootstrap-5.3.0/bootstrap.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": true,
      "positionClass": "toast-bottom-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>

  <?php if (isset($_SESSION['tDel'])) : ?>
    <script>
      alert("Berhasil menghapus data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['tAdd'])) : ?>
    <script>
      alert("Berhasil menambah data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['fAdd'])) : ?>
    <script>
      alert($_SESSION['fAdd'])
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['tEdit'])) : ?>
    <script>
      alert("Berhasil mengupdate data")
    </script>
  <?php endif ?>
  <?php if (isset($_SESSION['fEdit'])) : ?>
    <script>
      alert($_SESSION['fEdit'])
    </script>
  <?php endif ?>

  <?php unset($_SESSION['tDel'], $_SESSION['tAdd'], $_SESSION['fAdd'], $_SESSION['tEdit'], $_SESSION['fEdit']) ?>

</body>

</html>
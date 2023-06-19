<?php 
if(isset($_GET["ParamAksi"])){
    $aksi=$_GET["ParamAksi"];
    $table=$_GET['ParamTable'];
    $cek=$_GET['ParamCek'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        @media (max-width: 425px) {
            .card{
                margin-left: -1000px;
            }
        }
    </style>
  </head>
  <body>
    
  <?php
    require  "Koneksi.php";
    $idcarousel=$_GET['idCarousel'];
    $sql= "SELECT * FROM carousel WHERE idCarousel like '$idcarousel'";
    $carousel = query($sql);
?>
    <!-- awal navbar pertama -->
        <div class="navbar-pertama">
          <nav class="navbar navbar-expand-sm display1 p-3" data-bs-theme="dark" style="height: 20px; background-color: #00ADEF">
            <div class="container-fluid">
              <span class="navbar-brand ukuran-selamat-datang">Selamat Datang Di Website Kami</span>
              <div class="d-flex me-2">
                <span class="nav-link active me-4 text-light" aria-current="page">Jl. Siliwangi No. 44Kota Cirebon </span>
                <span class="nav-link active text-light" aria-current="page">Telp. (0231) 202998</span>
              </div>
            </div>
          </nav>
        </div>
    <!-- akhir navbar pertama -->
      
      
      <!-- awal navbar kedua -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-kedua" data-bs-theme="dark">
            <div class="container-fluid ">
                <a class="navbar-brand p-0" href="home.html">
                    <img src="../assets/imgs/logo light2.png" alt="Logo" width="230" class="m-0 mb-1 d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>    
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-5 gap-4">
                        <a class="nav-link text-white" aria-current="page" href="../home.php">Home</a>
                        <a class="nav-link text-white" href="../profile/profile.php">Profil</a>
                        <a class="nav-link text-white" href="../daftarBerita/berita.php">Berita</a>
                        <a class="nav-link text-white" href="#">PPDB</a>
                        <a class="nav-link text-white" href="../daftarGaleri/user/galeri.php">Galeri</a>
                        <a class="nav-link text-white" href="../daftarGuru/daftar_guru_user.php">Daftar Guru</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Edit Website
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="modifikasi_carousel.php">Carousel</a></li>
                                <li><a class="dropdown-item" href="../daftarGuru/daftar_guru.php">Guru</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_sejarah.php">Sejarah</a></li>
                                <li><a class="dropdown-item" href="../profile/edit_visi_misi.php">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="../daftarEskull/crud_eskull.php">Ekstrakulikuler</a></li>
                                <li><a class="dropdown-item" href="../daftarGaleri/admin/galeri.php">Galeri</a></li>
                                <li><a class="dropdown-item" href="../daftarBerita/crud_berita.php">Berita</a></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
          </nav>
      <!-- akhir navbar kedua -->
      <div class="container-fluid">
        
      </div>
        <form action="aksiedit.php?ParamAksi=ubah_foto&ParamTable=carousel" method="post" enctype="multipart/form-data">
            <div class="mt-2">
                <div class="card m-auto" style="width: 30rem;">
                    <input type="hidden" name="gambarLama" value="<?= $carousel[0]['gambarCarousel'] ?>">
                    <input type="hidden" name="idCarousel" value="<?= $carousel[0]['idCarousel']?>">
                    <img class="card-img-top" alt="..." src="../assets/imgs/fotocarousel/<?= $carousel[0]['gambarCarousel'] ?>">
                    <div class="card-body">
                        <div class="mb-3">
                            <h5 class="card-title">Edit Gambar Carousel</h5>
                            <small class="card-text" style="color: red;">*Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</small>
                            <input class="form-control mt-4" type="file" name="gambarCarousel" id="foto" required>
                        </div>
                        <div style="padding: 5px;">
                            <button type="submit" class="btn btn-warning text-white">Save</button>
                            <a href="modifikasi_carousel.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                // if ( isset($_POST['hidden']) ){
                    
                //     $rand = rand();
                //     $ekstensi =  array('png','jpg','jpeg','gif');
                //     $filename = $_FILES['foto']['name'];
                //     $ukuran = $_FILES['foto']['size'];
                //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    
                //     if ( ($filename && $ukuran) == NULL ){
                //         echo "
                //         <script>
                //         alert('Data Gagal di Edit');
                //         document.location.href = 'modifikasi_carousel.php';
                //         </script>
                //         ";
                        
                //     } else {
                //         $xx = $rand.'_'.$filename;
                //         $sqlU= "UPDATE carousel
                //         SET
                //             gambarCarousel='$xx'
                //         WHERE idCarousel = '$idcarousel'";
                //         move_uploaded_file($_FILES['foto']['tmp_name'], 'fotocarousel/'.$xx);

                //         mysqli_query($db_link,$sqlU);
                //         echo "
                //         <script>
                //         alert('Data Berhasil di Edit');
                //                 document.location.href = 'modifikasi_carousel.php';
                //         </script>
                //         ";

                //     }
                // }

            ?>
        </form>
    <!-- SECTION FOOTER -->
        <div class="footer mt-2" style="bottom: 0;">
            <div class="text-center bg-dark" style="padding: 5%;">
                <p class="text-white mb-0">
                    Coypright By @SD_Keramat2023
                </p>
            </div>
        </div>
    <!-- !SECTION FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
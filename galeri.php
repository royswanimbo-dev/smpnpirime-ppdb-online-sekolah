<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMP 1 PIRIME/galeri</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Internal CSS -->
  <style>
    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .sosmed {
      text-align: center;
      margin-top: 20px;
    }

    .sosmed a {
      margin: 0 10px;
      font-size: 24px;
      color: rgb(170, 166, 166);
      transition: transform 0.3s ease, color 0.3s ease;
      animation: floating 3s ease-in-out infinite;
    }

    .sosmed a:hover {
      transform: scale(1.2);
      color: #07197e;
    }

    /* Lightbox */
    .lightbox {
      display: none;
      position: fixed;
      z-index: 9999;
      padding: 1rem;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background: rgba(0, 0, 0, 0.8);
    }

    .lightbox img {
      display: block;
      margin: 5% auto;
      max-width: 90%;
      max-height: 80%;
      border-radius: 10px;
      box-shadow: 0 0 30px rgba(255, 255, 255, 0.5);
    }

    .lightbox:after {
      content: "×";
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 40px;
      color: white;
      cursor: pointer;
    }

    <style>

    /* Styling untuk Swiper */
    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      position: relative;
      text-align: center;
      overflow: hidden;
      border-radius: 15px;
    }

    .swiper-slide img,
    .swiper-slide video {
      width: 100%;
      height: auto;
      border-radius: 15px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    /* Efek hover pada gambar/video */
    .swiper-slide:hover img,
    .swiper-slide:hover video {
      transform: scale(1.1);
    }

    /* Overlay saat hover */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      opacity: 0;
      transition: opacity 0.3s;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide:hover .overlay {
      opacity: 1;
    }

    .overlay .text {
      color: white;
      text-align: center;
    }

    .overlay .text h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
    }

    .overlay .text p {
      font-size: 1rem;
    }

    /* Styling pagination dan navigation */
    .swiper-button-next,
    .swiper-button-prev {
      color: #fff;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      padding: 10px;
    }

    .swiper-pagination {
      bottom: 10px;
    }








    body {
      font-family: Arial, sans-serif;
      background-color: #f3f8f6;
      margin: 0;
      padding: 0;
      color: #333;
    }

    h1 {
      text-align: center;
      margin-top: 50px;
      color: #007bff;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));

      gap: 20px;
      padding: 20px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .gallery-item img {
      width: 100%;
      height: auto;
      transition: transform 0.3s ease;
    }

    .gallery-item img:hover {
      transform: scale(1.1);
    }

    .gallery-item .description {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 10px;
      font-size: 16px;
      text-align: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .gallery-item:hover .description {
      opacity: 1;
    }

    /* Styling for the button */
    button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 15px 30px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: transform 0.2s ease-in-out, background-color 0.2s ease-in-out;
    }
  </style>


</head>

<body>

  <!-- Awal navigasi Bar -->
  <nav class="navbar navbar-expand-lg bg-light shadow fixed-top">
    <div class="container">
      <img src="images/logo/logo.jpg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
      <a class="navbar-brand fw-bold fs-4 p-2" href="#">SMP NEGERI 1 PIRIME</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto p-2">
<li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang-kami.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kurikulum</a></li>
          <li class="nav-item"><a class="nav-link active" href="galeri.php">Galeri</a></li>
          <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir navigasi Bar -->
  <section id="menu" class="container pt-5">
    <div class="p-4">
      <h2 class="display-4 text-center mb-0 fw-semibold p-4">Galeri<span class="text-primary"> Sekolah</span></h2>
    </div>
    <h2 class="p-3 fw-semibold">Foto dan Video Kegiatan</h2>
    <hr>

    <!-- Tambahan Paragraf Penjelasan -->
    <div class="p-3">
      <p>
        Galeri ini berisi berbagai dokumentasi kegiatan yang berlangsung di SMP Negeri 1 Pirime, mulai dari aktivitas
        belajar, kegiatan budaya, hingga program-program sekolah. Semua momen ini menjadi bagian penting dalam
        perjalanan pendidikan siswa-siswi kami.
      </p>
      <p>
        Melalui foto dan video yang kami sajikan, Anda dapat melihat bagaimana suasana pembelajaran, fasilitas yang
        tersedia, serta semangat kebersamaan yang kami bangun di lingkungan sekolah. Setiap gambar memiliki cerita
        tersendiri yang menunjukkan komitmen kami dalam membentuk karakter dan prestasi siswa.
      </p>
      <p>
        Kami percaya bahwa dokumentasi ini tidak hanya menjadi kenangan, tetapi juga menjadi sumber motivasi untuk terus
        berkembang. Mari mengenal lebih dekat SMP Negeri 1 Pirime melalui galeri kegiatan kami!
      </p>
    </div>
  </section>


  <section>

    <div class="gallery">
      <div class="gallery-item">
        <img src="images/galeri/1.jpg" alt="Elis Wakerkwa Image 1">
        <div class="description">
          Momen Pada sahat Bari Di lapangan, Degar Pegumuman dari Guru.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/2 (2).jpg" alt="Elis Wakerkwa Image 2">
        <div class="description">
          Poto siswa/i Keadaan Baris di lapanga megadap kedepa degar pegumuman dari guru-guru.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/3.jpg" alt="Elis Wakerkwa Image 3">
        <div class="description">
          Sebuah momen indah berada di alam bebas, siswa medengar pegumuman dari haraan guru-guru.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/4.jpg" alt="Elis Wakerkwa Image 4">
        <div class="description">
          poto siswa/i keadan baris di lapangan ambil gambarnya dari samping kiri.
        </div>
      </div>
    </div>

    <div class="gallery">
      <div class="gallery-item">
        <img src="images/galeri/ruang guru.jpg" alt="Elis Wakerkwa Image 1">
        <div class="description">
          Ruangan guru untuk Merancang atau diskusi Program-Program Sedang berjalan.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/leb1.jpg" alt="Elis Wakerkwa Image 2">
        <div class="description">
          Ruangan LAB kusus Untuk praktek
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/kegiatan sekolah bakar batu - Copy.jpg" alt="Elis Wakerkwa Image 3">
        <div class="description">
          Momen kegiatan sekolah bakar batu selesai degar hasil ujian.
        </div>
      </div>
      <div class="gallery-item">
        <video class="card-img-top" width="300" height="250" controls>
          <source src="images/galeri/sosialisasi guru dgn orang tua  - Copy.mp4" type="video/mp4">
          Browser tidak mendukung video.
        </video>
        Kegiata sosialisasi Guru dengan orang tua wali.
      </div>
    </div>
    </div>

    <div class="gallery">
      <div class="gallery-item">
        <img src="images/galeri/6.jpg" alt="Elis Wakerkwa Image 1">
        <div class="description">
          Poto padasahat siswa/i dalam barisan megadap kedepan medengar haraan dari guru-guru.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/ijil masul2.jpg" alt="Elis Wakerkwa Image 2">
        <div class="description">
          Ibadah injil masuk SDN 1 & SMP NEGERI 1 PIRIME Gabung 5 Feb/2025.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/kegiatang.jpg" alt="Elis Wakerkwa Image 3">
        <div class="description">
          siswa/i dapat suru bawa kayu bua untuk bikin pagar sekolah.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/4pirime.jpg" alt="Elis Wakerkwa Image 4">
        <div class="description">
          siswa/i dapat suru bawa kayu bua untuk bikin pagar sekolah mereka berpakaian kostum biru.
        </div>
      </div>
    </div>

    <div class="gallery">
      <div class="gallery-item">
        <img src="images/galeri/3pirime.jpg" alt=" Elis Wakerkwa Image 1">
        <div class="description">
          Foto didalam ruangan kelas siswa/i sedang meendengar kebsek pegumuman.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/injil masuk.jpg" alt="Elis Wakerkwa Image 2">
        <div class="description">
          Ibadah injil masuk SDN 1 & SMP NEGERI 1 PIRIME Gabung 5 Feb/2025.
        </div>
      </div>
      <div class="gallery-item">
        <img src="images/galeri/lab3 - Copy.jpg" alt="Elis Wakerkwa Image 3">
        <div class="description">
          Ruangan LAB kusus untuk siswa/i praktek .
        </div>
      </div>
      <div class="gallery-item">
        <video class="card-img-top" width="300" height="250" controls>
          <source src="images/galeri/sosialisasi guru dgn orang tua  - Copy.mp4" type="video/mp4">
          Browser tidak mendukung video.
        </video>
        Momen sosialisasi Guru dengan Orang Tua wali.
      </div>
    </div>
    </div>
  </section>




  <!-- Lightbox -->
  <div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <img id="lightbox-img" src="" alt="Lightbox Image">
  </div>


  <!-- Galeri Section -->






  <!-- Footer -->
  <footer class="bg-primary mt-5 py-4">
    <div class="sosmed">
      <a href="https://facebook.com" target="_blank" class="text-light"><i class="fab fa-facebook-f"></i></a>
      <a href="https://instagram.com" target="_blank" class="text-light"><i class="fab fa-instagram"></i></a>
      <a href="https://twitter.com" target="_blank" class="text-light"><i class="fab fa-twitter"></i></a>
      <a href="https://wa.me/6281234567890" target="_blank" class="text-light"><i class="fab fa-whatsapp"></i></a>
    </div>
    <p class="footer text-center text-light mt-3">2025 &copy; All rights reserved. Dikembangkan oleh | Kanius Wanimbo.
    </p>
  </footer>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Inisialisasi Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

  <!-- Internal JS -->
  <script>
    function openLightbox(src) {
      document.getElementById('lightbox-img').src = src;
      document.getElementById('lightbox').style.display = 'block';
    }

    function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
    }
  </script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
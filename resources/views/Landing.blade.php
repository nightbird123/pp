<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pegawai Dinas</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: url('{{ asset('img/yy.jpg') }}') no-repeat center center;
      background-size: cover;
      background-position: top center;
      background-attachment: fixed;
      color: #fff;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1.2rem 5%;
      position: fixed;
      top: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1000;
      transition: background 0.3s ease;
    }

    .navbar .logo {
      font-size: 1.5rem;
      font-weight: 700;
      color: #00aaff;
    }

    .navbar ul {
      list-style: none;
      display: flex;
      gap: 1.8rem;
    }

    .navbar ul li a {
      text-decoration: none;
      font-weight: 600;
      color: #fff;
      transition: 0.3s;
    }

    .navbar ul li a:hover {
      color: #00aaff;
    }

    .btn-nav {
      padding: 8px 18px;
      border: 2px solid #00aaff;
      border-radius: 5px;
      color: #00aaff;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-nav:hover {
      background: #00aaff;
      color: #fff;
    }

    /* Section umum */
    section {
      padding: 100px 10%;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(0, 0, 0, 0.55);
      text-align: left;
      opacity: 0;
      transform: translateY(40px);
      transition: all 0.8s ease-out;
    }

    section.show {
      opacity: 1;
      transform: translateY(0);
    }

    section h2 {
      color: #00aaff;
      font-size: 2.2rem;
      margin-bottom: 20px;
    }

    section p,
    section ul {
      max-width: 750px;
      line-height: 1.7;
      font-size: 1rem;
    }

    section ul {
      margin-top: 15px;
      padding-left: 20px;
    }

    section ul li {
      margin-bottom: 8px;
    }

    /* Hero */
    .hero h2 {
      font-size: 1.5rem;
      font-weight: 400;
      margin-bottom: 10px;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
      color: #00aaff;
      margin-bottom: 15px;
    }

    .hero p {
      max-width: 650px;
      font-size: 1rem;
      line-height: 1.6;
    }

    /* Footer */
    footer {
      background: rgba(0, 0, 0, 0.9);
      color: #ddd;
      text-align: center;
      padding: 25px 10px;
      font-size: 0.9rem;
      border-top: 1px solid #00aaff;
    }

    footer p {
      margin: 5px 0;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">Pegawai Dinas</div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#tentang">Tentang</a></li>
      <li><a href="#fitur">Fitur</a></li>
      <li><a href="#panduan">Panduan</a></li>
      <li><a href="#kontak">Kontak</a></li>
    </ul>
    <a href="{{ route('login') }}" class="btn-nav">Login</a>
  </nav>

  <!-- Home -->
  <section class="hero" id="home">
    <h2>Selamat Datang 👋</h2>
    <h1>Aplikasi Data Pegawai Dinas</h1>
    <p>
      Selamat datang di sistem informasi kepegawaian terpadu. Aplikasi ini hadir untuk membantu
      pengelolaan data pegawai, absensi, dan cuti secara digital sehingga lebih mudah, cepat, dan akurat.
      Dengan tampilan sederhana dan fitur lengkap, semua kebutuhan administrasi pegawai bisa dilakukan
      hanya dalam satu platform.
    </p>
  </section>

  <!-- Tentang -->
  <section id="tentang">
    <h2>Tentang Aplikasi</h2>
    <p>
      Aplikasi Data Pegawai Dinas adalah sistem informasi berbasis web yang dirancang khusus untuk membantu
      instansi pemerintah dalam mengelola data kepegawaian secara lebih modern, cepat, dan aman.
      Dengan aplikasi ini, setiap data pegawai mulai dari biodata, departemen, riwayat jabatan, hingga absensi
      dapat tersimpan secara terpusat dalam satu sistem yang mudah diakses.
    </p>
    <p>
      Tidak hanya itu, aplikasi juga mendukung pengelolaan cuti pegawai dengan mekanisme
      <i>pengajuan dan persetujuan online</i>, sehingga proses administrasi menjadi lebih transparan dan efisien.
      Semua data yang tercatat dapat langsung diolah menjadi laporan yang informatif sehingga
      memudahkan pimpinan dalam mengambil keputusan strategis.
    </p>
    <p>
      Dengan tampilan yang sederhana namun profesional, aplikasi ini diharapkan dapat menjadi solusi
      bagi dinas dalam meningkatkan produktivitas kerja, mempercepat proses administrasi,
      serta menciptakan lingkungan kerja yang lebih tertib dan teratur.
    </p>
  </section>

  <!-- Fitur -->
  <section id="fitur">
    <h2>Fitur Utama</h2>
    <p>Berikut beberapa fitur yang tersedia dalam aplikasi ini:</p>
    <ul>
      <li>📌 Manajemen Data Pegawai</li>
      <li>📌 Absensi Harian</li>
      <li>📌 Pengajuan & Persetujuan Cuti</li>
      <li>📌 Laporan Pegawai</li>
    </ul>
  </section>

  <!-- Panduan -->
  <section id="panduan">
    <h2>Panduan Singkat</h2>
    <p>Ikuti langkah berikut untuk menggunakan aplikasi:</p>
    <ul>
      <li>🔑 Login menggunakan akun yang sudah terdaftar.</li>
      <li>👥 Kelola data pegawai dan departemen melalui menu dashboard.</li>
      <li>🕒 Catat absensi harian dengan mudah.</li>
      <li>📝 Ajukan cuti dan pantau status persetujuan.</li>
      <li>📊 Lihat laporan pegawai untuk analisis data.</li>
    </ul>
  </section>

  <!-- Kontak -->
  <section id="kontak">
    <h2>Kontak</h2>
    <p>Jika ada pertanyaan atau kendala, silakan hubungi:</p>
    <ul>
      <li>📍 Alamat: Jl. Raya Isekai No. 123, Japan</li>
      <li>📧 Email: dinaspegawai@example.com</li>
      <li>📞 Telepon: (+62) 123456</li>
    </ul>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 Aplikasi Data Pegawai Dinas. All rights reserved.</p>
    <p>Jl. Isekai No.123, Kota Ngawi | Telp: (+62) 1234567</p>
  </footer>

  <!-- Script animasi scroll -->
  <script>
    const sections = document.querySelectorAll("section");
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.2 });
    sections.forEach(sec => observer.observe(sec));
  </script>
</body>

</html>

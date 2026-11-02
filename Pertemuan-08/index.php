<?php
// ====== GANTI DATA INI ======
$nim  = "NIM_ANDA";
$nama = "Nama Lengkap Anda";
// ============================
$page = $_GET['page'] ?? 'home';
$allowed = ['home', 'profile', 'registrasi', 'kontak'];
if (!in_array($page, $allowed)) $page = 'home';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kedai Mie Ayam Pak Joyo</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">

  <!-- HEADER -->
  <header>
    <svg class="logo" viewBox="0 0 100 100" width="70" height="70" aria-label="Logo">
      <circle cx="50" cy="50" r="48" fill="#c0392b"/>
      <path d="M18 52h64a32 32 0 0 1-64 0z" fill="#fff8e7"/>
      <path d="M26 50c6-14 14-14 20 0s14 14 20 0 8-8 10-2" stroke="#f1c40f" stroke-width="5" fill="none" stroke-linecap="round"/>
      <rect x="62" y="14" width="4" height="40" rx="2" fill="#6d4c41" transform="rotate(25 64 34)"/>
      <rect x="70" y="14" width="4" height="40" rx="2" fill="#6d4c41" transform="rotate(25 72 34)"/>
    </svg>
    <div>
      <h1>Kedai Mie Ayam Pak Joyo</h1>
      <p>Hangat, gurih, dan bikin nagih sejak 2010</p>
    </div>
  </header>

  <div class="middle">
    <!-- NAVIGASI (tag list) -->
    <nav>
      <ul>
        <li><a href="?page=home" class="<?= $page=='home'?'aktif':'' ?>">🏠 Home</a></li>
        <li><a href="?page=profile" class="<?= $page=='profile'?'aktif':'' ?>">👤 Profile</a></li>
        <li><a href="?page=registrasi" class="<?= $page=='registrasi'?'aktif':'' ?>">📝 Registrasi</a></li>
        <li><a href="?page=kontak" class="<?= $page=='kontak'?'aktif':'' ?>">📍 Kontak</a></li>
      </ul>
    </nav>

    <!-- KONTEN -->
    <main>
<?php if ($page == 'home'): ?>
      <h2>Selamat Datang di Kedai Kami!</h2>
      <div class="hero">
        <div class="bowl">🍜<span class="steam">〰️</span></div>
        <p>
          <b>Kedai Mie Ayam Pak Joyo</b> menyajikan mie ayam dengan mie kenyal buatan sendiri,
          topping ayam kecap berbumbu rempah, sawi hijau segar, dan kuah kaldu ayam yang gurih.
          Cocok disantap kapan saja bersama keluarga dan teman.
        </p>
      </div>

      <h3>Daftar Menu</h3>
      <table>
        <tr><th>No</th><th>Menu</th><th>Keterangan</th><th>Harga</th></tr>
        <tr><td>1</td><td>Mie Ayam Original</td><td>Mie, ayam kecap, sawi</td><td>Rp 15.000</td></tr>
        <tr><td>2</td><td>Mie Ayam Bakso</td><td>Original + 3 bakso sapi</td><td>Rp 20.000</td></tr>
        <tr><td>3</td><td>Mie Ayam Pangsit</td><td>Original + pangsit goreng</td><td>Rp 19.000</td></tr>
        <tr><td>4</td><td>Es Teh Manis</td><td>Segar dan dingin</td><td>Rp 5.000</td></tr>
      </table>

      <h3>Video Profil</h3>
      <video controls width="100%" style="max-width:480px">
        <source src="video.mp4" type="video/mp4">
        Browser Anda tidak mendukung video.
      </video>
      <p><small>*Letakkan file <code>video.mp4</code> di folder yang sama.</small></p>

<?php elseif ($page == 'profile'): ?>
      <h2>Profile</h2>
      <div class="profile">
        <img src="foto.jpg" alt="Foto <?= $nama ?>" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%22160%22 height=%22200%22><rect width=%22160%22 height=%22200%22 fill=%22%23ddd%22/><text x=%2280%22 y=%22105%22 text-anchor=%22middle%22 font-size=%2214%22>Foto Anda</text></svg>'">
        <table>
          <tr><td>Nama</td><td>: <?= $nama ?></td></tr>
          <tr><td>NIM</td><td>: <?= $nim ?></td></tr>
          <tr><td>Kelas</td><td>: SI1A</td></tr>
          <tr><td>Program Studi</td><td>: Sistem Informasi</td></tr>
          <tr><td>Tempat, Tgl Lahir</td><td>: Kota, 01 Januari 2005</td></tr>
          <tr><td>Alamat</td><td>: Jl. Contoh No. 1, Kota</td></tr>
          <tr><td>Email</td><td>: email@contoh.com</td></tr>
          <tr><td>Hobi</td><td>: Memasak &amp; ngoding</td></tr>
        </table>
      </div>

<?php elseif ($page == 'registrasi'): ?>
      <h2>Registrasi Member</h2>
<?php
$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $d = array_map(fn($v) => htmlspecialchars(trim($v)), [
        'nama' => $_POST['nama'] ?? '', 'email' => $_POST['email'] ?? '',
        'hp' => $_POST['hp'] ?? '', 'gender' => $_POST['gender'] ?? '',
        'menu' => $_POST['menu'] ?? '', 'alamat' => $_POST['alamat'] ?? ''
    ]);
    if ($d['nama'] == '') $err[] = "Nama wajib diisi.";
    if (!filter_var($d['email'], FILTER_VALIDATE_EMAIL)) $err[] = "Email tidak valid.";
    if (!preg_match('/^[0-9]{10,13}$/', $d['hp'])) $err[] = "No. HP harus 10-13 digit angka.";
    if (!$err) {
        echo "<div class='ok'><b>Registrasi berhasil!</b><br>
              Terima kasih, {$d['nama']}. Data Anda:<ul>
              <li>Email: {$d['email']}</li><li>No. HP: {$d['hp']}</li>
              <li>Gender: {$d['gender']}</li><li>Menu favorit: {$d['menu']}</li>
              <li>Alamat: {$d['alamat']}</li></ul></div>";
    } else {
        echo "<div class='error'>" . implode("<br>", $err) . "</div>";
    }
}
?>
      <form method="post" action="?page=registrasi" onsubmit="return validasi()">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" id="nama">
        <label>Email</label>
        <input type="email" name="email" id="email">
        <label>No. HP</label>
        <input type="text" name="hp" id="hp">
        <label>Jenis Kelamin</label>
        <div><input type="radio" name="gender" value="Laki-laki" checked> Laki-laki
             <input type="radio" name="gender" value="Perempuan"> Perempuan</div>
        <label>Menu Favorit</label>
        <select name="menu">
          <option>Mie Ayam Original</option><option>Mie Ayam Bakso</option><option>Mie Ayam Pangsit</option>
        </select>
        <label>Alamat</label>
        <textarea name="alamat" rows="3"></textarea>
        <button type="submit">Daftar</button>
        <button type="reset" class="alt">Reset</button>
      </form>

<?php elseif ($page == 'kontak'): ?>
      <h2>Kontak &amp; Jam Buka</h2>
      <table>
        <tr><td>Alamat</td><td>Jl. Merdeka No. 10, Kota Anda</td></tr>
        <tr><td>Jam Buka</td><td>Setiap hari, 09.00 - 21.00</td></tr>
        <tr><td>WhatsApp</td><td>0812-3456-7890</td></tr>
      </table>
<?php endif; ?>
    </main>
  </div>

  <!-- FOOTER -->
  <footer>&copy;<?= $nim ?>_<?= $nama ?>_SI1A_ UTS Pemrograman Web Dasar</footer>
</div>
<script src="script.js"></script>
</body>
</html>
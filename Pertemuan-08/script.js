function validasi() {
  const nama = document.getElementById('nama').value.trim();
  const email = document.getElementById('email').value.trim();
  const hp = document.getElementById('hp').value.trim();
  if (nama === '') { alert('Nama wajib diisi!'); return false; }
  if (!/^\S+@\S+\.\S+$/.test(email)) { alert('Format email tidak valid!'); return false; }
  if (!/^[0-9]{10,13}$/.test(hp)) { alert('No. HP harus 10-13 digit angka!'); return false; }
  return true;
}
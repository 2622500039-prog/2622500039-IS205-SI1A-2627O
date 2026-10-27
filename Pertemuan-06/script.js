const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

navToggle.addEventListener("click", () => {
    const isOpen = navMenu.classList.toggle("nav-open");
navToggle.setAttribute("aria-expanded", isOpen);
if (isOpen) {
    navToggle.setAttribute("aria-label", "tutup navigasi");
 } else {
    navToggle.setAttribute("aria-label", "buka navigasi");
 }
});
const contractform = document .getElementById("contractform");
const formfeedback = document.getElementById("formfeedback");

const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesaninput = document.getElementById("pesan");

contractform.addEventListener("submit", (event) => {
    event.preventDefault();
    formFeedback.className = "form-feedback-error";

    const nama = namaInput.value.trim();
    if (nama.length < 3 || nama.length > 50) {
        formFeedback.textContent = "Nama harus antara 3 hingga 50 karakter.";
        return;
    }

    const email = emailInput.value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        formFeedback.textContent = "masukan alamat Email tidak valid.";
        return;
    }
    const semester = Number(semesterinput.value);
    if (semesterinput.value=== ""|| semester < 1 || semester > 14) {
        formFeedback.textContent = "Semester harus merupakan angka antara 1 hingga 14.";
        return;
    }
    const tanggal = tanggalInput.value;
    if (tanggal === "") {
        formFeedback.textContent = "Tanggal kunjungan harus diisi.";
        return;
    }
    const jenispesan = document.querySelector(
'input[name="jenispesan"]:checked'
    );
if (!jenispesan) {
    formFeedback.textContent = "pesan harus dipilih.";
    return;
}

const topikdipilih = document.querySelectorAll( 'input[name="minat"]:checked');
if (topikdipilih.length === 0) {
    formFeedback.textContent = "Pilih minimal satu topik yang diminat.";
    return;
}

const prodi = prodiinput.value;
if (prodi === "") {
    formFeedback.textContent = "Program studi harus dipilih.";
    return;
}

const pesan = pesaninput.value.trim();
if (pesan.length === 0) {
    formFeedback.textContent = "Pesan harus diisi.";
    return;
}
if (pesan.length > 300) {
    formFeedback.textContent = "Pesan maksimal 300 karakter.";
    return;
}
formfeedback.textContent = "Formulir berhasil divalidasi.";
formfeedback.className = "form-feedback-success";
});
contactForm.addEventListener("reset", () => {
    formFeedback.textContent = "";
});
contactForm.addEventListener("input", () => {
    formFeedback.textContent = "";
});

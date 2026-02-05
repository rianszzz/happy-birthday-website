let userName = "";

function lanjutKeKue() {
  const input = document.getElementById('input-nama');
  if (input.value.trim() === "") {
    alert("Silakan masukkan nama Anda.");
    return;
  }
  userName = input.value;
  document.getElementById('step-nama').style.display = 'none';
  document.getElementById('step-kue').style.display = 'block';
  document.getElementById('sapaan').innerText = "Selamat Ulang Tahun, " + userName + "!";
}

function tiupLilin() {
  document.getElementById('api').classList.add('hidden');
  setTimeout(() => {
    document.getElementById('step-kue').style.display = 'none';
    document.getElementById('step-harapan').style.display = 'block';
  }, 800);
}

function kirimData() {
  const harapan = document.getElementById('input-harapan').value;
  if (harapan.trim() === "") {
    alert("Tuliskan harapan Anda.");
    return;
  }

  const formData = new FormData();
  formData.append('nama', userName);
  formData.append('harapan', harapan);

  fetch('simpan.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text()) // Ambil respon teks dari PHP
  .then(data => {
    console.log("Respon Server:", data); // Lihat ini di F12 Console
    if (data.includes("Berhasil")) {
      document.getElementById('step-harapan').style.display = 'none';
      document.getElementById('step-akhir').style.display = 'block';
    } else {
      alert("Gagal menyimpan: " + data);
    }
  })
  .catch(error => {
    console.error("Error Fetch:", error);
    alert("Terjadi kesalahan koneksi ke server.");
  });
}
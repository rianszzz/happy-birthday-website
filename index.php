<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magical Birthday Cake</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <canvas id="sparkles"></canvas>

  <div class="container">
    <div id="step-nama" class="card">
      <h2>Halo! Siapa namamu?</h2>
      <input type="text" id="input-nama" placeholder="Ketik namamu di sini..." maxlength="30">
      <button onclick="lanjutKeKue()">Masuk</button>
    </div>

    <div id="step-kue" class="cake-section" style="display: none;">
      <h2 id="sapaan"></h2>
      <p>Ketuk lilin untuk meniup!</p>
      <div class="cake" onclick="tiupLilin()">
        <div class="layer layer-bottom"></div>
        <div class="layer layer-middle"></div>
        <div class="layer layer-top"></div>
        <div class="icing"></div>
        <div class="candle">
          <div id="api" class="flame"></div>
        </div>
      </div>
    </div>

    <div id="step-harapan" class="card" style="display: none;">
      <h2>Apa harapanmu?</h2>
      <textarea id="input-harapan" rows="4" placeholder="Tulis harapanmu di umur ini..." maxlength="255"></textarea>
      <button onclick="kirimData()">Simpan Harapan</button>
    </div>

    <div id="step-akhir" class="card" style="display: none;">
      <h2>Terima Kasih!</h2>
      <p>Semoga semua harapanmu terkabul.</p>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
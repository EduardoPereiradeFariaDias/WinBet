<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=acesso");
    exit;
}
$nome = htmlspecialchars($_SESSION['usuario_nome']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Apostar - WinBet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-dark bg-black border-bottom border-success">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand text-success" href="index.php">WinBet 💰</a>
    <div class="d-flex gap-2 align-items-center">
      <span class="text-light">Olá, <strong><?= $nome ?></strong>!</span>
      <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="card bg-secondary p-4 shadow-lg">
    <h2>Fazer Aposta 💰</h2>

    <form action="salvar.php" method="POST">

      <div class="mb-3">
        <label for="jogo">Jogo</label>
        <select id="jogo" name="jogo" class="form-select">
          <option value="Brasil x Argentina">Brasil x Argentina</option>
          <option value="Barcelona x Real Madrid">Barcelona x Real Madrid</option>
          <option value="Corinthians x Palmeiras">Corinthians x Palmeiras</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="valor">Valor (R$)</label>
        <input type="number" id="valor" name="valor" class="form-control" min="1" required>
      </div>

      <div class="mb-3">
        <label for="palpite">Palpite</label>
        <select id="palpite" name="palpite" class="form-select">
          <option value="Time 1">Time 1</option>
          <option value="Empate">Empate</option>
          <option value="Time 2">Time 2</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success w-100">Apostar</button>

    </form>
  </div>
</div>

<script>
  const params  = new URLSearchParams(window.location.search);
  const jogo    = params.get('jogo');
  const palpite = params.get('palpite');
  if (jogo) {
    for (let opt of document.getElementById('jogo').options) {
      if (opt.value === jogo) { opt.selected = true; break; }
    }
  }
  if (palpite) {
    for (let opt of document.getElementById('palpite').options) {
      if (opt.value === palpite) { opt.selected = true; break; }
    }
  }
</script>

</body>
</html>

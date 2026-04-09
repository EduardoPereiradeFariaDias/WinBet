<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/db.php';

$id = (int) $_SESSION['usuario'];

$res = $conn->query("SELECT saldo FROM usuarios WHERE id = $id");
$user = $res->fetch_assoc();
?>

<nav class="navbar navbar-dark bg-black border-bottom border-success">
  <div class="container">

    <span class="navbar-brand text-success">WinBet 💰</span>

    <div>
      <span style="margin-right: 15px;">
        Saldo:
        <span style="color: gold; font-weight: bold;">
          R$ <?= number_format($user['saldo'],2,',','.') ?>
        </span>
      </span>

      <a href="apostas.php" class="btn btn-outline-light me-2">Jogos</a>
      <a href="apostar.php" class="btn btn-success me-2">Apostar</a>
      
    </div>

  </div>
</nav>


<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php?erro=acesso");
    exit;
}

$conn = new mysqli("localhost", "root", "", "winbet");
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$usuario_id = $_SESSION['usuario_id'];
$nome       = htmlspecialchars($_SESSION['usuario_nome']);

// Busca só as apostas do usuário logado
$stmt = $conn->prepare("SELECT * FROM apostas WHERE usuario_id = ? ORDER BY criado_em DESC");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Minhas Apostas - WinBet</title>
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
  <h2 class="mb-4">Minhas Apostas 📋</h2>

  <?php if ($result->num_rows === 0): ?>
    <div class="alert alert-warning">Você ainda não fez nenhuma aposta. <a href="apostas.php" class="alert-link">Ver jogos</a></div>
  <?php else: ?>
  <table class="table table-dark table-striped table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Jogo</th>
        <th>Palpite</th>
        <th>Valor</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['jogo'])    ?></td>
        <td><?= htmlspecialchars($row['palpite']) ?></td>
        <td>R$ <?= number_format((float)$row['valor'], 2, ',', '.') ?></td>
        <td><?= date('d/m/Y H:i', strtotime($row['criado_em'])) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <?php endif; ?>

  <a href="index.php" class="btn btn-success">Voltar</a>
</div>

</body>
</html>
<?php $conn->close(); ?>

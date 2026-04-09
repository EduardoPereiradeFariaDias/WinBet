<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - WinBet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<nav class="navbar navbar-dark bg-black border-bottom border-success">
  <div class="container">
    <a class="navbar-brand text-success" href="index.html">WinBet 💰</a>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card bg-secondary p-4 shadow-lg">
        <h2 class="mb-4 text-center">Entrar 🔐</h2>

        <?php
        if (isset($_GET['cadastro']) && $_GET['cadastro'] === 'ok') {
          echo '<div class="alert alert-success">Cadastro realizado! Faça login.</div>';
        }
        if (isset($_GET['erro']) && $_GET['erro'] === 'invalido') {
          echo '<div class="alert alert-danger">Email ou senha incorretos.</div>';
        }
        if (isset($_GET['erro']) && $_GET['erro'] === 'acesso') {
          echo '<div class="alert alert-warning">Faça login para continuar.</div>';
        }
        ?>

        <form action="logar.php" method="POST">

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-success w-100">Entrar</button>

        </form>

        <hr class="border-light mt-4">
        <p class="text-center mb-0">Não tem conta? <a href="cadastro.php" class="text-success">Cadastrar</a></p>

      </div>
    </div>
  </div>
</div>

</body>
</html>

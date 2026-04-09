<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - WinBet</title>
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
        <h2 class="mb-4 text-center">Criar Conta 🎯</h2>

        <?php
        // Mostra erro se vier da tentativa de cadastro
        if (isset($_GET['erro'])) {
          if ($_GET['erro'] === 'email') {
            echo '<div class="alert alert-danger">Este email já está cadastrado.</div>';
          } else {
            echo '<div class="alert alert-danger">Erro ao cadastrar. Tente novamente.</div>';
          }
        }
        ?>

        <form action="cadastrar.php" method="POST">

          <div class="mb-3">
            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" minlength="6" required>
            <small class="text-muted">Mínimo 6 caracteres</small>
          </div>

          <div class="mb-3">
            <label for="confirmar">Confirmar senha</label>
            <input type="password" id="confirmar" name="confirmar" class="form-control" minlength="6" required>
          </div>

          <button type="submit" class="btn btn-success w-100">Cadastrar</button>

        </form>

        <hr class="border-light mt-4">
        <p class="text-center mb-0">Já tem conta? <a href="login.php" class="text-success">Entrar</a></p>

      </div>
    </div>
  </div>
</div>

</body>
</html>

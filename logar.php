<?php
session_start();

$conn = new mysqli("localhost", "root", "", "winbet");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha']      ?? '';

if (empty($email) || empty($senha)) {
    header("Location: login.php?erro=invalido");
    exit;
}

// Busca o usuário pelo email
$stmt = $conn->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id, $nome, $senhaBanco);
$stmt->fetch();
$stmt->close();

// Verifica se o usuário existe e se a senha está correta
if ($id && password_verify($senha, $senhaBanco)) {
    // Salva os dados na sessão
    $_SESSION['usuario_id']   = $id;
    $_SESSION['usuario_nome'] = $nome;
    $_SESSION['usuario_email']= $email;

    header("Location: index.php");
    exit;
} else {
    header("Location: login.php?erro=invalido");
    exit;
}

$conn->close();
?>

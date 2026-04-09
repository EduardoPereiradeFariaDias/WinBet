<?php
$conn = new mysqli("localhost", "root", "", "winbet");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$nome      = trim($_POST['nome']      ?? '');
$email     = trim($_POST['email']     ?? '');
$senha     = $_POST['senha']          ?? '';
$confirmar = $_POST['confirmar']      ?? '';

// Validações
if (empty($nome) || empty($email) || empty($senha)) {
    header("Location: cadastro.php?erro=campos");
    exit;
}

if ($senha !== $confirmar) {
    header("Location: cadastro.php?erro=senha");
    exit;
}

// Verifica se email já existe
$check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    header("Location: cadastro.php?erro=email");
    exit;
}
$check->close();

// Criptografa a senha com password_hash (seguro)
$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

// Insere o usuário
$stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senhaCriptografada);

if ($stmt->execute()) {
    header("Location: login.php?cadastro=ok");
    exit;
} else {
    header("Location: cadastro.php?erro=geral");
    exit;
}

$stmt->close();
$conn->close();
?>

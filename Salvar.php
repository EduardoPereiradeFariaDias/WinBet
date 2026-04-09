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
$nome       = $_SESSION['usuario_nome'];
$email      = $_SESSION['usuario_email'];
$jogo       = $_POST['jogo']    ?? '';
$valor      = $_POST['valor']   ?? 0;
$palpite    = $_POST['palpite'] ?? '';

if (empty($jogo) || empty($valor) || empty($palpite)) {
    die("Preencha todos os campos.");
}

$stmt = $conn->prepare("INSERT INTO apostas (usuario_id, nome, email, jogo, valor, palpite) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssds", $usuario_id, $nome, $email, $jogo, $valor, $palpite);

if ($stmt->execute()) {
    $params = http_build_query([
        'nome'    => $nome,
        'valor'   => $valor,
        'palpite' => $palpite,
        'jogo'    => $jogo,
    ]);
    header("Location: resultado.php?" . $params);
    exit;
} else {
    echo "Erro ao salvar aposta: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

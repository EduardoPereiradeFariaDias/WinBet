function salvarAposta(event) {
  event.preventDefault();

  let nome = document.getElementById("nome").value;
  let valor = document.getElementById("valor").value;

  let ganhou = Math.random() > 0.5;

  localStorage.setItem("resultado", JSON.stringify({
    nome,
    valor,
    ganhou
  }));

  window.location.href = "resultado.php";
}

function mostrarResultado() {
  let dados = JSON.parse(localStorage.getItem("resultado"));
  if (!dados) return;

  let div = document.getElementById("resultado");

  if (dados.ganhou) {
    div.innerHTML = `
      <div class="alert alert-success">
        <h3>🔥 VOCÊ GANHOU 🔥</h3>
        <p>${dados.nome}, você ganhou R$ ${dados.valor}</p>
      </div>
    `;
  } else {
    div.innerHTML = `
      <div class="alert alert-danger">
        <h3>❌ VOCÊ PERDEU</h3>
        <p>${dados.nome}, tente novamente</p>
      </div>
    `;
  }
}

mostrarResultado();
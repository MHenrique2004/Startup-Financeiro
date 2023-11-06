function adicionarCampo(id) {

  const linha = document.createElement("div");
  linha.classList.add("input-box");

  const nomeP = document.createElement("span");
  nomeP.textContent = "Outro:";
  nomeP.classList.add("details")
  linha.appendChild(nomeP);

  const nomeInput = document.createElement("input");
  nomeInput.type = "text";
  nomeInput.name = `outro${id}`;
  nomeInput.placeholder = "R$000,00"
  linha.appendChild(nomeInput);

  const elemento = document.querySelector(".inputs");
  elemento.appendChild(linha)
}

function removerCampos(nomeDoCampo) {
  const listaDeLinhas = Array.from(document.querySelectorAll(nomeDoCampo));
  if (listaDeLinhas.length > 0) {
      const campo = listaDeLinhas.pop();
      campo.remove();
  }
}

//Adicionar campos em profissionais
const botaoAdicionarCampo = document.querySelector("#adicionar-campos-itens");
botaoAdicionarCampo.addEventListener("click", () => {
    adicionarCampo(document.querySelectorAll(".input-box").length + 1);
});

// Remover Campos em profissionais
document.querySelector("#remover-campos-itens").addEventListener("click", () => {
    removerCampos(".input-box");
});


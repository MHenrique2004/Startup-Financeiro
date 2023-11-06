document.querySelector('.box').addEventListener("mouseover", () => {
    const caixa = document.querySelector(".caixa");
    caixa.style.display = "flex";
  });

document.querySelector(".butao").addEventListener("click", () => {
const caixa = document.querySelector(".caixa");
caixa.style.display = "none";
});
//mouseleave se quiser apenas passar o mouse
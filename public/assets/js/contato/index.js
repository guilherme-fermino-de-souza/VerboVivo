function abrirModal(btn) {
    document.getElementById("modal-assunto").textContent = btn.dataset.assunto;
    document.getElementById("modal-nome").textContent = btn.dataset.nome;
    document.getElementById("modal-email").textContent = btn.dataset.email;
    document.getElementById("modal-texto").textContent = btn.dataset.texto;
    document.getElementById("resposta-email").value = btn.dataset.email;
    document.getElementById("modal-contato").classList.remove("hidden");
}

function fecharModal() {
    document.getElementById("modal-contato").classList.add("hidden");
}

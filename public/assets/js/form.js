contadorTelefone = 1;

function adicionarTelefone() {
    if (contadorTelefone >= 5) return;

    contadorTelefone++;
    const container = document.getElementById('telefones');

    const novoCampo = document.createElement('div');
    novoCampo.classList.add('textfield');
    novoCampo.innerHTML = `
        <input type="tel" name="numero_telefone[]" required placeholder="Tel ${contadorTelefone}">
    `;

    container.appendChild(novoCampo);
}
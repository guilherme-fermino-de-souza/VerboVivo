document.addEventListener("DOMContentLoaded", () => {
    const dataElement = document.getElementById("dashboard-data");
    if (!dataElement) return;

    const data = JSON.parse(dataElement.textContent);

    // Gráfico de linha
    new Chart(document.getElementById("usuariosChart"), {
        type: "line",
        data: {
            labels: data.labels,
            datasets: [{
                label: "Usuários",
                data: data.usuariosPorDia,
                borderColor: "#3B3F8C",
                backgroundColor: "#D0D6D9",
                fill: true,
                tension: 0.3
            }]
        }
    });

    // Gráfico de pizza
    new Chart(document.getElementById("usuariosTipoChart"), {
        type: "pie",
        data: {
            labels: data.usuariosPorTipoKeys,
            datasets: [{
                data: data.usuariosPorTipoVals,
                backgroundColor: ["#3B3F8C", "#F2B705", "#4B1C8C", "#F2B705", "#F22222"]
            }]
        }
    });

    console.log("📊 Dados carregados:", data);
});

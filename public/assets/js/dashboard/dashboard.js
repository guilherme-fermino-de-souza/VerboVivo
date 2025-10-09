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
                borderColor: "#4e73df",
                backgroundColor: "rgba(78, 115, 223, 0.1)",
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
                backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc", "#f6c23e", "#e74a3b"]
            }]
        }
    });
});

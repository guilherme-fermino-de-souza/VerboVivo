function abrirModal() {
    document.getElementById("modal-categoria").classList.remove("hidden");
}
function fecharModal() {
    document.getElementById("modal-categoria").classList.add("hidden");
}

document.addEventListener("DOMContentLoaded", () => {
    if (!chartData || !chartData.labels.length) return;

    const ctx = document.getElementById("graficoCategorias");
    new Chart(ctx, {
        type: "pie",
        data: {
            labels: chartData.labels,
            datasets: [{
                data: chartData.values,
                backgroundColor: [
                    "#3B3F8C",
                    "#03A64A",
                    "#4B1C8C",
                    "#D92B04",
                    "#F2B705"
                ],
                borderColor: "#262626",
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: "#F2F2F2",
                        font: { size: 13 }
                    }
                }
            }
        }
    });
});

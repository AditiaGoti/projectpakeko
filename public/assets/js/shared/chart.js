var chartData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            type: "line",
            label: "Revenue",
            data: ["23", "33", "32", "65", "21", "45", "35"],
            backgroundColor: (0, 0, 0, 0.1),
            borderColor: (0, 0, 0, 0.1),
            borderWidth: 3,
            fill: false,
        },
    ],
};

// ------ Member Charts ------
var MembersChartCanvas = document
    .getElementById("members-chart")
    .getContext("2d");
lineChart = new Chart(MembersChartCanvas, {
    type: "line",
    data: chartData,
    options: {
        responsive: true,
        title: {
            display: true,
            text: "Statistik Member Baru",
        },
        scales: {
            xAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        stepSize: 50,
                        min: 0,
                        max: 150,
                        autoSkip: true,
                        autoSkipPadding: 15,
                        maxRotation: 0,
                        maxTicksLimit: 10,
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: "transparent",
                        zeroLineColor: "#eeeeee",
                    },
                },
            ],
            yAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        display: true,
                        autoSkip: false,
                        maxRotation: 0,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                    },
                    gridLines: {
                        drawBorder: false,
                    },
                },
            ],
        },
        legend: {
            display: false,
        },
        legendCallback: function (chart) {
            var text = [];
            text.push(
                '<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>'
            );
            for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push("<li>");
                text.push(
                    '<span style="background-color:' +
                        chart.data.datasets[i].borderColor +
                        '">' +
                        "</span>"
                );
                text.push(chart.data.datasets[i].label);
                text.push("</li>");
            }
            text.push("</ul></div>");
            return text.join("");
        },
    },
});

// ------ Visitors Charts ------
var VisitorsChartCanvas = document
    .getElementById("visitors-chart")
    .getContext("2d");
lineChart = new Chart(VisitorsChartCanvas, {
    type: "line",
    data: chartData,
    options: {
        responsive: true,
        title: {
            display: true,
            text: "Statistik Kehadiran Pengunjung",
        },
        scales: {
            xAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        stepSize: 50,
                        min: 0,
                        max: 150,
                        autoSkip: true,
                        autoSkipPadding: 15,
                        maxRotation: 0,
                        maxTicksLimit: 10,
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: "transparent",
                        zeroLineColor: "#eeeeee",
                    },
                },
            ],
            yAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        display: true,
                        autoSkip: false,
                        maxRotation: 0,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                    },
                    gridLines: {
                        drawBorder: false,
                    },
                },
            ],
        },
        legend: {
            display: false,
        },
        legendCallback: function (chart) {
            var text = [];
            text.push(
                '<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>'
            );
            for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push("<li>");
                text.push(
                    '<span style="background-color:' +
                        chart.data.datasets[i].borderColor +
                        '">' +
                        "</span>"
                );
                text.push(chart.data.datasets[i].label);
                text.push("</li>");
            }
            text.push("</ul></div>");
            return text.join("");
        },
    },
});

// ------ Transactions Charts ------
var TransactionsChartCanvas = document
    .getElementById("transactions-chart")
    .getContext("2d");
lineChart = new Chart(TransactionsChartCanvas, {
    type: "line",
    data: chartData,
    options: {
        responsive: true,
        title: {
            display: true,
            text: "Statistik Nominal Transaksi",
        },
        scales: {
            xAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        stepSize: 50,
                        min: 0,
                        max: 150,
                        autoSkip: true,
                        autoSkipPadding: 15,
                        maxRotation: 0,
                        maxTicksLimit: 10,
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false,
                        color: "transparent",
                        zeroLineColor: "#eeeeee",
                    },
                },
            ],
            yAxes: [
                {
                    display: true,
                    ticks: {
                        fontColor: "#212229",
                        display: true,
                        autoSkip: false,
                        maxRotation: 0,
                        stepSize: 20,
                        min: 0,
                        max: 100,
                    },
                    gridLines: {
                        drawBorder: false,
                    },
                },
            ],
        },
        legend: {
            display: false,
        },
        legendCallback: function (chart) {
            var text = [];
            text.push(
                '<div class="chartjs-legend d-flex justify-content-center mt-4"><ul>'
            );
            for (var i = 0; i < chart.data.datasets.length; i++) {
                console.log(chart.data.datasets[i]); // see what's inside the obj.
                text.push("<li>");
                text.push(
                    '<span style="background-color:' +
                        chart.data.datasets[i].borderColor +
                        '">' +
                        "</span>"
                );
                text.push(chart.data.datasets[i].label);
                text.push("</li>");
            }
            text.push("</ul></div>");
            return text.join("");
        },
    },
});

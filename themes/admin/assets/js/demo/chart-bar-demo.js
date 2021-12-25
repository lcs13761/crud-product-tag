// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var label = {};
var dataChart;
var GetChartData = function () {
    $.ajax({
        url: document.getElementById('ajaxChart').getAttribute('data-ajax') + "?type=bar",
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            label = data.key;
            dataChart = data.value;
            change();
        }
    });

}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");

function change() {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: "",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: dataChart,
                maxBarThickness: 25,
            }],
        },
        options: {
            maintainAspectRatio: false,
            plugin: {
                title: {
                    display: true,
                    text: "Tags por Produtos"

                }
            },
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 10
                    },
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        maxTicksLimit: 3,
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            title: {
              display: true,
              text: 'Tags Utilizadas'
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        let productName =  chart.datasets[0].data[tooltipItem.index] > 1 ? ' produtos' : ' produto'
                        let dataValue = chart.datasets[0].data[tooltipItem.index] + productName || '';
                        return datasetLabel + dataValue;
                    }
                }
            },
        }
    });
}


$(document).ready(function () {
    $(window).resize(change);
    GetChartData();
});

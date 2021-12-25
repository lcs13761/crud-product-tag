// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';


let labelPie = {};
let dataChartPie;
let GetChartPieData = function () {
    $.ajax({
        url: document.getElementById('ajaxChart').getAttribute('data-ajax') + "?type=pie",
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            labelPie = data.label;
            dataChartPie = data.value;
            changePie();
        }
    });

}

// Pie Chart Example
var pie = document.getElementById("myPieChart");
function changePie() {
    new Chart(pie, {
        type: 'pie',
        data: {
            labels: labelPie,
            datasets: [{
                data: dataChartPie,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
            hoverOffset: 4
        },
        options: {
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    bottom: 10
                }
            },
            maintainAspectRatio: false,
            tooltips: {
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
                        var datasetLabelPie = chart.labels[tooltipItem.index] || '';
                        let datasetValuePie = chart.datasets[0].data[tooltipItem.index] + "%" || "";
                        return datasetLabelPie + " " + datasetValuePie;
                    }
                }
            },
            legend: {
                display: true,
                position: 'bottom',
            },
            title: {
                display:true,
                text: 'Porcentagem de Tags utilizadasss'
            },

        },
    });
}

$(document).ready(function () {
    $(window).resize(changePie);
    GetChartPieData();
});


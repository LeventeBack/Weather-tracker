require('./bootstrap');



$(document).ready(function () {

    let tempChart, humidChart, pressChart;
    const chartPathtext = '.checkbox-list .checkbox-list-item input';

    const time = [];
    for (let i = 0; i < 24; i++) {
        for (let j = 0; j < 60; j++) {
            time.push((i < 10 ? "0" + i : i) + ":" + (j < 10 ? "0" + j : j));
        }
    }

    function chartLoader() {
        let today = new Date().toISOString().substr(0, 10);
        document.querySelector("#chart_date").value = today;
        //checkCheckboxes()
        $.ajax({
            url: "/charts/data",
            method: "GET",
            data: {
                date: today,
                sensorIds: [1, 2, 3]
            },
            dataType: 'json',
            success: function (data) {
                data = data.data
                chartItTemp(data[0]);
                chartItHumid(data[1]);
                chartItPress(data[2]);
            },
            error: function (err) {
                console.log(err.responseText);
            }
        });
    }
    chartLoader();

    $('#chart-form').on('submit', (event) => {
        event.preventDefault();
        //$('#chart-error-message').text('')
        const date = $('#chart_date').val();
        let checkElements = document.querySelectorAll(chartPathtext)
        let sensorIds = [];
        for (let i = 0; i < checkElements.length; i++) {
            if (checkElements[i].checked) {
                sensorIds.push(parseInt(checkElements[i].value))
            }
        }
        if (sensorIds.length === 0) {
            $('#chart-error-message').text('You must select at least one sensor!')
        } else {
            if (tempChart != undefined) {
                tempChart.destroy();
                humidChart.destroy();
                pressChart.destroy();
            }
            $.ajax({
                url: "/charts/data",
                method: "GET",
                data: {
                    date: date,
                    sensorIds: sensorIds
                },
                dataType: "json",
                success: function (data) {
                    data = data.data
                    chartItTemp(data[0]);
                    chartItHumid(data[1]);
                    chartItPress(data[2]);
                },
                error: function (err) {
                    console.log(err.responseText);
                }
            });
        }
    })
    $('#select-all').on('change', function () {
        let checkElements = document.querySelectorAll(chartPathtext)
        if ($(this).is(":checked")) {
            checkElements.forEach(checkbox => {
                checkbox.checked = true
            })
        } else {
            checkElements.forEach(checkbox => {
                checkbox.checked = false
            })
        }
    })

    function chartItTemp(data) {
        const ctx = document.getElementById('tempChart').getContext('2d');
        tempChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                            callback: function (value) {
                                return value + '°C';
                            }
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Temperatura ambiantă',
                    fontSize: 30
                },
                tooltips: {
                    backgroundColor: 'rgba(0,0,0,0.6)',
                    titleFontColor: 'rgba(0, 0, 0, 0)',
                    titleFontSize: 0,
                    titleMarginBottom: 3,
                    bodyFontSize: 15,
                    callbacks: {
                        label: function (tooltipItems, data) {
                            return '  ' + data.datasets[tooltipItems.datasetIndex].label + '  h: ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index].x + '  ' + tooltipItems.yLabel + '°C';
                        }
                    }
                }
            }
        });
    }

    function chartItHumid(data) {

        const ctx = document.getElementById('humidChart').getContext('2d');

        humidChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                            callback: function (value, index, values) {
                                return value + '%';
                            }
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Umiditate relativă',
                    fontSize: 30
                },
                tooltips: {
                    backgroundColor: 'rgba(0,0,0,0.6)',
                    titleFontColor: 'rgba(0, 0, 0, 0)',
                    titleFontSize: 0,
                    titleMarginBottom: 3,
                    bodyFontSize: 15,
                    callbacks: {
                        label: function (tooltipItems, data) {
                            return '  ' + data.datasets[tooltipItems.datasetIndex].label + '  h: ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index].x + '  ' + tooltipItems.yLabel + '%';
                        }
                    }
                }
            }
        });
    }

    function chartItPress(data) {
        const ctx = document.getElementById('pressChart').getContext('2d');
        pressChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: time,
                datasets: data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                            callback: function (value, index, values) {
                                return value + ' hpa';
                            }
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Presiunea atmosferică',
                    fontSize: 30
                },
                tooltips: {
                    backgroundColor: 'rgba(0,0,0,0.6)',
                    titleFontColor: 'rgba(0, 0, 0, 0)',
                    titleFontSize: 0,
                    titleMarginBottom: 3,
                    bodyFontSize: 15,
                    callbacks: {
                        label: function (tooltipItems, data) {
                            return '  ' + data.datasets[tooltipItems.datasetIndex].label + '  h: ' + data.datasets[tooltipItems.datasetIndex].data[tooltipItems.index].x + '  ' + tooltipItems.yLabel + ' hPa';
                        }
                    }
                }
            }
        });
    }
})
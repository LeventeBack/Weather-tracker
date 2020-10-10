require('./bootstrap');

$(document).ready(function () {
    $(".dropdown-toggle").dropdown();

    let tempChart, humidChart, pressChart;
    const chartPathtext = '.checkbox-list .checkbox-list-item input';

    const time = [];
    for (let i = 0; i < 24; i++) {
        for (let j = 0; j < 60; j++) {
            time.push((i < 10 ? "0" + i : i) + ":" + (j < 10 ? "0" + j : j));
        }
    }

    $('#chart_date').ready(() => {
        let today = new Date().toISOString().substr(0, 10);
        $("#chart_date").val(today);

        let checkElements = document.querySelectorAll(chartPathtext)
        checkElements.forEach(element => {
            element.checked = true;
        });
        $('#chart-form').submit();
    })

    $('#chart-form').on('submit', (event) => {
        event.preventDefault();

        const date = $('#chart_date').val();

        let checkElements = document.querySelectorAll(chartPathtext)
        let sensorIds = [];
        checkElements.forEach(element => {
            if (element.checked) sensorIds.push(parseInt(element.value))
        })
        
        $('#chart-error-message').addClass('d-none');  
        $('#chart-warning-message').addClass('d-none');  
        $('#loading').text('Loading Data...');

        if (sensorIds.length === 0) {
            $('#chart-error-message').removeClass('d-none');
            $('#loading').text('');
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
                success: function ({data}) {
                    $('#loading').text('');
                    if(data[0][0].data.length !== 0){      
                        $('#charts-section').removeClass('d-none');
                        chartItTemp(data[0]);
                        chartItHumid(data[1]);
                        chartItPress(data[2]);
                    } else {
                        $('#chart-warning-message').removeClass('d-none');
                        $('#charts-section').addClass('d-none');
                    }
                },
                error: function (err) {                    
                    $('#loading').text('Something went wrong! Try again later.');
                    console.error(err.responseText);
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
        if(document.getElementById("tempChart") !== null){
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
                        text: 'Air Temperature (°C)',
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
    }

    function chartItHumid(data) {
        if(document.getElementById("humidChart") !== null){
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
                        text: 'Air Humidity (%)',
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
        
    }

    function chartItPress(data) {
        if(document.getElementById("humidChart") !== null){
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
                        text: 'Atmospheric pressure (hPa)',
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
    }
})
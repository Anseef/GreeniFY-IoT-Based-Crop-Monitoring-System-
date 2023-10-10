<?php
    session_start();
    $tableName = $_SESSION['tableName'];
    // Monthly Stat Query
    $entire="SELECT DATE_FORMAT(dates, '%b %e') AS Date,CAST(AVG(mvalue)
     AS UNSIGNED)AS MoistureAVG,CAST(AVG(hvalue) AS UNSIGNED) AS HumidityAVG,
     CAST(AVG(tvalue) AS UNSIGNED) AS TemperatureAVG FROM $tableName WHERE
    DATE(dates) BETWEEN DATE_SUB(CURRENT_DATE, INTERVAL 6 DAY) AND CURRENT_DATE 
    GROUP BY Date";
    $avgResult=mysqli_query($conn, $entire);
    if(mysqli_num_rows($avgResult) > 0){
        while($avgRows = mysqli_fetch_assoc($avgResult)){
            $entireArray[] = $avgRows;
        }
    }
    // 4-Week Moving Average Query
    $fourWeekAvgQuery = "SELECT 
    CONCAT('Week ', FLOOR((DAYOFMONTH(dates) - 1) / 7) + 1) AS Period,
    MIN(DATE(dates)) AS StartDate,
    MAX(DATE(dates)) AS EndDate,
    CAST(AVG(mvalue) AS UNSIGNED) AS MoistureAVG,
    CAST(AVG(hvalue) AS UNSIGNED) AS HumidityAVG,
    CAST(AVG(tvalue) AS UNSIGNED) AS TemperatureAVG 
    FROM $tableName 
    WHERE DATE(dates) BETWEEN DATE_SUB(LAST_DAY(CURRENT_DATE),
    INTERVAL DAY(LAST_DAY(CURRENT_DATE)) - 1 DAY) 
    AND LAST_DAY(CURRENT_DATE) GROUP BY Period";
    $fourWeekAvgResult = mysqli_query($conn, $fourWeekAvgQuery);
    if(mysqli_num_rows($fourWeekAvgResult) > 0){
        while($avgWRows = mysqli_fetch_assoc($fourWeekAvgResult)){
            $fourWeekAvgArray[] = $avgWRows;
        }
    }
?>

<script>
    var currentData = <?php echo json_encode($entireArray) ?>;
    var fourWeekData = <?php echo json_encode($fourWeekAvgArray) ?>;
    var ctx = document.getElementById('barChart').getContext('2d');
    if(currentData){
        var data = {
            labels: currentData.map(entry => entry.Date),
            datasets: [
                {
                    label: 'Moisture',
                    data: currentData.map(entry => entry.MoistureAVG),
                    backgroundColor: 'rgba(164, 209, 157, 1)',
                    borderColor: 'rgba(164, 209, 157, 1)',
                    borderWidth: 0, //line width
                    borderRadius:5, //bar radius
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                },
                {
                    label: 'Temperature',
                    data: currentData.map(entry => entry.TemperatureAVG),
                    backgroundColor: 'rgba(92, 114, 92, 1)',
                    borderColor: 'rgba(92, 114, 92, 1)',
                    borderWidth: 0,
                    borderRadius:5,
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                },
                {
                    label: 'Humidity',
                    data: currentData.map(entry => entry.HumidityAVG),
                    backgroundColor: 'rgba(153, 177, 153, 1)',
                    borderColor: 'rgba(153, 177, 153, 1)',
                    borderWidth: 0,
                    borderRadius:5,
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                }
            ]
        };
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                layout: {
                    padding: {
                        bottom: 20,
                        top: 20,
                        left: 20,
                        right: 20
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                        boxWidth: 7,
                        boxHeight: 7,
                        usePointStyle:true,
                        font: {
                                weight: 500,
                                size: 12,
                            },
                        color: 'rgba(11, 39, 15, 1)'
                        }
                    }
                },
                scales: {
                    x: {
                        borderColor:'green',
                        borderWidth:3,
                        grid: {
                            display: false,
                            borderWidth: 0
                        },
                        ticks: {
                            color: 'black',
                            font: {
                                weight: 300,
                                size: 12  // Increase font weight of x-axis labels
                            },
                        }
                    },
                    y: {
                        border: {
                            display: false
                        },
                        grid: {
                            display: false
                        },
                        min: 20,
                        ticks: {
                            stepSize: 20,
                            color: 'black',
                            font: {
                                weight: 200,
                                size: 10
                            }
                        },
                        afterDraw: function (chart) {
                            var ctx = chart.ctx;
                            var yAxis = chart.scales['y'];
                            ctx.save();
                            ctx.setLineDash([10]); // Set line dash pattern
                            ctx.strokeStyle = 'transparent'; // Set line color
                            ctx.beginPath();
                            var y = yAxis.getPixelForValue(yAxis.min); // Position of the dashed line
                            ctx.moveTo(chart.chartArea.left, y);
                            ctx.lineTo(chart.chartArea.right, y);
                            ctx.stroke();
                            ctx.restore();
                        }
                    }
                }
            }
        }); 
    }
    function filterChart(filter){
    if(filter.value == 1){
        var currentDate = new Date();
        var currentMonthName = currentDate.toLocaleString('default', { month: 'long' })
        barChart.data.labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4'];
        barChart.data.datasets[0].data = fourWeekData.map(entry => entry.MoistureAVG);
        barChart.data.datasets[1].data = fourWeekData.map(entry => entry.TemperatureAVG);
        barChart.data.datasets[2].data = fourWeekData.map(entry => entry.HumidityAVG);
        barChart.options.plugins.title.text = currentMonthName;
        }
        if(filter.value == 2){
        barChart.data.labels = currentData.map(entry => entry.Date);
        barChart.data.datasets[0].data =currentData.map(entry => entry.MoistureAVG);
        barChart.data.datasets[1].data = currentData.map(entry => entry.TemperatureAVG);
        barChart.data.datasets[2].data = currentData.map(entry => entry.HumidityAVG);
        barChart.options.plugins.title.text = "Weekly";
        }
        barChart.update();  
    }
</script>

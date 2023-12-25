<?php
    include "../connection.php";
    session_start();
    $tableName = $_SESSION['tableName'];
    // Monthly Stat Query
    $pumpStat="SELECT DATE(dates) as Date, DATE_FORMAT(dates, '%a') as Day,
    COUNT(status) AS pstat_count FROM $tableName WHERE DATE(dates) BETWEEN
    DATE_SUB(CURRENT_DATE, INTERVAL 6 DAY) AND CURRENT_DATE AND status = 1 
    GROUP BY Date ORDER BY Date ASC";
    $pumpStatResult=mysqli_query($conn,$pumpStat);
    if(mysqli_num_rows($pumpStatResult) > 0){
        while($pumpStatRows = mysqli_fetch_assoc($pumpStatResult)){
            $entirePumpStat[] = $pumpStatRows; 
        }
    }
?>
<script>
    var pumpStat = <?php echo json_encode($entirePumpStat) ?>;
    var field = document.querySelector('.pumpReading .errorField');
    var ctx = document.getElementById('pumpReading').getContext('2d');
    if(pumpStat){
        var data = {
        labels: pumpStat.map(entry => entry.Day),
        datasets: [
            {
                label: 'Reading Per Day',
                data: pumpStat.map(entry => entry.pstat_count),
                backgroundColor: 'transparent',
                borderColor: 'rgba(0, 113, 64, 0.6)',
                borderWidth: 3,
                pointBorderColor: 'transparent',
                pointBorderWidth: 4,
                pointRadius: 4,
                tension: 0.4,
            }
        ]
    };
    var pumpReading = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
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
                    grid: {
                        display : false
                    },
                    ticks: {
                        color: 'black',
                        font: {
                            weight: 300,
                            size: 10
                        }
                    }
                },
                y: {
                    suggestedMin: 0,
                    suggestedMax: 6,
                    grid: {
                        display: false
                    },
                    ticks: {
                        stepSize: 2,
                        color: 'black',
                        font: {
                            weight: 200,
                            size: 10
                        }
                    }
                }
            }
        }
    });
    }else {
        field.innerHTML = "No Data Yet!";
        field.style = "display: block; margin: 0 auto;text-align:center;margin-top:5rem";
    }

</script>
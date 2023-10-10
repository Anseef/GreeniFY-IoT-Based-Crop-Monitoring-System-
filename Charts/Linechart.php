<?php
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
    var ctx = document.getElementById('pumpReading').getContext('2d');
    if(pumpStat){
        var data = {
        labels: pumpStat.map(entry => entry.Day),
        datasets: [
            {
                label: 'Reading Per Day',
                data: pumpStat.map(entry => entry.pstat_count),
                backgroundColor: 'transparent',
                borderColor: 'rgba(0, 113, 64, 1)',
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
                    display: false,
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
                            size: 12
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
    }

</script>
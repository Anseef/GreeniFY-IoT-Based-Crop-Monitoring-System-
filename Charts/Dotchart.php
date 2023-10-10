<?php
    session_start();
    $tableName = $_SESSION['tableName'];
    // Last Week Query
    if(isset($_POST['submitBtn'])){
        $enteredDate=$_POST['date'];
        $searchQuery= "SELECT TIME_FORMAT(TIME(dates), '%h:%i %p') AS timeonly,mvalue,hvalue,
        tvalue from $tableName where DATE(dates) = '$enteredDate'";
      }else{
        $searchQuery= "SELECT TIME_FORMAT(TIME(dates), '%h:%i %p') AS timeonly,mvalue,hvalue,
        tvalue from $tableName where DATE(dates) LIKE CURRENT_DATE";
      }
      $searchResult=mysqli_query($conn,$searchQuery);
      if(mysqli_num_rows($searchResult) > 0){
        while($searchRows = mysqli_fetch_assoc($searchResult)){
            $entireArrayWeekly[] = $searchRows;
        }
      }
?>
<script>
    var dailyData = <?php echo json_encode($entireArrayWeekly) ?>;
    var ctx = document.getElementById('dotChart').getContext('2d');
    if(dailyData){
        var data = {
            labels: dailyData.map(entry => entry.timeonly),
            datasets: [
                {
                    label: 'Moisture',
                    data: dailyData.map(entry => entry.mvalue),
                    backgroundColor: '#17b3c1',
                    borderColor: 'rgba(164, 209, 157, 1)',
                    borderWidth: 0, //line width
                    borderRadius:5, //bar radius
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                },
                {
                    label: 'Temperature',
                    data: dailyData.map(entry => entry.tvalue),
                    backgroundColor: '#07456f',
                    borderColor: 'rgba(92, 114, 92, 1)',
                    borderWidth: 0,
                    borderRadius:5,
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                },
                {
                    label: 'Humidity',
                    data: dailyData.map(entry => entry.hvalue),
                    backgroundColor: '#0d8549',
                    borderColor: 'rgba(153, 177, 153, 1)',
                    borderWidth: 0,
                    borderRadius:5,
                    tension:0.4,
                    pointBorderRadius: 4,
                    pointBorderColor:'transparent'
                }
            ]
        };
        var dotChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                layout: {
                    padding: {
                        bottom: 20,
                        top: 10,
                        left: 20,
                        right: 10
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
                        },
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
                                weight: 500,
                                size: 10 // Increase font weight of x-axis labels
                            },
                            padding: 10,
                            autoSkip: true
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
                                weight: 500,
                                size: 10
                            },
                            padding: 10,
                            autoSkip: true
                        },
                    }
                }
            }
        });
    }
</script>
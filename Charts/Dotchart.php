<?php
    // Last Week Query
    if(isset($_POST['submitBtn'])){
        $enteredDate=$_POST['date'];
        $searchQuery= "SELECT TIME_FORMAT(TIME(dates), '%h:%i %p') AS timeonly,mvalue,hvalue,
        tvalue from Tomato where DATE(dates) = '$enteredDate'";
      }else{
        $searchQuery= "SELECT TIME_FORMAT(TIME(dates), '%h:%i %p') AS timeonly,mvalue,hvalue,
        tvalue from Tomato where DATE(dates) LIKE CURRENT_DATE";
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
                top: 20,
                left: 20,
                right: 20
            }
        },
        plugins: {
            legend: {
                display: false,
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
            }
        }
    }
});
</script>
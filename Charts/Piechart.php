<?php
    session_start();
    // Monthly Stat Query
    $tableName = $_SESSION['tableName'];
    $plantAge="SELECT COUNT(DISTINCT DATE(dates)) AS plantAge FROM $tableName";
    $plantAgeResult=mysqli_query($conn,$plantAge);
    if(mysqli_num_rows($plantAgeResult) > 0){
        while($plantAgeRows = mysqli_fetch_assoc($plantAgeResult)){
            $plantAgeDays= $plantAgeRows['plantAge'];
        }
    }
?>
<script>
    var plantAgeDays = parseInt(<?php echo json_encode($plantAgeDays) ?>)
    var remainingDays = 60 - plantAgeDays
    var plantAge = [plantAgeDays, remainingDays];
    var field = document.querySelector('.plantAge .errorField');
    var ctx = document.getElementById('plantAge').getContext('2d');
    if(plantAgeDays){
        var data = {
            labels: ['Plant Age', 'Remaining Days'],
            datasets: [{
                label: "Days",
                data: plantAge,
                backgroundColor: [
                    'rgba(164, 209, 157, 1)',
                    'rgba(164, 209, 157, 0.2)'
                ],
                borderColor :[
                    'rgba(164, 209, 157, 1)',
                    'rgba(164, 209, 157, 0.2)'
                ]
            }]
        };
        var countChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: {
                layout: {
                    padding: {
                      bottom: 100
                    }
                },  
                radius: 90,
                cutout: 60,
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
                    },
                    labels: {
                        render: 'data',
                        fontColor: 'rgba(29, 68, 51, 1)',
                        fontSize:12,
                    }
                }
            }
        });
    }else {
        field.innerHTML = "No Data Yet!";
        field.style = "display: block; margin: 0 auto;text-align:center;margin-top:5rem";
    }
</script>
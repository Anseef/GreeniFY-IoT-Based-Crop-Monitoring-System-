<?php
    // Monthly Stat Query
    $plantAge="SELECT COUNT(DISTINCT DATE(dates)) AS plantAge FROM chartvalue";
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
    var ctx = document.getElementById('plantAge').getContext('2d');
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
            radius: 110,
            cutout: 100,
            plugins: {
                legend: {
                display: false
                },
                labels: {
                    render: 'data',
                    fontColor: 'rgba(29, 68, 51, 1)',
                    fontSize:12,
                }
            }
        }
    });
</script>
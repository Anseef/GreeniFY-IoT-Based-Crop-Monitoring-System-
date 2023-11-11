const dashTiles = document.querySelector('.dashTiles');
//const chartContainer = document.querySelector('.chart-Container');
const sensorStatusContainer = document.querySelector('.sensor-Status');
$(document).ready(() => {
    setInterval(() => {
        $(dashTiles).load("dashTiles.php");
        //$(chartContainer).load("chartContainer.php");
        $(sensorStatusContainer).load("sensorStatus.php");
    }, 2000);
});
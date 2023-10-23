const dashTiles = document.querySelector('.dashTiles');
const chartContainer = document.querySelector('.chart-Container');
console.log(dashTiles);
$(document).ready(() => {
    setInterval(() => {
        $(dashTiles).load("dashTiles.php");
        $(chartContainer).load("chartContainer.php");
    }, 2000);
});
const parentContainer = document.querySelector('.farm-Main');
const distinctFarmDetails = new Map();
farmIDArray.forEach(farm => {
  distinctFarmDetails.set(farm.farmID, farm);
});
const distinctFarmDetailsArray = Array.from(distinctFarmDetails.values());

distinctFarmDetailsArray.forEach(farm => {
  const farmContainer = document.createElement('div');
  farmContainer.className = 'blocks swiper-slide';
  farmContainer.innerHTML = `
    <i class="fa-solid fa-tractor"></i>
    <h3>${farm.farmName}</h3>
    <span>Farmer in Charge: ${farm.username}</span>
    <span>Contact: ${farm.mobilenumber}</span>
    <a href="Dashboard.php/${farm.farmID}">View more details</a>
  `;
  parentContainer.appendChild(farmContainer);
})
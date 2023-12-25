const morningDiv = document.querySelector('.watering-Details .blocks .morning .watering-time');
const noonDiv = document.querySelector('.watering-Details .blocks .afternoon .watering-time');
const afternoonDiv = document.querySelector('.watering-Details .blocks .night .watering-time');

const fetchDate = async (e) => {
    e.preventDefault();
    const enteredDate = document.querySelector('#dateField').value;
    if (enteredDate !== "") {
        document.querySelector('.watering-Details .currDate').innerHTML = enteredDate;
        try {
            const dateArray = await sendDate(enteredDate);
            const timeOnly = [];
            if (dateArray) {
                console.log(dateArray);
                dateArray.forEach((dateObj) => {
                    if (dateObj && dateObj.dates) {
                        const parts = dateObj.dates.split(' ');
                        const time = parts[1];
                        timeOnly.push(time);
                    }
                });
                TimeSplit(timeOnly);
            }else{
                morningDiv.innerHTML = 'No Results Found';
                noonDiv.innerHTML = 'No Results Found';
                afternoonDiv.innerHTML = 'No Results Found';
            }
        } catch (error) {
            console.error("Error fetching dates:", error);
        }
    }
}
const TimeSplit = (timeOnly) => {

    if (timeOnly) {
        const morningData = [];
        const noonData = [];
        const afternoonData = [];

        timeOnly.forEach(time => {
            // Split the time into hours, minutes, and seconds
            const [hours, minutes] = time.split(':');
            const meridian = hours >= 12 ? 'PM' : 'AM';
            const hours12 = (hours % 12) || 12;
            console.log(hours);
            const time12 = `${hours12}:${minutes}${meridian}`;
            if (hours >= "00" && hours < "12") {
                morningData.push(time12);
            } else if (hours >= "12" && hours < "18") {
                noonData.push(time12);
            } else if (hours >= "18" && hours < "24") {
                afternoonData.push(time12);
            }
        });

        morningDiv.innerHTML = '';
        noonDiv.innerHTML = '';
        afternoonDiv.innerHTML = '';
        const addToDiv = (div, data) => {
            const ul = document.createElement('ul');
            data.forEach(time => {
                const li = document.createElement('li');
                li.textContent = time;
                ul.appendChild(li);
            });
            div.appendChild(ul);
        };

        // Add data to the respective div tags
        addToDiv(morningDiv, morningData);
        addToDiv(noonDiv, noonData);
        addToDiv(afternoonDiv, afternoonData);
    }
}

const sendDate = (enteredDate) => {
    const formData = new FormData();
    formData.append('enteredDate', enteredDate);
    
    return fetch('dashboard.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } else {
            console.error('Error sending data to the server.');
            throw new Error('Network response was not ok.');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}

const form = document.querySelector('.dash-Main form');
form.addEventListener('submit', fetchDate);

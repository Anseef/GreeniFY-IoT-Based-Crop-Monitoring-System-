const homeContainer = document.querySelector('.home-Container');
const createFarmContainer = document.querySelector('.createFarmContainer');
const farmInputField = document.querySelectorAll('.createFarm-Main input');
const errorField = document.querySelectorAll('.createFarm-Main span');

const validation = () => {
    const farmID = document.querySelector('#farmID').value;
    var valid = true;
    const fieldEmpty = isEmptyFields();
    if (!fieldEmpty) {
        const invalidFarmID = farmIDValidation(farmID);
        if (invalidFarmID) {
            valid = false;
        }
    } else {
        valid = false;
    }
    return valid;
}

const isEmptyFields = () => {
    let fieldsEmpty = false;
    farmInputField.forEach((input, id) => {
        if (input.value.trim() === "") { // Use input.value
            errorField[id].innerHTML = "Fill all Fields";
            errorField[id].classList.add('error');
            fieldsEmpty = true;
        } else {
            errorField[id].innerHTML = "";
            errorField[id].classList.remove('error');
        }
    });
    return fieldsEmpty;
}

const farmIDValidation = (farmID) => {
    let invalidFarmID = false;
    if(farmIDArray){
        farmIDArray.forEach(id => {
            if (id.farmID === farmID) {
                errorField[0].innerHTML = "Farm ID already exists!";
                errorField[0].classList.add('error');
                invalidFarmID = true;
            }
        });
        if (!invalidFarmID) {
            errorField[0].innerHTML = "";
            errorField[0].classList.remove('error');
        }
        return invalidFarmID;
    }
}


const popUpWindow = () => {
    homeContainer.classList.add('blur');
    createFarmContainer.classList.add('shown');
}
const closeContainer = () => {
    removeAllFields();
    homeContainer.classList.remove('blur');
    createFarmContainer.classList.remove('shown');
}
const removeAllFields = () => {
    farmInputField.forEach((field,id) => {
        field.value = "";
        errorField[id].innerHTML = "";
        errorField[id].classList.remove('error');
    });
}
const addFarmBtn = document.querySelector('#addFarmBtn');
const closeWindowBtn = document.querySelector('.createFarmContainer i');
addFarmBtn.addEventListener('click',popUpWindow);
closeWindowBtn.addEventListener('click',closeContainer);
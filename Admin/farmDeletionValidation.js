const removeFarmInputField = document.querySelectorAll('.removeFarm-Main input');
const removeFarmErrorField = document.querySelectorAll('.removeFarm-Main span');

const removeValidation = () => {
    const removeFarmID = document.querySelector('#farmIDRemove').value;
    const removeFarmName = document.querySelector('#farmNameRemove').value;
    var valid = true;
    var emptyField = checkEmptyFields();
    if (!emptyField) {
        console.log("non empty");
        const validFarmName = existfarmID(removeFarmID,removeFarmName);
        if (!validFarmName) {
            valid = false;
        }
    } else {
        valid = false;
    }
    return valid;
}

const checkEmptyFields = () => {
    let fieldsEmpty = false;
    removeFarmInputField.forEach((input, id) => {
        if (input.value.trim() === "") { // Use input.value
           removeFarmErrorField[id].innerHTML = "Fill all Fields";
           removeFarmErrorField[id].classList.add('error');
            fieldsEmpty = true;
        } else {
           removeFarmErrorField[id].innerHTML = "";
           removeFarmErrorField[id].classList.remove('error');
        }
    });
    return fieldsEmpty;
}

const existfarmID = (removeFarmID, removeFarmName) => {
    let validFarmID = false;
    let validFarmName = false;

    if (farmIDArray) {
        farmIDArray.forEach(id => {
        if (id.farmID === removeFarmID) {
            validFarmID = true;
                if (id.farmName === removeFarmName) {
                    validFarmName = true;
                }
            }
        });
    }
    if(!validFarmName) {
        removeFarmErrorField[1].innerHTML = " Enter a Valid FarmName";
        removeFarmErrorField[1].classList.add('error');
        
    }else {
        removeFarmErrorField[1].innerHTML = "";
        removeFarmErrorField[1].classList.remove('error');
    }

    if (!validFarmID) {
        removeFarmErrorField[0].innerHTML = "Enter a Valid FarmID";
            removeFarmErrorField[0].classList.add('error');
    }else{
        removeFarmErrorField[0].innerHTML = "";
        removeFarmErrorField[0].classList.remove('error');
    }
    return validFarmName;
}
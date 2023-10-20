const iFields = document.querySelectorAll('.signUpContainer form input');
const errorField = document.querySelectorAll('.signUpContainer form span');
const errorContainer = document.querySelectorAll('.signUpContainer .input-box .field');
const validate = (e) => {
    e.preventDefault();
    var valid = true;
    const farmID = document.querySelector('#farmID').value;
    const userName = document.querySelector('#username').value;
    const MobileNumber = document.querySelector('#mobilenumber').value;
    const Password = document.querySelector('#password').value;
    const fieldsEmpty = inputFields();
    if (fieldsEmpty == false) {
        const validFarmID = farmIDValidation(farmID);
        const validNumber = phoneNumberValidation(MobileNumber);
        const validPassword = passwordValidation(userName,Password);
        if(validNumber == false || validPassword == false || validFarmID == false){
            valid = false;
        }
    }else{
        valid = false;
    }
    if(valid){
        sendData(farmID,userName,MobileNumber,Password);
    }
}
const inputFields = () => {
    let fieldsEmpty = false;
    iFields.forEach((input, id) => {
        if (input.value.trim() === "") {
            errorField[id].innerHTML = "Fill all Fields";
            errorField[id].classList.add('error');
            errorContainer[id].classList.remove('errorCleared');
            errorContainer[id].classList.add('errorOccured');
            fieldsEmpty = true;
        } else {
            errorField[id].innerHTML = "";
            errorContainer[id].classList.remove('errorOccured');
            errorContainer[id].classList.add('errorCleared');
        }
    });
    return fieldsEmpty;
}

const farmIDValidation = (farmID) => {
    let validFarmID = false;
    if(signupArray){
        signupArray.forEach(ID => {
            if (ID.farmID === farmID) {
                validFarmID = true;
            }
        });
        if (!validFarmID) {
            errorField[0].innerHTML = "Please Enter a valid FarmID";
            errorField[0].classList.add('error');
            errorContainer[0].classList.remove('errorCleared');
            errorContainer[0].classList.add('errorOccured');
        } else {
            errorField[0].innerHTML = "";
            errorContainer[0].classList.remove('errorOccured');
            errorContainer[0].classList.add('errorCleared');
        }
        return validFarmID;
    }
}

const phoneNumberValidation = (MobileNumber) => {
    let validNumber = true;
    const check = /^\d{10}$/;
    if(!check.test(MobileNumber)) {
        errorField[2].innerHTML = "Please Enter a valid Phone Number";
        errorField[2].classList.add('error');
        errorContainer[2].classList.remove('errorCleared');
        errorContainer[2].classList.add('errorOccured');
        validNumber = false;
    }else{
        errorField[2].innerHTML = "";
        errorContainer[2].classList.remove('errorOccured');
        errorContainer[2].classList.add('errorCleared');
    }
    return validNumber;
}

const passwordValidation = (userName,Password) => {
    let inValidPassword = false;
    let validPassword = true;
    const condition = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[#$.%&@!+=*]).{8,12}$/;
    if(userDataArray){
        userDataArray.forEach(user => {
            if(user.username.toLowerCase() === userName.toLowerCase()){
                if(user.password === Password){
                    inValidPassword = true;
                    validPassword = false;
                    console.log("both are equal");
                }
            }
        });
        if(!inValidPassword){
            if(!Password.match(condition)){
                errorField[3].innerHTML = "Password is too weak!";
                errorField[3].classList.add('error');
                errorContainer[3].classList.remove('errorCleared');
                errorContainer[3].classList.add('errorOccured');
                validPassword = false;
            }else{
                errorField[3].innerHTML = "";
                errorContainer[3].classList.remove('errorOccured');
                errorContainer[3].classList.add('errorCleared');
            }
        }else{
            errorField[3].innerHTML = "Password is too weak!";
            errorField[3].classList.add('error');
            errorContainer[3].classList.remove('errorCleared');
            errorContainer[3].classList.add('errorOccured');
        }
        return validPassword;
    }   
}

const removeAllFields = () => {
    iFields.forEach((field,id) => {
        field.value = '';
        errorField[id].classList.remove('error');
        errorField[id].innerHTML = '';
        errorContainer[id].classList.remove('errorOccured');
        errorContainer[id].classList.remove('errorCleared');
    });
}
//Ajax request
const sendData = (farmID, userName, MobileNumber, Password) => {
    const formData = new FormData();
    formData.append('farmID', farmID);
    formData.append('username', userName);
    formData.append('mobilenumber', MobileNumber);
    formData.append('password', Password);
    
    fetch('signup_config.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            console.log('Data sent successfully.');
            removeAllFields();
            window.location.href = 'index.php';
        } else {
            console.error('Error sending data to the server.');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}
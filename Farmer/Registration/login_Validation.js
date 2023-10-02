const userErrorField = document.querySelector('.loginContainer #usernameError');
const passErrorField = document.querySelector('.loginContainer #passwordError');
const verification = (e) => {
    e.preventDefault();
    const userFieldValue = document.querySelector('#userField').value;
    const passFieldValue = document.querySelector('#passField').value;
    var valid = false;
    const { isValidUser, isValidPassword } = userCheck(userFieldValue,passFieldValue);
    if(isValidUser){
        userErrorField.classList.remove('error');
        userErrorField.innerHTML = "";

        if(!isValidPassword){
            passErrorField.classList.add('error');
            passErrorField.innerHTML = "Invalid Password";
        }else{
            passErrorField.innerHTML = "";
            valid = true;
            document.querySelector('#userField').value = "";
            document.querySelector('#passField').value = "";
        }
    }else{
        userErrorField.classList.add('error');
        userErrorField.innerHTML = "Invalid Username";
    }
    if(valid){
        sendDataLogin(userFieldValue,passFieldValue);
    }
}
const userCheck = (userFieldValue,passFieldValue) => {
    let isValidUser = false;
    let isValidPassword = false;
    userDataArray.forEach(user => {
        if(user.username.toLowerCase() === userFieldValue.toLowerCase()){
            isValidUser = true;
            if(user.password === passFieldValue){
                isValidPassword = true;
            }
        }
    });
    return { isValidUser, isValidPassword };
}

const sendDataLogin = (userFieldValue, passFieldValue) => {
    const formData = new FormData();
    formData.append('userFieldValue', userFieldValue);
    formData.append('passFieldValue', passFieldValue);
    
    fetch('login_config.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (response.ok) {
            console.log('Data sent successfully.');
            removeAllFields();
            window.location.href = '../homePage.php';
        } else {
            console.error('Error sending data to the server.');
        }
    })
    .catch(error => {
        console.error('Network error:', error);
    });
}

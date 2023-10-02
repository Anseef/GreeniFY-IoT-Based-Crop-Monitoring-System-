const loginSwitch = document.querySelector('.loginSwitch');
const signUpSwitch = document.querySelector('.signUpSwitch');
const loginContainer = document.querySelector('.loginContainer');
const signUpContainer = document.querySelector('.signUpContainer');
const signUpBtnHome = document.querySelector('.signUpBtn');
const switchtoLogin = () => {
    signUpContainer.classList.remove('shown');
    loginContainer.classList.add('shown');
    removeAllFields();
}

const switchtoSignUp = () => {
    loginContainer.classList.remove('shown');
    signUpContainer.classList.add('shown');
}

loginSwitch.addEventListener('click',switchtoLogin);
signUpSwitch.addEventListener('click',switchtoSignUp);
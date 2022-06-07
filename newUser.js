const emailEl = document.querySelector('#exampleInputEmail1');
const passwordEl = document.querySelector('#exampleInputPassword1');
const form = document.querySelector('#signup-form');


  
    const checkEmail = () => {
    let valid = false;
    const email = emailEl.value.trim();
 if (!isEmailValid(email)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkPassword = () => {
    let valid = false;


    const password = passwordEl.value.trim();
    if (!isPasswordSecure(password)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
    } else {
        showSuccess(passwordEl);
        valid = true;
    }

    return valid;
};
const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};

const isBetween = (length, min, max) => length < min || length > max ? false : true;

const showError = (input, message) => {
    // get the form-field element
    const userBox = input.parentElement;
    // add the error class
    userBox.classList.remove('success');
    userBox.classList.add('error');
     const error = userBox.querySelector('small');
    error.textContent = message;
};

const showSuccess = (input) => {

    const userBox = input.parentElement;

  
    userBox.classList.remove('error');
    userBox.classList.add('success');

    const error = userBox.querySelector('small');
    error.textContent = '';
}


form.addEventListener('submit', function (e) {
    // prevent the form from submitting
    e.preventDefault();

    // validate fields
    let 
        isEmailValid = checkEmail(),
        isPasswordValid = checkPassword();

    let isFormValid = isEmailValid &&
        isPasswordValid;

    // submit to the server if the form is valid
    if (isFormValid) {

    }
});


const debounce = (fn, delay = 500) => {
    let timeoutId;
    return (...args) => {
        // cancel the previous timer
        if (timeoutId) {
            clearTimeout(timeoutId);
        }
        // setup a new timer
        timeoutId = setTimeout(() => {
            fn.apply(null, args)
        }, delay);
    };
};

form.addEventListener('input', debounce(function (e) {
    switch (e.target.id) {
        case 'email':
            checkEmail();
            break;
        case 'pass':
            checkPassword();
            break;
      
    }
}));

       var form2 = document.getElementById("signup-form");
        var is_admin = document.getElementById("exampleCheck1");
        form2.addEventListener("submit", function(e){
            // check if the admin checkbox is checked
            e.preventDefault();
            if(is_admin.checked){
                var code = prompt("Please enter the admin code to register as admin:", "");
                if(code === "12345"){
                    form2.submit();
                }else{
                    alert("Wrong admin pin");
                }
            }else{
                form2.submit();
            }
        })
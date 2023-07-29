// Detects credit card type and displays corresponding image number
function ccType(ccNumber) {
    // Grab the first 2 numbers of the Credit Card Number
    let iIN = parseInt(ccNumber.slice(0,2));

    // Mastercard IIN
    if (iIN > 50 && iIN < 56) return 0;
    // Visa IIN
    if (iIN > 39 && iIN < 50) return 1;
    // American Express IIN
    if (iIN > 33 && iIN < 38) return 2;
    // Discover IIN
    if (iIN > 59 && iIN < 66) return 3;

    return 4;
}
// Sets the Credit Card Type Image
function setCCImage(ccNumber) {
    let ccImage = ccType(ccNumber);
    if (ccImage == 4) { // Invalid Credit Card Number
        // Insert Error Message here
    }

    let ccImgs = ['./img/ccMasterCard.png',
    './img/ccVisa.png',
    './img/ccAmericanExpress.png',
    './img/ccDiscover.png'];

    const ccImgContainer = document.querySelector('.ccImg'); // Needs ccImg class added to css
    ccImgContainer.style.backgroundImage = ccImgs[ccImage];
}


// Print error for the register page
function printError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    errorElement.style.display = 'block';
}

// Reset the errortexts upon hitting register: errors are added after.
function resetErrors() {
  resetErrorText("usernameErr");
  resetErrorText("emailErr");
  resetErrorText("passwordErr");
  resetErrorText("confirmPasswordErr");
  resetErrorText("acceptTermsErr");
  resetErrorText("passwordMatchErr");
  resetErrorText("userRoleErr");
}

// Register page button
function register() {
	
	resetErrors();
	
	var username = document.querySelector("#username").value;
    var email = document.querySelector("#email").value;
    var password = document.querySelector("#password").value;
    var confirmPassword = document.querySelector("#confirmPassword").value;
    var acceptTerms = document.querySelector("#acceptTerms").checked; // True or false
	
	console.log(!username);
	console.log(!email );
	console.log(!password );
	console.log(!confirmPassword );
	console.log(!acceptTerms);
		

	
    // Defining error variables with a default value
    var usernameErr = emailErr = passwordErr = confirmPasswordErr = acceptTermsErr = passwordMatchErr = true;
	
	// Validate User Role
	
	const userRole = document.querySelector("#userRole").value;
    if (userRole === "Select") {
        printError("userRoleErr", "Please select a role");
        userRoleErr = true;
    } else {
        userRoleErr = false;
    }
	
	
	// Validate username
    if(username == "") {
        printError("usernameErr", "Please enter your username");
	} else {
		usernameErr = false;	
	}
	// Validate email
    if(email == "") {
        printError("emailErr", "Please enter your email");
	} else {
		emailErr = false;	
	}
	
	// Validate passwordErr
    if(password == "") {
        printError("passwordErr", "Please enter your password");
	} else {
		passwordErr = false;	
	}
	
	// Validate confirmPasswordErr
    if(confirmPassword == "") {
        printError("confirmPasswordErr", "Please confirm your password");
	} else if (confirmPassword == password) {
		confirmPasswordErr = false;
		passwordMatchErr = false;
	} else	{
		confirmPasswordErr = false;
		printError("passwordMatchErr", "Passwords do not match");
	}
	
	// Validate the acceptTermsErr checkbox
	if(acceptTerms)	{
		acceptTermsErr = false;
	} else	{
		printError("acceptTermsErr", "You must accept the terms to register");
	}
	
	console.log("Before the || stuff");
	console.log(usernameErr);
	console.log(emailErr);
	console.log(passwordErr);
	console.log(confirmPasswordErr);
	console.log(acceptTermsErr);
	console.log(passwordMatchErr);
	console.log(userRoleErr);
		
	if((usernameErr || emailErr || passwordErr || confirmPasswordErr || acceptTermsErr || passwordMatchErr || userRoleErr) === true)	{
		console.log("One or more register errors");
		return false;
	} else {
    console.log('Sign up');
    // TO DO: Add actual Sign-up functionality here.
	}
}

// Shows error text under the corresponding line
function showErrorText(errorId, errorMessage) {
    const errorText = document.getElementById(errorId);
    errorText.textContent = errorMessage;
    errorText.style.display = 'block';
}

// Resets error text
function resetErrorText(errorId) {
    const errorText = document.getElementById(errorId);
    errorText.textContent = '';
    errorText.style.display = 'none';
}

// Popup function for Terms of Use and Privacy Policy

function showPopup(popupType) {
  const popupElement = document.getElementById(`popup-${popupType}`);
  popupElement.classList.remove('popup-hidden');
  popupElement.classList.add('popup-displayed');
}

function hidePopup(popupType) {
  const popupElement = document.getElementById(`popup-${popupType}`);
  popupElement.classList.remove('popup-displayed');
  popupElement.classList.add('popup-hidden');
}

function showTerms()	{
  const termsPopup = document.getElementById('popup-terms');
  if (termsPopup.classList.contains('popup-displayed')) {
	hidePopup('terms');
  } else {
	hidePopup('privacy');
	showPopup('terms');
  }
}

function showPrivacy()	{
  const privacyPopup = document.getElementById('popup-privacy');
  if (privacyPopup.classList.contains('popup-displayed')) {
    hidePopup('privacy');
  } else {
    hidePopup('terms');
    showPopup('privacy');
  }
}

const popupLinks = document.querySelectorAll('.popup-link');

popupLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    event.preventDefault();
    const popupType = link.getAttribute('data-popup');
	
	// Hide any currently displayed popup
	const displayedPopup = document.querySelector('.popup-displayed');
    if (displayedPopup) {
      displayedPopup.classList.add('popup-hidden');
      displayedPopup.classList.remove('popup-displayed');
    }
	
    showPopup(popupType);
  });
});

const closeButtons = document.querySelectorAll('.close-button');

closeButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const popupType = button.getAttribute('data-popup');
    hidePopup(popupType);
  });
});










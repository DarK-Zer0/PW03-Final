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

// Register page button
function register() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const errorText = document.getElementById('error-text');

    if (password !== confirmPassword) {
        errorText.textContent = 'Passwords do not match.';
        errorText.style.display = 'block';
    } else {
        // Passwords match, logging a sign up
		// TO DO: Add actual Sign-up functionality here.
        console.log('Sign up');
        errorText.style.display = 'none';
    }
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










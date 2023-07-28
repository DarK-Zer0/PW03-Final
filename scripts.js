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
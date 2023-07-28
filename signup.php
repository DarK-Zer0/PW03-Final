<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Propex</title>
        <meta charset="utf-8">
        <link rel="icon" href="./img/icon.jpg">
        <link rel="stylesheet" href="./styles.css">
        <script src="./scripts.js"></script>
    </head>
    <body>
		<div class="logsign-box">
			<h1 class="logsign-head">Register</h1>
			<p class="logsign-body">Fill in the form to complete your account.</p>
	
			<div class="input-line">
				<input type="text" required placeholder=""/>
				<label for="input-text"> Username</label>
			</div>
		
			<div class="input-line">
				<input type="text" required placeholder=""/>
				<label for="input-text"> Email Address</label>
			</div>
			
			<div class="input-line">
				<input type="text" required placeholder="" id="password" required/>
				<label for="input-text"> Password</label>
			</div>
			
			<div class="input-line">
				<input type="text" required placeholder="" id="confirm-password" required/>
				<label for="input-text"> Confirm Password</label>
				<p id="error-text" class="error-text"></p>
			</div>
			
			<div class="input-check">
				<input type="checkbox" id="accept-terms"/>
				<label for="accept-terms">I accept the <a href="#" class="popup-link"data-popup="terms" onclick="showPopup('terms')">Terms of Use</a> and <a href="#" class="popup-link" data-popup="privacy" onclick="showPopup('privacy')">Privacy Policy</a></label>
			</div>
			
			
			<div class="button">
				<button type="button" onclick="register()">Sign Up</button>
			</div>
			
			<!-- Terms of Use Popup -->
			<div class="popup popup-hidden" id="popup-terms">
			  <h2>Terms of Use</h2>
			  <p>Terms of Use Content</p>
			  <button class="close-button" data-popup="terms" onclick="hidePopup('terms')">Close</button>
			</div>
			
			<!-- Privacy Policy Popup -->
			<div class="popup popup-hidden" id="popup-privacy">
			  <h2>Privacy Policy</h2>
			  <p>Privacy Policy Content</p>
			  <button class="close-button" data-popup="privacy" onclick="hidePopup('privacy')">Close</button>
			</div>
			
		</div>
    </body>
</html>
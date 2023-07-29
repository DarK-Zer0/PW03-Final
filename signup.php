<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Propex</title>
        <meta charset="utf-8">
        <link rel="icon" href="./img/icon.jpg">
        <link rel="stylesheet" href="./styles.css">
        <script src="./scripts.js"></script>
    </head>
    <body id="signup">
        <!-- Return Home Button -->
        <div id="home">
            <a href="./index.html"><img src="./img/logo.png" alt="Propex"></a>
        </div>
		<!-- Registration Container -->
		<div class="logsign-box">
			<h1 class="logsign-head">Register</h1>
			<p class="logsign-body">Fill in the form to complete your account.</p>
	
			<div class="input-line">
            <input type="text" required placeholder="" id="username" />
            <label for="username"> Username</label>
            <span class="error-text" id="usernameErr"></span>
        </div>

        <div class="input-line">
            <input type="text" required placeholder="" id="email" />
            <label for="email"> Email Address</label>
            <span class="error-text" id="emailErr"></span>
        </div>

        <div class="input-line">
            <input type="text" required placeholder="" id="password" />
            <label for="password"> Password</label>
            <span class="error-text" id="passwordErr"></span>
        </div>

        <div class="input-line">
            <input type="text" required placeholder="" id="confirmPassword" />
            <label for="confirmPassword"> Confirm Password</label>
            <span class="error-text" id="confirmPasswordErr"></span>
			<span class="error-text" id="passwordMatchErr"></span>
        </div>
		
		<div class="input-dropdown">
            <select id="userRole">
                <option value="Select">Select</option>
                <option value="Seller">Seller</option>
                <option value="Buyer">Buyer</option>
                <option value="Admin">Admin</option>
            </select>
            <label for="userRole">Account Type</label>
            <span id="userRoleErr"></span>
        </div>
		<br>
        <div class="input-check">
            <input type="checkbox" id="acceptTerms" />
            <label for="acceptTerms">I accept the <a href="#" class="popup-link" data-popup="terms" onclick="showTerms()">Terms of Use</a> and <a href="#" class="popup-link" data-popup="privacy" onclick="showPrivacy()">Privacy Policy</a></label>
            <span class="error-text" id="acceptTermsErr"></span>
        </div>
			
			
			<div class="button">
				<button type="button" onclick="register()">Sign Up</button>
			</div>
			
			<!-- Terms of Use Popup -->
			<div class="popup popup-hidden" id="popup-terms">
			  <h2>Terms of Use</h2>
			  <p>Terms of Use for Propex

Welcome to Propex! These terms and conditions govern your use of our website and services. By accessing or using our platform, you agree to be bound by these terms.
<br><br>
1. Account Registration: You must create an account. Keep your login credentials confidential.
<br><br>
2. User Content: Any content you submit on our platform is your responsibility. Do not upload inappropriate or copyrighted material.
<br><br>
3. Prohibited Activities: You must not engage in any illegal, harmful, or abusive activities on our website.
<br><br>
4. Intellectual Property: Our website and its content are protected by copyright and other laws. Do not use our content without permission.
<br><br>
5. Disclaimer: We strive for accuracy, but we do not guarantee the completeness or accuracy of information on our platform.
<br><br>
6. Limitation of Liability: Propex is not liable for any direct or indirect damages arising from your use of our website.
<br><br>
7. Privacy: Our Privacy Policy governs how we collect and use your data. By using our platform, you consent to our data practices.
<br><br>
8. Modifications: We may update these terms from time to time. Check back regularly for any changes.
<br><br>
By using Propex, you agree to these Terms of Use. If you do not agree, please refrain from using our platform.
</p>
			  <button class="close-button" data-popup="terms" onclick="hidePopup('terms')">Close</button>
			</div>
			
			<!-- Privacy Policy Popup -->
			<div class="popup popup-hidden" id="popup-privacy">
			  <h2>Privacy Policy</h2>
			  <p>Privacy Policy for Propex

At Propex, we value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, and safeguard your data.
<br><br>
1. Information Collection: We may collect personal data when you create an account, use our services, or interact with our platform.
<br><br>
2. Use of Information: We use your data to provide and improve our services, personalize your experience, and communicate with you.
<br><br>
3. Data Sharing: We do not sell your personal information to third parties. We may share data with trusted partners for service delivery.
<br><br>
4. Security Measures: We employ industry-standard security measures to protect your data from unauthorized access.
<br><br>
5. Cookies: We use cookies to enhance your browsing experience and analyze website traffic.
<br><br>
6. Third-Party Links: Our platform may contain links to third-party websites. We are not responsible for their privacy practices.
<br><br>
7. Children's Privacy: Our services are not intended for children under 13. We do not knowingly collect data from minors.
<br><br>
8. Data Retention: We retain your information as long as necessary for the purposes outlined in this policy.
<br><br>
9. Your Rights: You have the right to access, modify, or delete your data. Contact us to exercise these rights.
<br><br>
10. Policy Changes: We may update this policy periodically. Check back to review any revisions.
<br><br>
By using Propex, you agree to our Privacy Policy. If you have any questions or concerns, please contact us.
</p>
			  <button class="close-button" data-popup="privacy" onclick="hidePopup('privacy')">Close</button>
			</div>
			
		</div>
    </body>
</html>
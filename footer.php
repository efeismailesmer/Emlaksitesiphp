
  <!-- Footer -->
  <div id="footer">
    <div class="container">
      <div class="row">
	    <div class="col-md-4 col-sm-12 col-xs-12">
          <a href="index.html"><img class="footer-logo" src="images/footer_logo.png" alt=""></a>
          <p><?php echo $ayargetir['ayar_aciklama'] ?></p>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
          <h4>Kategorilerimiz</h4>
          <ul class="utf-footer-links-item">
            <?php
            $altkategori=$baglan->prepare("SELECT * from altkategori ");
            $altkategori->execute();

            while ($altkategorigetir=$altkategori->fetch(PDO::FETCH_ASSOC)) { ?>
            <li><a href="ilanlar-<?php echo yazilimyolcusu($altkategorigetir['alt_baslik']).'-'.$altkategorigetir['altkat_id'] ?>"><?php echo $altkategorigetir['alt_baslik'] ?></a></li>
          <?php } ?>
          </ul>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6">
          <h4>Sayfalar</h4>
          <ul class="utf-footer-links-item">
            <li><a href="#">Ekibimiz</a></li>
            <li><a href="#">Hakkımızda</a></li>
            <li><a href="#">İletişim</a></li>
            <li><a href="#">İlan Ekle</a></li>
			
          </ul>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="copyrights">Tüm Hakları Saklıdır © 2024 Yuvam Emlak.</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Back To Top Button -->
  <div id="backtotop"><a href="#"></a></div>
</div>

<!-- Sign In Popup -->
<div id="utf-signin-dialog-block" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
  <div class="utf-signin-form-part">
    <ul class="utf-popup-tabs-nav-item">
      <li><a href="#login">Log In</a></li>
      <li><a href="#register">Register</a></li>
    </ul>
    <div class="utf-popup-container-part-tabs">
      <!-- Login -->
      <div class="utf-popup-tab-content-item" id="login">
        <div class="utf-welcome-text-item">
          <h3>Welcome Back Sign in to Continue</h3>
          <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span>
		</div>
        <form method="post" id="login-form">
          <div class="utf-no-border">
            <input type="text" name="emailaddress" id="emailaddress" placeholder="Email Address" required/="">
          </div>
          <div class="utf-no-border">
            <input type="password" name="password" id="password" placeholder="Password" required/="">
          </div>
		  <div class="checkbox margin-top-0">
			<input type="checkbox" id="two-step">
			<label for="two-step"><span class="checkbox-icon"></span> Remember Me</label>
		  </div>
          <a href="forgot_password.html" class="forgot-password">Forgot Password?</a>
        </form>
        <button class="button full-width utf-button-sliding-icon ripple-effect" type="submit" form="login-form">Log In <i class="icon-feather-chevrons-right"></i></button>
        <div class="utf-social-login-separator-item"><span>Or Login in With</span></div>
        <div class="utf-social-login-buttons-block">
          <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Facebook</button>
		  <button class="google-login ripple-effect"><i class="icon-brand-google"></i> Google</button>
		  <button class="twitter-login ripple-effect"><i class="icon-brand-twitter"></i> Twitter</button>
        </div>
      </div>

      <!-- Register -->
      <div class="utf-popup-tab-content-item" id="register">
        <div class="utf-welcome-text-item">
          <h3>Create your Account!</h3>
		  <span>Don't Have an Account? <a href="#" class="register-tab">Sign Up!</a></span>
        </div>
        <form method="post" id="utf-register-account-form">
          <div class="utf-no-border margin-bottom-20">
			<select class="utf-chosen-select-single-item utf-with-border" title="Single User">
				<option>Single User</option>
				<option>Agent</option>
				<option>Multi User</option>
			</select>
		  </div>
		  <div class="utf-no-border">
            <input type="text" name="name" id="name" placeholder="User Name" required/="">
          </div>
		  <div class="utf-no-border">
            <input type="text" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" required/="">
          </div>
		  <div class="utf-no-border">
            <input type="password" name="password-register" id="password-register" placeholder="Password" required/="">
          </div>
          <div class="utf-no-border">
            <input type="password" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required/="">
          </div>
		  <div class="checkbox margin-top-0">
			<input type="checkbox" id="two-step0">
			<label for="two-step0"><span class="checkbox-icon"></span> By Registering You Confirm That You Accept <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></label>
		  </div>
        </form>
        <button class="margin-top-10 button full-width utf-button-sliding-icon ripple-effect" type="submit" form="utf-register-account-form">Register <i class="icon-feather-chevrons-right"></i></button>
      </div>
    </div>
  </div>
</div>
<!-- Sign In Popup / End -->

<!-- Scripts -->
<script src="scripts/jquery-3.3.1.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/chosen.min.js"></script>
<script src="scripts/magnific-popup.min.js"></script>
<script src="scripts/owl.carousel.min.js"></script>
<script src="scripts/rangeSlider.js"></script>
<script src="scripts/sticky-kit.min.js"></script>
<script src="scripts/slick.min.js"></script>
<script src="scripts/masonry.min.js"></script>
<script src="scripts/mmenu.min.js"></script>
<script src="scripts/tooltips.min.js"></script>
<script src="scripts/custom_jquery.js"></script>
</body>
</html>

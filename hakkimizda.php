<?php require_once 'header.php';


$hakkimizda=$baglan->prepare("SELECT * from hakkimizda where hakkimizda_id=?");
$hakkimizda->execute(array(0));

$hakkimizdagetir=$hakkimizda->fetch(PDO::FETCH_ASSOC);


?>


  <!-- Contact -->
  <div class="margin-top-65 padding-bottom-55">
	  <div class="container">
		<div class="row">
		  <div class="col-xl-12 col-md-12">
        <h1><?php echo $hakkimizdagetir['hakkimizda_baslik'] ?></h1>
			<p style="color:black !important"><?php echo $hakkimizdagetir['hakkimizda_aciklama'] ?></p>
			</ul>
		  </div>
		</div>
	  </div>
  </div>
  <!-- Container / End -->

  <!-- Fullwidth Section -->


  <section class="fullwidth margin-bottom-0 padding-top-60 padding-bottom-0" data-background-color="#ffffff">
    <!-- Logo Carousel -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<div class="utf-section-headline-item centered margin-bottom-30 margin-top-10">
			  <h3 class="headline"><span>Referanslarımız</span> Markalarımız</h3>
			  <div class="utf-headline-display-inner-item">Yuvam Emlak</div>
			  <p class="utf-slogan-text">Bizi tercih eden firmalar</p>
			</div>
		</div>
        <!-- Carousel -->
        <div class="col-md-12">
          <div class="utf-logo-carousel-item dot-navigation">
            <div class="item"><a href="#"><img src="images/brand_logo_01.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_02.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_03.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_04.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_05.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_06.png" alt=""></a></div>
            <div class="item"><a href="#"><img src="images/brand_logo_07.png" alt=""></a></div>
          </div>
        </div>
        <!-- Carousel / End -->
      </div>
    </div>
    <!-- Logo Carousel / End -->
  </section>
<?php require_once 'footer.php'; ?>

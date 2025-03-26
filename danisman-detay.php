<?php require_once 'header.php';

$danisman=$baglan->prepare("SELECT * from danismanlar where danisman_id=?");
$danisman->execute(array($_GET['id']));

$danismangetir=$danisman->fetch(PDO::FETCH_ASSOC);
?>
<br>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- Agency -->
        <div class="agent agents-profile agency margin-bottom-40"> <a href="agency-profile.html" class="utf-agent-avatar"> <img src="Admin/resimler/<?php echo $danismangetir['danisman_resim'] ?>" alt=""> </a>
          <div class="utf-agent-content">
            <div class="utf-agent-name">
              <h4><a href="agency-profile.html"><?php echo $danismangetir['danisman_isim'] ?></a></h4>
              <p>Yazılım Yolcusu Ekip Arkadaşımız</p>
              <ul class="utf-agent-contact-details">
				  <li style="color:black"><i style="color:black" class="icon-feather-smartphone"></i><?php echo $danismangetir['danisman_telefon'] ?></li>
				  <li style="color:black"><i style="color:black" class="icon-material-outline-email"></i><a style="color:black" href="#"><?php echo $danismangetir['danisman_mail'] ?></a></li>
			  </ul>
			  <ul class="utf-social-icons">
				  <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
				  <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
				  <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				  <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
				  <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
			  </ul>
			</div>
			<div class="clearfix"></div>
            <p><?php echo $danismangetir['danisman_gorev'] ?></p>
          </div>
        </div>
	  </div>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <div class="row sticky-wrapper">
      <div class="col-lg-12 col-md-12">
		<div style="background-color:black" class="utf-desc-headline-item margin-top-0">
			<h3><i class="icon-material-outline-description"></i>Danışmanın İlanları</h3>
		</div>
        <!-- Sorting -->
		  <div class="utf-sort-box-aera">
			<div class="sort-by">
			  <label>Sort By:</label>
			  <div class="sort-by-select">
				<select data-placeholder="Default Properties" class="utf-chosen-select-single-item">
				  <option>Default Properties</option>
				  <option>Low to High Price</option>
				  <option>High to Low Price</option>
				  <option>Newest Properties</option>
				  <option>Oldest Properties</option>
				</select>
			  </div>
			</div>
			<div class="utf-layout-switcher">
				<a href="#" class="list"><i class="sl sl-icon-list"></i></a>
				<a href="#" class="grid"><i class="sl sl-icon-grid"></i></a>
			</div>
		  </div>

        <!-- Listings -->
        <div class="utf-listings-container-area list-layout">
		<!-- Listing Item -->
		<div class="utf-listing-item"> <a href="#" class="utf-smt-listing-img-container">
		  <div class="utf-listing-badges-item"> <span class="featured">Featured</span> <span class="for-sale">For Sale</span> </div>
		  <div class="utf-listing-img-content-item">
			<img class="utf-user-picture" src="images/user_1.jpg" alt="user_1">
			<span class="like-icon with-tip" data-tip-content="Bookmark"></span>
			<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
			<span class="video-button with-tip" data-tip-content="Video"></span>
		  </div>
		  <div class="utf-listing-carousel-item">
			<div><img src="images/listing-01.jpg" alt=""></div>
			<div><img src="images/listing-01.jpg" alt=""></div>
			<div><img src="images/listing-01.jpg" alt=""></div>
		  </div>
		  </a>
		  <div class="utf-listing-content">
			<div class="utf-listing-title">
			  <span class="utf-listing-price">$22,000/mo</span>
			  <h4><a href="#">Renovated Luxury Apartment</a></h4>
			  <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 2021 San Pedro, Los Angeles 90015</span>
			</div>
			<ul class="listing-details">
				<li><i class="fa fa-bed"></i> Beds<span>3</span></li>
				<li><i class="icon-feather-codepen"></i> Baths<span>2</span></li>
				<li><i class="fa fa-car"></i> Garages<span>2</span></li>
				<li><i class="icon-line-awesome-arrows"></i> Sq Ft<span>1530</span></li>
			</ul>
			<div class="utf-listing-user-info"><a href="agents-profile.html"><i class="icon-line-awesome-user"></i> John Williams</a> <span>1 Days Ago</span></div>
		  </div>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="utf-listing-item"> <a href="#" class="utf-smt-listing-img-container">
		  <div class="utf-listing-badges-item"> <span class="for-rent">For Rent</span> </div>
		  <div class="utf-listing-img-content-item">
			<img class="utf-user-picture" src="images/user_1.jpg" alt="user_1">
			<span class="like-icon with-tip" data-tip-content="Bookmark"></span>
			<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
			<span class="video-button with-tip" data-tip-content="Video"></span>
		  </div>
		  <img src="images/listing-02.jpg" alt=""> </a>
		  <div class="utf-listing-content">
			<div class="utf-listing-title">
			  <span class="utf-listing-price">$25,000/mo</span>
			  <h4><a href="#">Renovated Luxury Apartment</a></h4>
			  <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 2021 San Pedro, Los Angeles 90015</span>
			</div>
			<ul class="listing-details">
				<li><i class="fa fa-bed"></i> Beds<span>3</span></li>
				<li><i class="icon-feather-codepen"></i> Baths<span>2</span></li>
				<li><i class="fa fa-car"></i> Garages<span>2</span></li>
				<li><i class="icon-line-awesome-arrows"></i> Sq Ft<span>1530</span></li>
			</ul>
			<div class="utf-listing-user-info"><a href="agents-profile.html"><i class="icon-line-awesome-user"></i> John Williams</a> <span>1 Days Ago</span></div>
		  </div>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="utf-listing-item"> <a href="#" class="utf-smt-listing-img-container">
		  <div class="utf-listing-badges-item"> <span class="featured">Featured</span> <span class="for-rent">For Rent</span> </div>
		  <div class="utf-listing-img-content-item">
			<img class="utf-user-picture" src="images/user_1.jpg" alt="user_1">
			<span class="like-icon with-tip" data-tip-content="Bookmark"></span>
			<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
			<span class="video-button with-tip" data-tip-content="Video"></span>
		  </div>
		  <img src="images/listing-03.jpg" alt=""> </a>
		  <div class="utf-listing-content">
			<div class="utf-listing-title">
			  <span class="utf-listing-price">$18,000/mo</span>
			  <h4><a href="#">Renovated Luxury Apartment</a></h4>
			  <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 2021 San Pedro, Los Angeles 90015</span>
			</div>
			<ul class="listing-details">
				<li><i class="fa fa-bed"></i> Beds<span>3</span></li>
				<li><i class="icon-feather-codepen"></i> Baths<span>2</span></li>
				<li><i class="fa fa-car"></i> Garages<span>2</span></li>
				<li><i class="icon-line-awesome-arrows"></i> Sq Ft<span>1530</span></li>
			</ul>
			<div class="utf-listing-user-info"><a href="agents-profile.html"><i class="icon-line-awesome-user"></i> John Williams</a> <span>1 Days Ago</span></div>
		  </div>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="utf-listing-item"> <a href="#" class="utf-smt-listing-img-container">
		  <div class="utf-listing-badges-item"> <span class="for-sale">For Sale</span> </div>
		  <div class="utf-listing-img-content-item">
			<img class="utf-user-picture" src="images/user_1.jpg" alt="user_1">
			<span class="like-icon with-tip" data-tip-content="Bookmark"></span>
			<span class="compare-button with-tip" data-tip-content="Add to Compare"></span>
			<span class="video-button with-tip" data-tip-content="Video"></span>
		  </div>
		  <div class="utf-listing-carousel-item">
			<div><img src="images/listing-04.jpg" alt=""></div>
			<div><img src="images/listing-04.jpg" alt=""></div>
		  </div>
		  </a>
		  <div class="utf-listing-content">
			<div class="utf-listing-title">
			  <span class="utf-listing-price">$15,000/mo</span>
			  <h4><a href="#">Renovated Luxury Apartment</a></h4>
			  <span class="utf-listing-address"><i class="icon-material-outline-location-on"></i> 2021 San Pedro, Los Angeles 90015</span>
			</div>
			<ul class="listing-details">
				<li><i class="fa fa-bed"></i> Beds<span>3</span></li>
				<li><i class="icon-feather-codepen"></i> Baths<span>2</span></li>
				<li><i class="fa fa-car"></i> Garages<span>2</span></li>
				<li><i class="icon-line-awesome-arrows"></i> Sq Ft<span>1530</span></li>
			</ul>
			<div class="utf-listing-user-info"><a href="agents-profile.html"><i class="icon-line-awesome-user"></i> John Williams</a> <span>1 Days Ago</span></div>
		  </div>
		</div>
	    </div>
        <!-- Listings Container / End -->

        <!-- Pagination -->
        <div class="utf-pagination-container margin-top-20">
          <nav class="pagination">
            <ul>
              <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
			  <li><a href="#" class="current-page">1</a></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li class="blank">...</li>
			  <li><a href="#">10</a></li>
			  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul>
          </nav>
        </div>
        <!-- Pagination / End -->
      </div>

      <!-- Sidebar -->
    
    </div>
  </div>
<?php require_once 'footer.php'; ?>

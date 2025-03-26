<?php require_once 'header.php'; ?>
<br>
  <!-- Main Search Container -->
    <div style="background-color:red !important" class="utf-main-search-container-area inner-map-search-block inner-search-item">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <!-- Type -->
              <div class="utf-search-type-block-area margin-top-35">
				<div class="search-type">
				  <label class="active">
					<input class="first-tab" name="tab" checked="checked" type="radio">İlanlar</label>
				  <label>
					<input name="tab" type="radio">Satılık</label>
				  <label>
					<input name="tab" type="radio">Kiralık</label>
					<div class="utf-search-type-arrow"></div>
				</div>
			  </div>

              <!-- Box -->
              <div  class="utf-main-search-box-area">
                <!-- Row With Forms -->
                <div class="row with-forms">
                  <!-- Status -->

<form  action="listele2.php" method="post">


                  <!-- Property Type -->
                  <div class="col-md-2 col-sm-4">

          <input name="dusuk" placeholder="Min. Fiyat" type="number" class="">
                  </div>
                  <div class="col-md-2 col-sm-4">

              <input name="yuksek" placeholder="Max. Fiyat" type="number" class="">
                  </div>
                  <div class="col-md-2 col-sm-4">
                    <button name="listele" class="button"><i class="fa fa-search"></i> Ara</button>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                  </div>
</form>
<form  action="listele2.php" method="post">

                  <!-- Main Search Input -->
                  <div class="col-md-6">
                    <div class="utf-main-search-input-item">


                      <input name="arama" type="text" placeholder="Anahtar Kelime..." value="">
                      <button name="listeleara" class="button"><i class="fa fa-search"></i> Ara</button>
                            </form>
                    </div>
                  </div>

                </form>
                </div>
                <!-- Row With Forms / End -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  <!-- Main Search Container / End -->

  <!-- Content -->
  <div class="container">
    <div class="row sticky-wrapper">
        <!-- Sorting -->
        <div class="utf-sort-box-aera">
            <div class="sort-by">
              <form class="" action="listele" method="get">


              <label>Sıralama:</label>
              <div class="sort-by-select">
                <select name="listele" data-placeholder="Default Properties" class="utf-chosen-select-single-item">
                  <option value="1">Artan Fiyat</option>
                  <option value="2">Azalan Fiyat</option>
                  <option value="3">En Yeni İlanlar</option>
                  <option value="4">Eski İlanlar</option>
                </select>
               <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

              </div>
              <button style="height:40px; margin-left:15px" class="button" type="submit" name="listeleme">Listele</button>
</form>
            </div>
        </div>

        <!-- Listings Container -->
        <div class="row">
          <?php
          $ilanlar=$baglan->prepare("SELECT * from ilanlar where altkategori_id=?");
          $ilanlar->execute(array($_GET['id']));

          while ($ilanlargetir=$ilanlar->fetch(PDO::FETCH_ASSOC)) {
            $ustkatid=$ilanlargetir['kategori_id'];
 ?>

          <div class="col-md-4">
            <div class="utf-listing-item compact">
			  <a href="ilandetay-<?php echo yazilimyolcusu($ilanlargetir['ilan_baslik']).'-'.$ilanlargetir['ilan_id'] ?>" class="utf-smt-listing-img-container">
				  <div class="utf-listing-badges-item"> <span class="featured">  <?php if ($ustkatid=="4"){ echo "Kiralık"; }elseif ($ustkatid=="1") {echo "Satılık";   } ?></span> <span class="for-sale"><?php echo $ilanlargetir['ilan_fiyat'] ?>₺</span> </div>
				  <div class="utf-listing-img-content-item">
					 <span class="utf-listing-compact-title-item"><?php echo $ilanlargetir['ilan_baslik'] ?> <i><?php echo $ilanlargetir['ilan_fiyat'] ?>₺</i></span>
				  </div>
				  <img src="Admin/resimler/ilanlar/<?php echo $ilanlargetir['ilan_resim'] ?>" alt="">
				  <ul class="listing-hidden-content">
					  <li><i class="fa fa-bed"></i> Oda Sayısı <span><?php echo $ilanlargetir['ilan_odasayisi'] ?></span></li>
					  <li><i class="icon-feather-codepen"></i> Metre <span><?php echo $ilanlargetir['ilan_metrekare'] ?></span></li>
					  <li><i class="fa fa-arrows-alt"></i>Aidat <span><?php echo $ilanlargetir['ilan_aidat'] ?>₺</span></li>
				  </ul>
			  </a>
			</div>
          </div>
<?php } ?>


        </div>


        <!-- Pagination -->
        <div class="clearfix"></div>
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

      <!-- Sidebar / End -->
    </div>
  </div>
<?php require_once 'footer.php'; ?>

<?php require_once 'header.php';
require_once 'slider.php';
?>

<!-- Content -->
<section class="fullwidth" data-background-color="#ffffff">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf-section-headline-item centered margin-bottom-30 margin-top-0">
                    <h3 class="headline"><span>En Son Yüklenen İlanlar</span></h3>
                    <p class="utf-slogan-text">En SON Yüklenen İlanlarımızı Kontrol Edebilirsiniz.</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="carousel">

                    <?php
                    // İlanları veritabanından çekiyoruz
                    $ilanlar = $baglan->prepare("SELECT * FROM ilanlar ORDER BY ilan_id DESC");
                    $ilanlar->execute();

                    // İlanları döngüyle listeliyoruz
                    while ($ilanlargetir = $ilanlar->fetch(PDO::FETCH_ASSOC)) { 
                        // Resim dosyasının yolunu oluştur
                        $resimYolu = 'Admin/resimler/ilanlar/' . $ilanlargetir['ilan_resim'];

                        // Eğer dosya yoksa, varsayılan bir resim kullan
                        if (empty($ilanlargetir['ilan_resim'])) {
                            $resimYolu = 'Admin/resimler/ilanlar/default.jpg'; // Varsayılan resim
                        }
                    ?>
                        <div class="utf-carousel-item-area">
                            <div class="utf-listing-item compact">
                                <a href="ilandetay-<?php echo yazilimyolcusu($ilanlargetir['ilan_baslik']) . '-' . $ilanlargetir['ilan_id']; ?>" class="utf-smt-listing-img-container">
                                    <div class="utf-listing-badges-item">
                                        <span class="featured">Öne Çıkanlar</span>
                                        <span class="for-sale">İlanlar</span>
                                    </div>
                                    <div class="utf-listing-img-content-item">
                                        <span class="utf-listing-compact-title-item">
                                            <?php echo $ilanlargetir['ilan_baslik']; ?>
                                            <i><?php echo number_format($ilanlargetir['ilan_fiyat'], 2, ',', '.'); ?>₺</i>
                                        </span>
                                    </div>

                                    <img src="<?php echo $resimYolu; ?>" alt="<?php echo $ilanlargetir['ilan_baslik']; ?>" />
                                    <ul class="listing-hidden-content">
                                        <li><i class="fa fa-bed"></i> Oda Sayısı <span><?php echo $ilanlargetir['ilan_odasayisi']; ?></span></li>
                                        <li><i class="icon-feather-codepen"></i> Metre <span><?php echo $ilanlargetir['ilan_metrekare']; ?></span></li>
                                        <li><i class="fa fa-arrows-alt"></i> Aidat <span><?php echo $ilanlargetir['ilan_aidat']; ?>₺</span></li>
                                    </ul>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    

                </div>
            </div>
            <div class="col-md-12 text-center">
                <a href="ilantur.php" class="btn btn-primary">İlan Ekle</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>

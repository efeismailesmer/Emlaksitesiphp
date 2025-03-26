<?php 
session_start();
require_once 'Admin/baglan.php';
require_once 'function.php';

$ayar=$baglan->prepare("SELECT * from ayarlar where ayar_id=?");
$ayar->execute(array(0));

$ayargetir=$ayar->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<title><?php echo $ayargetir['ayar_baslik'] ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Yuvam Emlak">
<meta name="theme-color" content="#e33324">
<meta name="description" content="<?php echo $ayargetir['ayar_aciklama'] ?>">
<meta name="keywords" content="<?php echo $ayargetir['ayar_key'] ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--  Favicon -->
<link rel="shortcut icon" href="images/favicon.png">

<!-- CSS -->
<link rel="stylesheet" href="css/stylesheet.css">

<!-- Google Fonts -->
<link href="../../css.css?family=Nunito:300,400,600,700,800&display=swap" rel="stylesheet">
<link href="../../css-1.css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">

<!-- Custom CSS for Menu -->
<style>
    /* Menüdeki liste öğelerini yatay hale getirmek için */
    #navigation ul {
        list-style-type: none; /* Liste işaretlerini kaldır */
        margin: 0;
        padding: 0;
        display: flex; /* Flexbox ile öğeleri yatay yerleştir */
        justify-content: flex-start; /* Öğeleri sola hizala */
        flex-wrap: nowrap; /* Öğelerin alt satıra geçmesini engelle */
        width: 100%; /* Yatayda tam genişlik */
    }

    /* Menü öğelerinin font boyutunu büyütmek ve kenarlardan boşluk bırakmak için padding ekle */
    #navigation ul li {
        margin-right: 20px; /* Her li öğesi arasına boşluk ekle */
        font-size: 32px; /* Yazı boyutunu 32px olarak ayarla */
        padding: 10px 20px; /* Menü öğelerinin iç boşluğunu düzenle */
        text-align: center; /* Yazıları ortala */
        white-space: nowrap; /* Satır sonu yapmasını engelle */
        position: relative; /* Alt menülerin düzgün şekilde görünmesi için konumlandırma */
    }

    /* Menü öğelerine stil ekleyerek okunabilirliği artırmak */
    #navigation ul li a {
        color: white; /* Link rengini beyaz yap */
        text-decoration: none; /* Alt çizgiyi kaldır */
        font-size: 32px; /* Yazı boyutunu 32px olarak ayarla */
    }

    /* Alt menülerin görünürlüğünü artırmak ve hizalamayı düzeltmek */
    #navigation ul li ul {
        display: none; /* Alt menüyü gizle */
        position: absolute; /* Alt menüleri üst öğelerin üzerine yerleştir */
        background-color: #f1f1f1;
        padding: 10px;
        border-radius: 5px;
        z-index: 1;
        min-width: 200px; /* Alt menülerin genişliğini artır */
        left: 0; /* Alt menünün düzgün şekilde hizalanması için */
        top: 100%; /* Alt menüyü ana menü öğesinin altına yerleştir */
    }

    /* Üzerine gelince alt menüleri göster */
    #navigation ul li:hover > ul {
        display: block;
    }

    /* Alt menüdeki öğeleri düzenle */
    #navigation ul li ul li {
        display: block;
        font-size: 24px; /* Alt menü öğelerinin font boyutunu küçült */
        padding: 5px 10px; /* Alt menü öğelerine iç boşluk ekle */
        text-align: left; /* Alt menü öğelerini sola hizala */
    }

    /* Alt menü öğelerinin kenar boşlukları */
    #navigation ul li ul li a {
        display: block; /* Bağlantıları blok seviyesinde göster */
        padding: 5px 10px; /* İç boşluk */
        text-align: left; /* Yazıyı sola hizala */
        color: black; /* Link rengini siyah yap */
        text-decoration: none; /* Alt çizgiyi kaldır */
    }

    /* Hesabım menüsüne tıklandığında alt menülerin görünür olması için */
    #navigation ul li > a {
        cursor: pointer;
    }

    /* Hesabım menüsü altındaki alt menüyü göstermek */
    #navigation ul li:last-child:hover > ul {
        display: block;
    }

    /* Menüdeki alt öğelere gelindiğinde tıklanabilir yapmak */
    #navigation ul li > a:hover {
        pointer-events: auto; /* Fare ile üzerine gelindiğinde tıklanabilir yap */
    }

</style>

</head>

<body>
<!-- Wrapper -->
<div id="wrapper">
  <!-- Header Container -->
  <header style="background-color:red" id="header-container">
    <!-- Header -->
    <div style="background-color:rgb(39, 37, 38)" id="header">
      <div class="container">
        <!-- Left Side Content -->
        <div class="left-side">
            <div id="logo"> <a href="index.php"><img src="Admin/resimler/<?php echo $ayargetir['ayar_logo'] ?>" alt=""></a> </div>
          <div class="mmenu-trigger">
            <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
          </div>
          <!-- Main Navigation -->
          <nav id="navigation" class="style-1">
            <ul id="responsive">
              <li><a style="color:white" class="current" href="index.php">Anasayfa</a></li>
              <?php
              $kategori=$baglan->prepare("SELECT * from kategori ");
              $kategori->execute();

              while ($kategorigetir=$kategori->fetch(PDO::FETCH_ASSOC)) {
                ?>
              <li><a style="color:white" href="#"><?php echo $kategorigetir['kategori_baslik'] ?></a>
				<ul>
                  <?php
                  $katid=$kategorigetir['kategori_id'];
                  $altkategori=$baglan->prepare("SELECT * from altkategori where kategori_id=?");
                  $altkategori->execute(array($katid));

                  while ($altkategorigetir=$altkategori->fetch(PDO::FETCH_ASSOC)) { ?>
				  <li><a href="ilanlar-<?php echo yazilimyolcusu($altkategorigetir['alt_baslik']).'-'.$altkategorigetir['altkat_id'] ?>"><?php echo $altkategorigetir['alt_baslik'] ?></a></li>
                  <?php } ?>
				</ul>
			  </li>
              <?php } ?>

              <li><a style="color:white" href="danismanlar.php">Ekibimiz</a></li>
              <li><a style="color:white" href="hakkimizda.php">Hakkımızda</a></li>
              <li><a style="color:white" href="iletisim.php">İletişim</a></li>
              <li><a style="color:white" href="ilantur.php">İlan Ekle</a></li>
              <?php if (isset($_SESSION['user'])): ?>
                <li><a style="color:white" href="#">Hesabım
                  <ul>
                      <li><a href="profil.php"  target="blank">Profil</a></li>
                      <li><a href="ilanlarim.php" target="blank">İlanlarım</a></li>
                  </ul>
                </a></li>
              <?php endif; ?>
            </ul>
          </nav>
          <div class="clearfix"></div>
        </div>
        <!-- Left Side Content / End -->

        <!-- Right Side Content / Start -->
        <div class="right-side">
          <div class="header-widget">
            <?php if (!isset($_SESSION['user'])): ?>
              <a href="girisyap.php" target="blank" class="button border">
                <i class="icon-feather-log-in"></i> Giriş Yap
              </a>
            <?php else: ?>
              <a href="cikis.php" class="button border">
                <i class="icon-feather-log-out"></i> Çıkış Yap
              </a>
            <?php endif; ?>
          </div>
        </div>
        <!-- Right Side Content / End -->
      </div>
    </div>
    <!-- Header / End -->
  </header>
  <div class="clearfix"></div>
  <!-- Header Container / End -->
</div>
</body>
</html>

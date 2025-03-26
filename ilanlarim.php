<?php
// Oturum başlat
session_start();

// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emlak";

// PDO ile bağlantıyı oluştur
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

$uyead = $_SESSION['user'];

// Kullanıcı bilgilerini çek
$sql = "SELECT * FROM uyeler WHERE uyead = :uyead";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':uyead', $uyead);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $uyead = $user['uyead'];
    $uyetelefon = $user['uyetelefon'];
    $uyemail = $user['uyemail'];
    $profil_fotografi = "Admin/resimler/profil/".$user['profil_fotografi'];
} else {
    echo "Kullanıcı bulunamadı!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 2rem;
            color: #333;
        }
        .profile-info {
            display: flex;
            justify-content: space-between;
            padding: 20px 0;
            border-bottom: 1px solid #eee;
        }
        .profile-photo img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-details {
            flex-grow: 1;
            margin-left: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .profile-details p {
            font-size: 1.1rem;
            margin: 5px 0;
        }
        .ilan-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }
        .ilan-card {
            border: 1px solid #ccc;
            padding: 20px;
            width: calc(33% - 20px);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }
        .ilan-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .ilan-card h3 {
            font-size: 1.2rem;
            color: #333;
        }
        .ilan-card p {
            font-size: 1rem;
            color: #666;
        }
        .other-info {
            display: none;
            margin-top: 10px;
        }
        .show-more {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .show-more:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .ilan-card {
                width: calc(50% - 20px);
            }
        }
        @media (max-width: 480px) {
            .ilan-card {
                width: 100%;
            }
        }
    </style>
    <script>
        function toggleInfo(ilanId) {
            var info = document.getElementById("info_" + ilanId);
            if (info.style.display === "none") {
                info.style.display = "block";
            } else {
                info.style.display = "none";
            }
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Profilim</h1>

    <div class="profile-info">
        <div class="profile-photo">
            <?php if ($profil_fotografi) { ?>
                <img src="<?php echo htmlspecialchars($profil_fotografi); ?>" alt="Profil Fotoğrafı">
            <?php } ?>
        </div>
        <div class="profile-details">
            <p><strong>Ad:</strong> <?php echo htmlspecialchars($uyead); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($uyemail); ?></p>
            <p><strong>Telefon:</strong> <?php echo htmlspecialchars($uyetelefon); ?></p>
        </div>
    </div>

    <?php
    // İlanları çek
    $ilan_query = $pdo->prepare("SELECT * FROM ilanlarr WHERE uyead = :uyead");
    $ilan_query->bindParam(":uyead", $uyead);
    $ilan_query->execute();
    $ilan_result = $ilan_query->fetchAll(PDO::FETCH_ASSOC);

    // İlanları tablo şeklinde göster
    if ($ilan_result) {
        echo "<h2>İlanlar</h2>";
        echo "<div class='ilan-container'>";
        foreach ($ilan_result as $ilan) {
            echo "<div class='ilan-card'>";
            
            // Resim Üstte
            if ($ilan['ilan_resim']) {
                echo "<img src='" . htmlspecialchars('Admin/resimler/ilanlar/'. $ilan['ilan_resim']) . "' alt='İlan Resmi'>";
            } else {
                echo "<p><em>Resim bulunmuyor.</em></p>";
            }
            // Bilgiler Altta
            echo "<h3>" . htmlspecialchars($ilan['ilan_baslik']) . "</h3>";
            echo "<p>" . htmlspecialchars($ilan['ilan_aciklama']) . "</p>";
            echo "<p><strong>Fiyat:</strong> " . htmlspecialchars($ilan['ilan_fiyat']) . " TL</p>";
            echo "<p><strong>Adres:</strong> " . htmlspecialchars($ilan['ilan_adres']) . "</p>";

            // Diğer Bilgiler Butonu ve Gizli Bilgiler
            echo "<button class='show-more' onclick='toggleInfo(" . $ilan['id'] . ")'>Diğer Bilgiler</button>";
            echo "<div id='info_" . $ilan['id'] . "' class='other-info'>";
            echo "<p><strong>Metrekare:</strong> " . htmlspecialchars($ilan['ilan_metrekare']) . " m²</p>";
            echo "<p><strong>Oda Sayısı:</strong> " . htmlspecialchars($ilan['ilan_odasayisi']) . "</p>";
            echo "<p><strong>Binaya Yaş:</strong> " . htmlspecialchars($ilan['ilan_binayas']) . " yıl</p>";
            echo "<p><strong>Isıtma:</strong> " . htmlspecialchars($ilan['ilan_isitma']) . "</p>";
            echo "<p><strong>Aidat:</strong> " . htmlspecialchars($ilan['ilan_aidat']) . " TL</p>";
            echo "<p><strong>Takas:</strong> " . htmlspecialchars($ilan['ilan_takas']) . "</p>";
            echo "<p><strong>Anahtar Kelimeler:</strong> " . htmlspecialchars($ilan['ilan_anahtarkelime']) . "</p>";
            echo "</div>"; // End of other-info div
            echo "</div>"; // End of ilan-card div
        }
        echo "</div>";
    } else {
        echo "<p style='color: red;'>Bu üye adına ait ilan bulunamadı.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
// Bağlantıyı kapat
$pdo = null;
?>

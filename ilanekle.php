<?php
session_start();

// Giriş yapmamış kullanıcıyı yönlendirme
if (!isset($_SESSION['user'])) {
    header("Location: girisyap.php");
    exit();
}

// İlan türü seçilmemişse yönlendirme
if (!isset($_SESSION['ilantur'])) {
    header("Location: ilantur.php");
    exit();
}

// Kullanıcı bilgilerini oturumdan al
$uyead = $_SESSION['user'];
$uyeemail = ''; // Varsayılan olarak boş bırakıyoruz
$uyetelefon = ''; // Varsayılan olarak boş bırakıyoruz
$profil_fotografi = ''; // Varsayılan olarak boş bırakıyoruz

// Veritabanı bağlantısı
$host = 'localhost';
$db = 'emlak';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Bağlantı hatası: ' . $e->getMessage());
}

// Kullanıcı bilgilerini al
$sql = "SELECT * FROM uyeler WHERE uyead = :uyead";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':uyead', $uyead);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $uyead = $user['uyead'];
    $uyetelefon = $user['uyetelefon'];
    $uyeemail = $user['uyemail'];
    $profil_fotografi = $user['profil_fotografi'];  // Profil fotoğrafını al
} else {
    echo "Kullanıcı bulunamadı!";
    exit();
}

$message = ""; // Mesajı tutmak için değişken

// Eğer form gönderilmişse verileri işle
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baslik = $_POST['baslik'];
    $aciklama = $_POST['aciklama'];
    $sira = $_POST['sira'];
    $anahtarkelime = $_POST['anahtarkelime'];
    $metre = $_POST['metre'];
    $oda = $_POST['oda'];
    $binayas = $_POST['binayas'];
    $bkat = $_POST['bkat'];
    $isitma = $_POST['isitma'];
    $takas = $_POST['takas'];
    $aidat = $_POST['aidat'];
    $adres = $_POST['adres'];
    $fiyat = $_POST['fiyat'];
    $ilantur = $_POST['ilantur']; // Yeni alan
    $resim = "";

    // Resim yükleme işlemi
    if (!empty($_FILES['resim']['name'])) {
        $target_dir = "Admin/resimler/ilanlar/"; // Resimlerin kaydedileceği yeni klasör
        $file_name = basename($_FILES["resim"]["name"]); // Dosya adı
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // Dosya uzantısını al

        // Geçerli dosya türleri
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        
        // Dosya türünü kontrol et
        if (!in_array($file_type, $allowed_types)) {
            $message = "<div class='alert alert-danger'>Sadece JPG, JPEG, PNG ve GIF dosya türleri kabul edilir.</div>";
        } else {
            // Dosya adını benzersiz yapmak için uniqid kullan
            $unique_name = uniqid('img_') . '.' . $file_type;
            $target_file = $target_dir . $unique_name;

            // Klasörün varlığını kontrol et ve yoksa oluştur
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            // Dosyayı hedef klasöre taşı
            if (move_uploaded_file($_FILES["resim"]["tmp_name"], $target_file)) {
                $resim = $unique_name; // Veritabanına kaydedilecek yol
            } else {
                $message = "<div class='alert alert-danger'>Resim yüklenirken bir hata oluştu.</div>";
            }
        }
    }

    // Veritabanına ekle
    $sql = "INSERT INTO ilanlarr (
        ilan_baslik, ilan_aciklama, ilan_sira, ilan_anahtarkelime, ilan_metrekare, 
        ilan_odasayisi, ilan_binayas, ilan_bkat, ilan_isitma, ilan_takas, ilan_aidat, 
        ilan_adres, ilan_resim, ilan_fiyat, aktif, uyead, uyetelefon, uyeemail, profil_fotografi, ilan_tur
    ) VALUES (
        :baslik, :aciklama, :sira, :anahtarkelime, :metre, 
        :oda, :binayas, :bkat, :isitma, :takas, :aidat, 
        :adres, :resim, :fiyat, 0, :uyead, :uyetelefon, :uyeemail, :profil_fotografi, :ilantur
    )";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':baslik', $baslik);
    $stmt->bindParam(':aciklama', $aciklama);
    $stmt->bindParam(':sira', $sira, PDO::PARAM_INT);
    $stmt->bindParam(':anahtarkelime', $anahtarkelime);
    $stmt->bindParam(':metre', $metre, PDO::PARAM_INT);
    $stmt->bindParam(':oda', $oda, PDO::PARAM_INT);
    $stmt->bindParam(':binayas', $binayas, PDO::PARAM_INT);
    $stmt->bindParam(':bkat', $bkat, PDO::PARAM_INT);
    $stmt->bindParam(':isitma', $isitma);
    $stmt->bindParam(':takas', $takas);
    $stmt->bindParam(':aidat', $aidat, PDO::PARAM_INT);
    $stmt->bindParam(':adres', $adres);
    $stmt->bindParam(':resim', $resim);
    $stmt->bindParam(':fiyat', $fiyat, PDO::PARAM_INT);
    $stmt->bindParam(':ilantur', $ilantur); // Yeni alan

    // Kullanıcı bilgilerini de bağlayın
    $stmt->bindParam(':uyead', $uyead);
    $stmt->bindParam(':uyetelefon', $uyetelefon);
    $stmt->bindParam(':uyeemail', $uyeemail);
    $stmt->bindParam(':profil_fotografi', $profil_fotografi);

    try {
        if ($stmt->execute()) {
            $message = "<div class='alert alert-success'>İlan başarıyla eklendi!</div>";
        } else {
            $message = "<div class='alert alert-danger'>Hata: " . $pdo->errorInfo()[2] . "</div>";
        }
    } catch (PDOException $e) {
        $message = "<div class='alert alert-danger'>Hata: " . $e->getMessage() . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil ve İlan Ekle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Profil Fotoğrafı ve Bilgileri için Stil */
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 30px;
        }
        .profile-header div {
            flex-grow: 1;
        }
        .profile-header h3 {
            margin-top: 20px;
            font-size: 2.2rem;
            color: #333;
            font-weight: 600;
        }
        .profile-header p {
            color: #555;
            font-size: 1.1rem;
            margin: 5px 0;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding-top: 30px;
        }

        /* Form alanları için stil */
        .form-group {
            margin-bottom: 25px;
        }
        label {
            font-weight: bold;
        }
        .alert {
            margin-top: 20px;
        }

        /* Form alanlarının yan yana görünmesi için */
        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-row .form-group {
            flex: 1; /* Tüm alanlar eşit genişlikte olacak */
            min-width: 200px; /* Minimum genişlik */
        }

        /* Button ve özel alanlar için düzenleme */
        button[type="submit"] {
            margin-top: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-header">
        <img src="<?php echo $profil_fotografi ? 'Admin/resimler/profil/' . $profil_fotografi : '/uploads/default.png'; ?>" alt="Profil Fotoğrafı">
        <div>
            <h3><?php echo htmlspecialchars($uyead); ?></h3>
            <p><strong>Telefon:</strong> <?php echo htmlspecialchars($uyetelefon); ?></p>
            <p><strong>E-posta:</strong> <?php echo htmlspecialchars($uyeemail); ?></p>
        </div>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <h4>İlan Ekle</h4>
    <p>Seçilen İlan Türü: <?php echo isset($_SESSION['ilantur']) ? htmlspecialchars($_SESSION['ilantur']) : ''; ?></p> <!-- Seçilen ilan türünü göster -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group">
                <label for="baslik">İlan Başlığı</label>
                <input type="text" class="form-control" id="baslik" name="baslik" required>
            </div>
            
            <div class="form-group">
                <label for="sira">Sıra</label>
                <input type="number" class="form-control" id="sira" name="sira" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="anahtarkelime">Anahtar Kelime</label>
                <input type="text" class="form-control" id="anahtarkelime" name="anahtarkelime" required>
            </div>
            <div class="form-group">
                <label for="metre">Metrekare</label>
                <input type="number" class="form-control" id="metre" name="metre" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="oda">Oda Sayısı</label>
                <input type="number" class="form-control" id="oda" name="oda" required>
            </div>
            <div class="form-group">
                <label for="binayas">Bina Yaşı</label>
                <input type="number" class="form-control" id="binayas" name="binayas" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="bkat">Bulunduğu Kat</label>
                <input type="number" class="form-control" id="bkat" name="bkat" required>
            </div>
            <div class="form-group">
                <label for="isitma">Isıtma</label>
                <input type="text" class="form-control" id="isitma" name="isitma" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="takas">Takas</label>
                <input type="text" class="form-control" id="takas" name="takas">
            </div>
            <div class="form-group">
                <label for="aidat">Aylık Aidat</label>
                <input type="number" class="form-control" id="aidat" name="aidat" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" class="form-control" id="adres" name="adres" required>
            </div>
            <div class="form-group">
                <label for="fiyat">Fiyat</label>
                <input type="number" class="form-control" id="fiyat" name="fiyat" required>
            </div>
        </div>
        <div class="form-group">
            <label for="aciklama">Açıklama</label>
            <textarea class="form-control" id="aciklama" name="aciklama" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="resim">İlan Resmi</label>
            <input type="file" class="form-control-file" id="resim" name="resim">
        </div>

        <div class="form-group">
            <label for="ilantur">İlan Türü</label>
            <select class="form-control" id="ilantur" name="ilantur" required>
                <option value="Satılık">Satılık</option>
                <option value="Kiralık">Kiralık</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">İlanı Ekle</button>
    </form>
</div>

</body>
</html>

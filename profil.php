<?php 
session_start();
if (!isset($_SESSION['user'])) {     
    header("Location: girisyap.php");
    exit(); 
}

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

$uyead = $_SESSION['user'];

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guncel_ad = $_POST['uyead'];
    $guncel_telefon = $_POST['uyetelefon'];
    $guncel_email = $_POST['uyemail'];

    if (!empty($_FILES['profil_fotografi']['tmp_name'])) {
        $profil_fotografi = 'Admin/resimler/profil/' . basename($_FILES['profil_fotografi']['name']);
        $profil_dosyasi = basename($_FILES['profil_fotografi']['name']);
        move_uploaded_file($_FILES['profil_fotografi']['tmp_name'], $profil_fotografi);
    }

    $check_sql = "SELECT * FROM uyeler WHERE (uyead = :uyead OR uyemail = :uyemail) AND uyead != :original_uyead";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->bindParam(':uyead', $guncel_ad);
    $check_stmt->bindParam(':uyemail', $guncel_email);
    $check_stmt->bindParam(':original_uyead', $uyead);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        $error_message = "Bu kullanıcı adı veya e-posta zaten mevcut!";
    } else {
        $update_sql = "UPDATE uyeler SET uyead = :uyead, uyetelefon = :uyetelefon, uyemail = :uyemail, profil_fotografi = :profil_fotografi WHERE uyead = :original_uyead";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->bindParam(':uyead', $guncel_ad);
        $update_stmt->bindParam(':uyetelefon', $guncel_telefon);
        $update_stmt->bindParam(':uyemail', $guncel_email);
        $update_stmt->bindParam(':profil_fotografi', $profil_dosyasi);
        $update_stmt->bindParam(':original_uyead', $uyead);
        $update_stmt->execute();

        $_SESSION['user'] = $guncel_ad;

        header("Location: profil.php");
        exit();
    }
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
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 80%;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 50px;
    }
    h1 {
        text-align: center;
        color: #333;
        font-size: 32px;
    }
    .profile-info {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
        text-align: left;
    }
    .profile-photo {
        margin-right: 30px;
    }
    .profile-photo img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 2px solid #ddd;
    }
    .profile-details p {
        font-size: 20px;
        margin: 5px 0;
        color: #333;
    }
    .btn-logout {
        display: inline-block;
        padding: 12px 20px;
        background-color: #dc3545;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 30px;
        font-size: 18px;
    }
    form {
        margin-top: 40px;
    }
    label {
        display: block;
        margin: 15px 0 5px;
        font-size: 18px;
        color: #555;
    }
    .input-container {
        display: flex;
        justify-content: space-between;
        gap: 30px;
    }
    .input-container input {
        width: 100%;
        font-size: 20px;
        padding: 15px 20px;
        border-radius: 8px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        height: 60px;
        margin-bottom: 20px;
    }
    input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        width: 100%;
        font-size: 20px;
        padding: 15px;
        border-radius: 8px;
    }
    input[type="submit"]:hover {
        background-color: #218838;
    }
    .error-message {
        color: #dc3545;
        font-weight: bold;
        margin-top: 10px;
        text-align: center;
        font-size: 18px;
    }
    </style>
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

    <h2>Bilgilerinizi Güncelleyin</h2>

    <?php if (isset($error_message)) { ?>
        <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>

    <form action="profil.php" method="POST" enctype="multipart/form-data">
        <div class="input-container">
            <div>
                <label for="uyead">Yeni Kullanıcı Adı:</label>
                <input type="text" id="uyead" name="uyead" value="<?php echo htmlspecialchars($uyead); ?>" required>
            </div>

            <div>
                <label for="uyetelefon">Yeni Telefon:</label>
                <input type="text" id="uyetelefon" name="uyetelefon" value="<?php echo htmlspecialchars($uyetelefon); ?>" required>
            </div>
        </div>

        <div class="input-container">
            <div>
                <label for="uyemail">Yeni Email:</label>
                <input type="email" id="uyemail" name="uyemail" value="<?php echo htmlspecialchars($uyemail); ?>" required>
            </div>

            <div>
                <label for="profil_fotografi">Profil Fotoğrafı:</label>
                <input type="file" id="profil_fotografi" name="profil_fotografi">
            </div>
        </div>

        <input type="submit" value="Bilgileri Güncelle">
    </form>

    <a href="cikis.php" class="btn-logout">Çıkış Yap</a>
</div>

</body>
</html>

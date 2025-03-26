<?php
// Veritabanı bağlantısı
$host = 'localhost';  // Veritabanı sunucusu
$db = 'emlak';  // Veritabanı adı
$user = 'root';  // Varsayılan kullanıcı adı
$pass = '';  // Varsayılan şifre boş

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Bağlantı hatası: ' . $e->getMessage());  // Hata durumunda sadece hata mesajı verilecek
}

// Üye kayıt işlemi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uyead = $_POST['uyead'];
    $uyesifre = $_POST['uyesifre'];
    $uyetelefon = $_POST['uyetelefon'];
    $uyemail = $_POST['uyemail'];

    // Yeni üye ekleme
    $sql = "INSERT INTO uyeler (uyead, uyesifre, uyetelefon, uyemail) VALUES (:uyead, :uyesifre, :uyetelefon, :uyemail)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':uyead', $uyead);
    $stmt->bindParam(':uyesifre', $uyesifre);
    $stmt->bindParam(':uyetelefon', $uyetelefon);
    $stmt->bindParam(':uyemail', $uyemail);
    
    $stmt->execute();

    // Kayıt başarılı ise index.php'ye yönlendir
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Ol</title>
    <style>
        /* Stil kodları aynıdır */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('images/villa.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(8px);
            z-index: -1; 
        }
        .panel {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 400px;
            max-width: 100%;
            position: relative;
            z-index: 1;
        }
        .panel h2 {
            margin-top: 0;
            color: #333;
        }
        .panel label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .panel input[type="text"], .panel input[type="password"], .panel input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .panel input[type="submit"] {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .panel input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="panel">
    <h2>Üye Ol</h2>
    <form action="" method="POST">
        <label for="uyead">Üye Adı:</label>
        <input type="text" id="uyead" name="uyead" required>

        <label for="uyesifre">Üye Şifre:</label>
        <input type="password" id="uyesifre" name="uyesifre" required>

        <label for="uyetelefon">Üye Telefon:</label>
        <input type="text" id="uyetelefon" name="uyetelefon" required>

        <label for="uyemail">Üye E-mail:</label>
        <input type="email" id="uyemail" name="uyemail" required>

        <input type="submit" value="Üye Ol">
    </form>
    <p>Hesabınız var mı? <a href="girisyap.php">Giriş Yap</a></p>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butonlar</title>
    <style>
        .button {
            background-color: black; /* Butonun arka plan rengi */
            color: white; /* Buton metni rengi */
            padding: 10px 20px; /* Buton içindeki boşluk */
            text-align: center; /* Metni ortalama */
            text-decoration: none; /* Altı çiziliyi kaldırma */
            display: inline-block; /* Butonları yan yana yerleştirme */
            font-size: 16px; /* Buton metin boyutu */
            margin: 10px; /* Butonlar arasında boşluk */
            border-radius: 5px; /* Kenarları yuvarlaklaştırma */
        }

        .button:hover {
            background-color: #444; /* Hover (üzerine gelince) rengi */
        }

        .menu {
            display: none; /* Menü başlangıçta gizli */
            background-color: #f1f1f1;
            position: absolute;
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .menu a {
            display: block;
            padding: 8px;
            color: black;
            text-decoration: none;
        }

        .menu a:hover {
            background-color: #ddd;
        }

        .button-container {
            position: relative;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <a href="#" class="button" id="bilgilerimBtn">Bilgilerim</a>
        <div class="menu" id="menu">
            <a href="profil.php">Profilim</a>
            <a href="ayarlar.php">Ayarlar</a>
            <a href="cikis.php">Çıkış</a>
        </div>
    </div>
    <a href="ilanlar.php" class="button">İlanlarım</a>

    <script>
        // "Bilgilerim" butonuna tıklanıldığında menüyü göster veya gizle
        document.getElementById('bilgilerimBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Linkin normal davranışını engelle
            var menu = document.getElementById('menu');
            // Menü görünürse gizle, görünür değilse göster
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });

        // Sayfada başka bir yere tıklanırsa menüyü gizle
        window.addEventListener('click', function(event) {
            var menu = document.getElementById('menu');
            var buttonContainer = document.querySelector('.button-container');
            // Eğer menü dışında bir yere tıklanmışsa, menüyü gizle
            if (!buttonContainer.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
    </script>

</body>
</html>

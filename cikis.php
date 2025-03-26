<?php
// Oturum başlat
session_start();

// Oturumu sonlandır
session_unset();  // Tüm oturum verilerini temizler
session_destroy();  // Oturumu sonlandırır

// Yönlendirme
header("Location: girisyap.php");  // Kullanıcıyı giriş sayfasına yönlendir
exit();  // Yönlendirme sonrası işlem yapma
?>

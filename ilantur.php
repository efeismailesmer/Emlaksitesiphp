<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['ilantur'] = $_POST['ilantur'];
    if ($_POST['ilantur'] == 'Arsa') {
        header("Location: arsa.php");
    } else {
        header("Location: ilanekle.php");
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İlan Türü Seçimi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">İlan Türü Seçimi</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="ilantur">İlan Türü</label>
            <select class="form-control" id="ilantur" name="ilantur" required>
                <option value="Kiralık">Kiralık</option>
                <option value="Satılık">Satılık</option>
                <option value="Arsa">Arsa</option>
                <!-- Diğer ilan türlerini buraya ekleyebilirsiniz -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Devam Et</button>
    </form>
</div>
</body>
</html>

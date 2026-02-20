<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
$nim  = isset($_POST['nim'])  ? trim($_POST['nim'])  : '';
$prodi = isset($_POST['prodi']) ? trim($_POST['prodi']) : '';

$errors = [];
if ($nama === '') {
    $errors[] = 'Nama harus diisi.';
}
if ($nim === '') {
    $errors[] = 'NIM harus diisi.';
} elseif (!preg_match('/^\\d+$/', $nim)) {
    $errors[] = 'NIM harus berisi angka saja.';
}
if ($prodi === '') {
    $errors[] = 'Prodi harus diisi.';
}

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Hasil Proses</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;max-width:760px;margin:2rem auto;padding:1rem}</style>
</head>
<body>
    <h1>Hasil Pengiriman</h1>

    <?php if (!empty($errors)): ?>
        <div style="color:#a00">
            <p><strong>Terjadi kesalahan:</strong></p>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <p><a href="index.html">Kembali ke formulir</a></p>
    <?php else: ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr><th>Nama</th><td><?php echo e($nama); ?></td></tr>
            <tr><th>NIM</th><td><?php echo e($nim); ?></td></tr>
            <tr><th>Prodi</th><td><?php echo e($prodi); ?></td></tr>
        </table>
        <p><a href="index.html">Kembali</a></p>
    <?php endif; ?>

</body>
</html>

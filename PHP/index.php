<?php
require_once __DIR__ . '/Bioskop.php';
session_start();

// Buat folder uploads jika belum ada
$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Inisialisasi data awal di session jika masih kosong
if (!isset($_SESSION['daftar_film']) || empty($_SESSION['daftar_film'])) {
    $_SESSION['daftar_film'] = [
        new Bioskop("F01", "Interstellar", "Sci-Fi", 169, "interstellar.jpg"),
        new Bioskop("F02", "Oppenheimer", "Biography", 180, "oppenheimer.jpg")
    ];
}

// PROSES: Tambah Film
if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = (int)$_POST['durasi'];
    $foto = "default.jpg";

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoName = time() . '_' . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $fotoName);
        $foto = $fotoName;
    }

    $_SESSION['daftar_film'][] = new Bioskop($id, $judul, $genre, $durasi, $foto);
    header("Location: index.php");
    exit();
}

// PROSES: Hapus Film
if (isset($_GET['hapus'])) {
    $idHapus = $_GET['hapus'];
    foreach ($_SESSION['daftar_film'] as $key => $film) {
        if ($film->getId() == $idHapus) {
            unset($_SESSION['daftar_film'][$key]);
            $_SESSION['daftar_film'] = array_values($_SESSION['daftar_film']); // Reset indeks array
            break;
        }
    }
    header("Location: index.php");
    exit();
}

// PROSES: Ubah Film
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];
    $durasi = (int)$_POST['durasi'];

    foreach ($_SESSION['daftar_film'] as $film) {
        if ($film->getId() == $id) {
            $film->setJudul($judul);
            $film->setGenre($genre);
            $film->setDurasi($durasi);

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $fotoName = time() . '_' . $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $fotoName);
                $film->setFoto($fotoName);
            }
            break;
        }
    }
    header("Location: index.php");
    exit();
}

// Data yang diedit jika ada tombol Edit diklik
$filmEdit = null;
if (isset($_GET['edit'])) {
    $idEdit = $_GET['edit'];
    foreach ($_SESSION['daftar_film'] as $film) {
        if ($film->getId() == $idEdit) {
            $filmEdit = $film;
            break;
        }
    }
}

// Fitur Pencarian
$cari = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$listTampil = [];
foreach ($_SESSION['daftar_film'] as $film) {
    if ($cari === '' || stripos($film->getJudul(), $cari) !== false || stripos($film->getId(), $cari) !== false) {
        $listTampil[] = $film;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Bioskop - TP 1 DPBO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px 40px;
            background-color: #f4f6f9;
            color: #333;
        }
        h1, h2 {
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2c3e50;
            color: #fff;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .form-box {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        .form-group {
            margin-bottom: 12px;
        }
        .form-group label {
            display: block;
            margin-bottom: 4px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .btn-warning {
            background-color: #f39c12;
        }
        .btn-warning:hover {
            background-color: #d68910;
        }
        .poster-img {
            width: 70px;
            height: 90px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <h1>Sistem Data Bioskop</h1>
    <p>Program sederhana pengelolaan data film bioskop berbasis PHP & OOP.</p>

    <!-- FORM PENCARIAN -->
    <form method="GET" action="index.php" style="margin-bottom: 15px;">
        <input type="text" name="cari" placeholder="Cari ID atau Judul Film..." value="<?= htmlspecialchars($cari) ?>" style="padding: 8px; width: 250px;">
        <button type="submit" class="btn">Cari</button>
        <?php if ($cari !== ''): ?>
            <a href="index.php" class="btn" style="background-color: #7f8c8d;">Reset</a>
        <?php endif; ?>
    </form>

    <!-- TABEL DAFTAR FILM -->
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Poster</th>
                <th>ID Film</th>
                <th>Judul Film</th>
                <th>Genre</th>
                <th>Durasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listTampil)): ?>
                <tr>
                    <td colspan="7" style="text-align: center;">Tidak ada data film.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($listTampil as $i => $film): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td>
                            <?php 
                                $src = 'uploads/' . $film->getFoto();
                                if (!file_exists(__DIR__ . '/' . $src) || empty($film->getFoto())) {
                                    $src = 'uploads/interstellar.jpg'; // fallback
                                }
                            ?>
                            <img src="<?= htmlspecialchars($src) ?>" alt="Poster" class="poster-img">
                        </td>
                        <td><strong><?= htmlspecialchars($film->getId()) ?></strong></td>
                        <td><?= htmlspecialchars($film->getJudul()) ?></td>
                        <td><?= htmlspecialchars($film->getGenre()) ?></td>
                        <td><?= $film->getDurasi() ?> menit</td>
                        <td>
                            <a href="index.php?edit=<?= urlencode($film->getId()) ?>" class="btn btn-warning" style="padding: 4px 8px; font-size: 12px;">Ubah</a>
                            <a href="index.php?hapus=<?= urlencode($film->getId()) ?>" class="btn btn-danger" style="padding: 4px 8px; font-size: 12px;" onclick="return confirm('Yakin ingin menghapus film ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- FORM TAMBAH / UBAH -->
    <div class="form-box">
        <?php if ($filmEdit): ?>
            <h2>Form Ubah Film</h2>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="ubah" value="1">
                <input type="hidden" name="id" value="<?= htmlspecialchars($filmEdit->getId()) ?>">

                <div class="form-group">
                    <label>ID Film (Tidak bisa diubah):</label>
                    <input type="text" value="<?= htmlspecialchars($filmEdit->getId()) ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Judul Film:</label>
                    <input type="text" name="judul" value="<?= htmlspecialchars($filmEdit->getJudul()) ?>" required>
                </div>
                <div class="form-group">
                    <label>Genre:</label>
                    <input type="text" name="genre" value="<?= htmlspecialchars($filmEdit->getGenre()) ?>" required>
                </div>
                <div class="form-group">
                    <label>Durasi (menit):</label>
                    <input type="number" name="durasi" value="<?= $filmEdit->getDurasi() ?>" required>
                </div>
                <div class="form-group">
                    <label>Ganti Foto (Opsional):</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                <a href="index.php" class="btn" style="background-color: #7f8c8d;">Batal</a>
            </form>
        <?php else: ?>
            <h2>➕ Form Tambah Film</h2>
            <form method="POST" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="tambah" value="1">
                <div class="form-group">
                    <label>ID Film:</label>
                    <input type="text" name="id" placeholder="Contoh: F03" required>
                </div>
                <div class="form-group">
                    <label>Judul Film:</label>
                    <input type="text" name="judul" placeholder="Contoh: Dune" required>
                </div>
                <div class="form-group">
                    <label>Genre:</label>
                    <input type="text" name="genre" placeholder="Contoh: Sci-Fi" required>
                </div>
                <div class="form-group">
                    <label>Durasi (menit):</label>
                    <input type="number" name="durasi" placeholder="Contoh: 155" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto Poster (Lokal):</label>
                    <input type="file" name="foto" accept="image/*">
                </div>
                <button type="submit" class="btn">Tambah Film</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>

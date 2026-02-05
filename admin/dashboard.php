<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php'; 

// Cek apakah koneksi benar-benar tersambung ke database 'birthday'
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM wishes ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Cek apakah query error
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Wishes</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 20px; }
        h1 { color: #333; margin: 0; font-size: 24px; }
        .logout-btn { background: #ff5e5e; color: white; text-decoration: none; padding: 8px 16px; border-radius: 6px; font-weight: bold; font-size: 14px; }
        
        /* Tabel Responsif */
        .table-wrapper { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        th { background: #8093f1; color: white; text-align: left; padding: 12px; }
        td { padding: 12px; border-bottom: 1px solid #eee; vertical-align: top; }
        tr:hover { background: #f9f9ff; }
        
        .btn-delete { color: #ff5e5e; text-decoration: none; font-size: 13px; font-weight: bold; border: 1px solid #ff5e5e; padding: 4px 8px; border-radius: 4px; }
        .btn-delete:hover { background: #ff5e5e; color: white; }
        .time { color: #888; font-size: 12px; }
        .wish-text { color: #555; line-height: 1.5; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Daftar Harapan</h1>
        <a href="logout.php" class="logout-btn">Keluar</a>
    </div>

    <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    <th>Nama User</th>
                    <th>Harapan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="time"><?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></td>
                        <td><strong><?php echo htmlspecialchars($row['nama']); ?></strong></td>
                        <td class="wish-text"><?php echo nl2br(htmlspecialchars($row['harapan'])); ?></td>
                        <td>
                            <a href="?hapus=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Hapus pesan ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center; padding: 20px; color: #888;">Belum ada harapan yang masuk di database.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
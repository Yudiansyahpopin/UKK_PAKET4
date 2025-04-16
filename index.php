<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Aplikasi Penghitung Diskon</h3>
            </div>
            <div class="card-body">

                <!-- Formulir input harga dan diskon -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="harga">Harga Barang (Rp)</label>
                        <input type="text" name="harga" id="harga" class="form-input" required placeholder="Masukan Harga">
                    </div>
                    <div class="form-group">
                        <label for="diskon">Persentase Diskon (%)</label>
                        <input type="text" name="diskon" id="diskon" class="form-input" required placeholder="Masukan Diskon">
                    </div>
                    <div class="button-group">
                    <button type="submit" name="hitung" class="btn" style="margin-right: 75px;">Hitung</button>
                    <button type="reset" name="reset" class="btn">Reset</button>
                    </div>

                </form>

                <!-- Proses logika perhitungan diskon dengan PHP -->
                <?php
                // Cek apakah tombol 'hitung' ditekan
                if (isset($_POST['hitung'])) {
                    // Ambil input harga dan diskon dari form
                    $priceInput = $_POST['harga'];
                    $diskonInput = $_POST['diskon'];

                    // Membersihkan input harga:
                    // - Menghapus tanda koma dan titik (untuk menghindari error parsing)
                    // - Mengubah koma menjadi titik agar bisa dikonversi ke float
                    $priceInput = str_replace('.', '', $priceInput);
                    $priceInput = str_replace(',', '.', $priceInput);
                    
                    

                    // Mengubah koma menjadi titik di input diskon
                    $diskonInput = str_replace(',', '.', $diskonInput);

                    // Konversi input ke dalam angka desimal
                    $price = floatval($priceInput);
                    $diskon = floatval($diskonInput); 

                    // Tampilkan hasil ke pengguna
                    echo '<div class="alert">';

                    // Validasi harga harus lebih dari 0
                    if ($priceInput <= 0) {
                        echo "⚠️ Yang di isi harus angka lebih dari 0.";
                    }
                    // Validasi diskon antara 0 sampai 100 persen
                    elseif ($diskon < 0 || $diskon > 100) {
                        echo "⚠️ Diskon harus antara 0 - 100%.";
                    } else {
                        // Hitung nilai diskon
                        $nilaiDiskon = $price * ($diskon / 100);

                        // Hitung total harga setelah diskon
                        $totalHarga = $price - $nilaiDiskon;

                        // Format dan tampilkan hasilnya
                        echo "<strong>🎯 Harga Awal:</strong> Rp " . number_format($price, 2, ',', '.') . "<br>";
                        echo "<strong>💰 Nilai Diskon:</strong> Rp " . number_format($nilaiDiskon, 2, ',', '.') . "<br>";
                        echo "<strong>✅ Harga akhir:</strong> Rp " . number_format($totalHarga, 2, ',', '.');
                    }

                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
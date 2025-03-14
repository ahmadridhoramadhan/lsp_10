<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <link rel="stylesheet" href="../assets/index.css">
    <!-- Menyertakan link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="display: flex; flex-direction: column; height: 100vh;" class="container">
    <?php require '../components/header.php' ?>

    <!-- Section Tentang Kami -->
    <div style="flex: 1 1 auto;">
        <div class="row">
            <div class="col-md-6">
                <h2>Tentang Kami</h2>
                <p>
                    Rental XYZ adalah tempat rental yang nyaman dengan layanan terbaik di kota. Kami menyediakan berbagai fasilitas untuk memastikan kenyamanan dan kepuasan Anda selama melakukan rental. Terletak di lokasi strategis.
                </p>
                <p>
                    Dengan staf yang ramah dan profesional, kami berkomitmen untuk memberikan pengalaman rental yang tak terlupakan bagi setiap yang mau melakukan rental. Kami juga menyediakan berbagai pilihan mobil dengan harga yang bersaing dan fasilitas lengkap.
                </p>
            </div>
            <div class="col-md-6">
                <h3>Kontak Kami</h3>
                <ul class="list-unstyled">
                    <li><strong>Telepon:</strong> +62 123 456 789</li>
                    <li><strong>Email:</strong> info@hotelxyz.com</li>
                    <li><strong>Alamat:</strong> Jl. Raya No. 123, Kota Jakarta, Indonesia</li>
                </ul>
            </div>
        </div>
    </div>

    <?php require '../components/footer.php' ?>

    <!-- Menyertakan JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
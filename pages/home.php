<?php
require '../data.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="display: flex; flex-direction: column; height: 100vh;" class="container">
    <?php require '../components/header.php' ?>
    <div class='container-fluid d-flex justify-content-center' style="flex: 1 1 auto;">
        <?php
        foreach ($dataDummy as $i => $data) {
        ?>
            <a class="card mx-auto col-md-3 col-10 mt-5 pt-4" href="transaction.php?id=<?= $i ?>" style="text-decoration: none;">
                <div class="d-flex sale ">
                    <div class="btn">Rental</div>
                </div>
                <img class='mx-auto img-thumbnail'
                    src="../assets/<?= $data['gambar'] ?>"
                    width="auto" height="auto" />
                <div class="card-body text-center mx-auto">
                    <h5 class="card-title"><?= $data['nama'] ?></h5>
                    <p class="card-text">Rp <?= number_format($data['harga'], 2, ',', '.') ?></p>
                </div>
            </a>
        <?php
        }
        ?>
    </div>
    <?php require '../components/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
$uspesno = false;
$napaka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST["ime"]);
    $email = trim($_POST["email"]);
    $sporocilo = trim($_POST["sporocilo"]);

    if ($ime == "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $sporocilo == "") {
        $napaka = "Prosimo, pravilno izpolnite vsa polja.";
    } else {
        // Simulacija pošiljanja (ni dejanskega maila)
        $uspesno = true;
    }
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <!-- Navigacija -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="../index.html">Trgovina</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Domov</a></li>
                    <li class="nav-item"><a class="nav-link" href="o-nas.html">O nas</a></li>
                    <li class="nav-item"><a class="nav-link" href="storitev.html">Storitev</a></li>
                    <li class="nav-item"><a class="nav-link" href="trgovina.html">Trgovina</a></li>
                    <li class="nav-item"><a class="nav-link active" href="kontakt.php">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h1 class="mb-4 text-center">Kontaktirajte nas</h1>

        <!-- Kontaktni podatki -->
        <div class="mb-4">
            <p><strong>Naslov:</strong> Ulica 1, 1000 Ljubljana</p>
            <p><strong>Telefon:</strong> 01 234 56 78</p>
            <p><strong>Email:</strong> info@spletnatrgovina.si</p>
        </div>

        <!-- Obrazec -->
        <form method="POST" action="kontakt.php" novalidate>
            <div class="mb-3">
                <label for="ime" class="form-label">Vaše ime</label>
                <input type="text" class="form-control" id="ime" name="ime" value="<?= htmlspecialchars($_POST['ime'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Vaš email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label for="sporocilo" class="form-label">Sporočilo</label>
                <textarea class="form-control" id="sporocilo" name="sporocilo" rows="5" required><?= htmlspecialchars($_POST['sporocilo'] ?? '') ?></textarea>
            </div>

            <?php if ($napaka): ?>
                <div class="alert alert-danger"><?= $napaka ?></div>
            <?php endif; ?>

            <?php if ($uspesno): ?>
                <div class="alert alert-success">Hvala za sporočilo! Odgovorili vam bomo v najkrajšem možnem času.</div>
            <?php endif; ?>

            <button type="submit" class="btn btn-primary">Pošlji</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0">© 2025 Spletna trgovina. Vse pravice pridržane.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

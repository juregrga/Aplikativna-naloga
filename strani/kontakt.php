<?php
$uspesno = false;
$napaka = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST["ime"]);
    $email = trim($_POST["email"]);
    $sporocilo = trim($_POST["sporocilo"]);

    if ($ime === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $sporocilo === "") {
        $napaka = "Prosimo, pravilno izpolnite vsa polja.";
    } else {
        $uspesno = true;
    }
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt - Športna Trgovina</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <!-- Top bar -->
  <div class="free-shipping-bar text-white text-center py-1" style="background-color: #6fb67d;">
    <span class="fw-bold">Brezplačna poštnina na naročila nad 60€</span>
  </div>

  <!-- Navigacija -->
  <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top py-1">
    <div class="container d-flex align-items-center">
      <button class="navbar-toggler order-1 d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand order-2 mx-auto mx-md-0 order-md-0" href="../index.html">
        <img src="../images/logo_hiker.png" alt="Logo" style="width:200px; height:auto;">
      </a>

      <a href="#" class="nav-link text-white order-3 d-md-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart"><path d="M0 1.5A.5.5 0 0 1 ..."/></svg>
      </a>

      <div class="collapse navbar-collapse order-md-1" id="mainNav">
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item"><a class="nav-link text-white fs-6 px-3" href="../index.html">Domov</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link text-white fs-6 px-3 dropdown-toggle" href="#" data-bs-toggle="dropdown">Izdelki</a>
            <ul class="dropdown-menu bg-dark">
              <li><a class="dropdown-item text-white" href="oblačila.html">Oblačila</a></li>
              <li><a class="dropdown-item text-white" href="čevlji.html">Čevlji</a></li>
              <li><a class="dropdown-item text-white" href="oprema.html">Oprema</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link text-white fs-6 px-3" href="o-nas.html">O nas</a></li>
          <li class="nav-item"><a class="nav-link text-white fs-6 px-3 active" href="kontakt.php">Kontakt</a></li>
        </ul>
        <form class="d-md-none my-2" role="search"><input class="form-control form-control-sm" type="search" placeholder="Išči…"></form>
      </div>

      <form class="d-none d-md-flex order-md-2" role="search"><input class="form-control form-control-sm" type="search" placeholder="Išči…"></form>
      <a class="nav-link text-white d-none d-md-block order-md-3 ms-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart"><path d="M0 1.5A.5.5 0 0 1 ..."/></svg></a>
    </div>
  </nav>

  <!-- Kontaktna vsebina -->
  <section class="container py-5">
    <h1 class="text-center mb-4">Kontaktirajte nas</h1>

    <div class="mb-4">
      <p><strong>Naslov:</strong> Trgovska ulica 10, 1000 Ljubljana</p>
      <p><strong>Telefon:</strong> +386 40 123 456</p>
      <p><strong>Email:</strong> info@sportna-trgovina.si</p>
    </div>

    <form method="POST" action="kontakt.php" class="mb-5">
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

      <button type="submit" class="btn btn-dark">Pošlji</button>
    </form>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white py-4">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Informacije</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Dostava</a></li>
            <li><a href="#" class="text-white text-decoration-none">Vračila</a></li>
            <li><a href="#" class="text-white text-decoration-none">Pomoč uporabnikom</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Kontakt</h6>
          <ul class="list-unstyled">
            <li>+386 40 123 456</li>
            <li>info@sportna-trgovina.si</li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h6 class="fw-bold">Sledi nam</h6>
          <ul class="list-unstyled">
            <li><a href="#" class="text-white text-decoration-none">Facebook</a></li>
            <li><a href="#" class="text-white text-decoration-none">Instagram</a></li>
            <li><a href="#" class="text-white text-decoration-none">YouTube</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center mt-3 small">&copy; 2025 Športna Trgovina. Vse pravice pridržane.</div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

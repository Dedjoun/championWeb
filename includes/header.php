<?php
require_once __DIR__ . '/config.php';
$page_actuelle = $page_actuelle ?? 'accueil';
$titre_page    = $titre_page ?? $site['nom'];
$description   = $description ?? 'Champion Security SARL, société de gardiennage et de sécurité à Yaoundé (Cameroun) : gardiennage de sites, surveillance, intervention rapide, sécurité événementielle et conseil.';

$menu = [
    'accueil'  => ['index.php',    'Accueil'],
    'apropos'  => ['a-propos.php', 'À propos'],
    'services' => ['services.php', 'Services'],
    'galerie'  => ['galerie.php',  'Sensibilisation'],
    'contact'  => ['contact.php',  'Contact'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($titre_page) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <meta name="theme-color" content="#FFD100">
    <meta property="og:title" content="<?= e($titre_page) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:image" content="assets/img/ensemble-espaces-surs.jpg">
    <link rel="icon" href="assets/img/logo.jpg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&family=Caveat:wght@600;700&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icons/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- Bandeau supérieur -->
<div class="topbar d-none d-lg-block">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex gap-4">
            <span><i class="bi bi-geo-alt-fill"></i> <?= e($site['ville']) ?></span>
            <a href="mailto:<?= e($site['email']) ?>"><i class="bi bi-envelope-fill"></i> <?= e($site['email']) ?></a>
        </div>
        <div class="d-flex gap-4 align-items-center">
            <span><i class="bi bi-clock-fill"></i> Disponibles 24h/24 – 7j/7</span>
            <a href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top" id="navPrincipale">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
            <img src="assets/img/logo.jpg" alt="Logo Champion Security SARL" class="logo-nav">
            <span class="brand-texte">
                <strong>CHAMPION</strong>
                <small>SECURITY SARL</small>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Ouvrir le menu">
            <i class="bi bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                <?php foreach ($menu as $cle => [$lien, $libelle]): ?>
                    <li class="nav-item">
                        <a class="nav-link<?= $cle === $page_actuelle ? ' active' : '' ?>" href="<?= $lien ?>"<?= $cle === $page_actuelle ? ' aria-current="page"' : '' ?>><?= e($libelle) ?></a>
                    </li>
                <?php endforeach; ?>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn btn-jaune" href="contact.php#formulaire"><i class="bi bi-file-earmark-text"></i> Demander un devis</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>

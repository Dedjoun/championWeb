<?php
$page_actuelle = 'apropos';
$titre_page    = 'À propos | Champion Security SARL';
require __DIR__ . '/includes/header.php';
?>

<section class="banniere">
    <div class="container">
        <nav aria-label="fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">À propos</li></ol></nav>
        <h1>À propos de nous</h1>
        <p class="script">Sécurité • Confiance • Sérénité</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-reveal>
                <span class="sur-titre">Notre histoire</span>
                <h2 class="titre-section">Champion Security SARL</h2>
                <p class="lead">Une société camerounaise de gardiennage et de sécurité privée, fondée sur les valeurs du sport de combat : maîtrise, discipline et respect.</p>
                <p>Notre logo, un combattant en plein élan entouré des couleurs du Cameroun, résume notre identité : la <strong>force maîtrisée</strong> au service de la protection des personnes et des biens.</p>
                <p>Basés à Yaoundé, nous accompagnons les entreprises, les particuliers, les commerces, les établissements scolaires et les organisateurs d'événements. Nos agents sont sélectionnés, formés et encadrés pour intervenir avec calme et fermeté.</p>
                <p class="script fs-3 texte-rouge mb-0">« Sécuriser aujourd'hui pour un meilleur demain ! »</p>
            </div>
            <div class="col-lg-6" data-reveal>
                <div class="duo-images">
                    <img src="assets/img/samedi-vigilants.jpg" alt="Équipe Champion Security sur le terrain" class="img-fluid">
                    <img src="assets/img/logo.jpg" alt="Logo Champion Security SARL" class="img-fluid logo-rond">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-grise">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3" data-reveal>
                <div class="carte-mvv"><i class="bi bi-bullseye"></i><h3>Mission</h3><p>Garantir la sécurité des personnes, des biens et des espaces qui nous sont confiés, avec rigueur et discrétion.</p></div>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <div class="carte-mvv"><i class="bi bi-eye"></i><h3>Vision</h3><p>Contribuer à un Cameroun plus sûr, où chacun vit et travaille en toute sérénité.</p></div>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <div class="carte-mvv"><i class="bi bi-award"></i><h3>Valeurs</h3><p>Professionnalisme, réactivité, discipline, intégrité et respect de la confidentialité.</p></div>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <div class="carte-mvv"><i class="bi bi-megaphone"></i><h3>Engagement</h3><p>Sensibiliser le public : la sécurité est une responsabilité collective.</p></div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center mb-5" data-reveal>
            <span class="sur-titre">Notre méthode</span>
            <h2 class="titre-section">Prévenir • Protéger • Sécuriser • Accompagner</h2>
        </div>
        <div class="row g-4 etapes">
            <?php
            $etapes = [
                ['bi-chat-dots', 'Écoute', 'Nous échangeons avec vous pour comprendre votre activité et vos inquiétudes.'],
                ['bi-search', 'Diagnostic', 'Visite de votre site, repérage des accès, des points faibles et des horaires sensibles.'],
                ['bi-person-check', 'Déploiement', 'Mise en place d\'agents formés avec des consignes écrites propres à votre site.'],
                ['bi-graph-up-arrow', 'Suivi', 'Contrôles réguliers, rapports et ajustements pour une sécurité toujours efficace.'],
            ];
            foreach ($etapes as $i => [$icone, $titre, $texte]): ?>
                <div class="col-md-6 col-lg-3" data-reveal>
                    <div class="etape">
                        <span class="etape-num">0<?= $i + 1 ?></span>
                        <i class="bi <?= $icone ?>"></i>
                        <h3><?= e($titre) ?></h3>
                        <p><?= e($texte) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

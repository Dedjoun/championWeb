<?php
$page_actuelle = 'galerie';
$titre_page    = 'Sensibilisation | Champion Security SARL';
require __DIR__ . '/includes/header.php';

$filtres = [
    'tous'       => 'Toutes',
    'vigilance'  => 'Vigilance',
    'terrain'    => 'Sur le terrain',
    'ecoles'     => 'Écoles',
    'entreprise' => 'Entreprise',
];
?>

<section class="banniere">
    <div class="container">
        <nav aria-label="fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">Sensibilisation</li></ol></nav>
        <h1>Campagnes de sensibilisation</h1>
        <p class="script">La sécurité commence par la vigilance de chacun !</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="filtres text-center mb-5" role="group" aria-label="Filtrer les affiches" data-reveal>
            <?php foreach ($filtres as $cle => $libelle): ?>
                <button type="button" class="btn-filtre<?= $cle === 'tous' ? ' actif' : '' ?>" data-filtre="<?= $cle ?>"><?= e($libelle) ?></button>
            <?php endforeach; ?>
        </div>

        <div class="row g-4" id="grilleGalerie">
            <?php foreach ($galerie as $i => $g): ?>
                <div class="col-sm-6 col-lg-4 item-galerie" data-cat="<?= e($g['cat']) ?>" data-reveal>
                    <button type="button" class="carte-affiche w-100" data-bs-toggle="modal" data-bs-target="#lightbox" data-index="<?= $i ?>">
                        <img src="assets/img/<?= e($g['img']) ?>" alt="<?= e($g['titre']) ?>" loading="lazy">
                        <span class="affiche-titre"><?= e($g['titre']) ?> <i class="bi bi-arrows-fullscreen"></i></span>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Conseils clés tirés des affiches -->
<section class="section section-grise">
    <div class="container">
        <div class="text-center mb-5" data-reveal>
            <span class="sur-titre">À retenir</span>
            <h2 class="titre-section">5 réflexes pour renforcer votre sécurité</h2>
        </div>
        <div class="row g-3 justify-content-center">
            <?php
            $reflexes = [
                ['bi-person-vcard', 'rouge', 'Vérifiez l\'identité des visiteurs.'],
                ['bi-lock-fill', 'jaune', 'Gardez les accès sécurisés fermés.'],
                ['bi-gem', 'vert', 'Gardez vos objets de valeur hors de vue.'],
                ['bi-eye-fill', 'rouge', 'Restez attentif aux situations inhabituelles.'],
                ['bi-megaphone-fill', 'jaune', 'Signalez rapidement toute situation suspecte.'],
            ];
            foreach ($reflexes as $n => [$icone, $couleur, $texte]): ?>
                <div class="col-sm-6 col-lg" data-reveal>
                    <div class="reflexe">
                        <span class="num <?= $couleur ?>"><?= $n + 1 ?></span>
                        <i class="bi <?= $icone ?>"></i>
                        <p><?= e($texte) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="modal fade" id="lightbox" tabindex="-1" aria-label="Affiche agrandie" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <button type="button" class="btn-close btn-close-white ms-auto mb-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
            <img src="" alt="" id="lightboxImg" class="img-fluid rounded-3 lightbox-img">
            <div class="d-flex justify-content-between align-items-center mt-3 text-white">
                <button type="button" class="btn btn-jaune btn-sm" id="lightboxPrec" aria-label="Affiche précédente"><i class="bi bi-chevron-left"></i></button>
                <span id="lightboxTitre" class="fw-semibold text-center px-2"></span>
                <button type="button" class="btn btn-jaune btn-sm" id="lightboxSuiv" aria-label="Affiche suivante"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    window.GALERIE = <?= json_encode(array_map(fn($g) => ['src' => 'assets/img/' . $g['img'], 'titre' => $g['titre']], $galerie), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>

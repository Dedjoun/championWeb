<?php
$page_actuelle = 'services';
$titre_page    = 'Nos services | Champion Security SARL';
require __DIR__ . '/includes/header.php';
?>

<section class="banniere">
    <div class="container">
        <nav aria-label="fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">Services</li></ol></nav>
        <h1>Nos services</h1>
        <p class="script">Des professionnels à votre service !</p>
    </div>
</section>

<section class="section pb-0">
    <div class="container">
        <div class="onglets-services" data-reveal>
            <?php foreach ($services as $cle => $s): ?>
                <a href="#<?= $cle ?>"><i class="bi <?= e($s['icone']) ?>"></i> <?= e($s['titre']) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php $i = 0; foreach ($services as $cle => $s): $i++; ?>
            <article class="service-detail row g-4 g-lg-5 align-items-center <?= $i % 2 === 0 ? 'flex-lg-row-reverse' : '' ?>" id="<?= $cle ?>" data-reveal>
                <div class="col-lg-5">
                    <div class="service-visuel">
                        <span class="service-num">0<?= $i ?></span>
                        <i class="bi <?= e($s['icone']) ?>"></i>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h2 class="titre-section h3"><?= e($s['titre']) ?></h2>
                    <p class="lead"><?= e($s['court']) ?></p>
                    <p><?= e($s['long']) ?></p>
                    <ul class="liste-coches">
                        <?php foreach ($s['points'] as $p): ?>
                            <li><i class="bi bi-check-circle-fill"></i> <?= e($p) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="contact.php?service=<?= urlencode($cle) ?>#formulaire" class="btn btn-jaune mt-2">Demander un devis <i class="bi bi-arrow-right"></i></a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-noire">
    <div class="container">
        <div class="text-center mb-5" data-reveal>
            <span class="sur-titre texte-jaune">Questions fréquentes</span>
            <h2 class="titre-section text-white">Vous vous posez des questions ?</h2>
        </div>
        <div class="accordion accordion-sombre mx-auto" id="faq" style="max-width:820px" data-reveal>
            <?php
            $faq = [
                ['Intervenez-vous en dehors de Yaoundé ?', 'Notre siège est à Yaoundé. Pour un site situé dans une autre ville, contactez-nous : nous étudions chaque demande.'],
                ['Combien coûte un agent de sécurité ?', 'Le tarif dépend du nombre d\'agents, des horaires (jour, nuit, 24h/24), de la durée du contrat et du niveau de risque. Nous établissons un devis gratuit après échange ou visite.'],
                ['Puis-je faire appel à vous pour un seul événement ?', 'Oui. Nous sécurisons des événements ponctuels : mariages, concerts, séminaires, cérémonies, lancements de produits.'],
                ['Comment reconnaître vos agents ?', 'Nos agents portent l\'uniforme Champion Security (jaune et noir) avec l\'écusson de la société et un badge d\'identification.'],
            ];
            foreach ($faq as $n => [$q, $r]): ?>
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button <?= $n ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $n ?>" aria-expanded="<?= $n ? 'false' : 'true' ?>"><?= e($q) ?></button>
                    </h3>
                    <div id="faq<?= $n ?>" class="accordion-collapse collapse <?= $n ? '' : 'show' ?>" data-bs-parent="#faq">
                        <div class="accordion-body"><?= e($r) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

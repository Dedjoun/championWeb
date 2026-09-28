<?php
$page_actuelle = 'accueil';
$titre_page    = 'Champion Security SARL | Gardiennage et sécurité à Yaoundé';
require __DIR__ . '/includes/header.php';
?>

<!-- ===== HERO ===== -->
<section class="hero">
    <div class="hero-motif" aria-hidden="true"></div>
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-reveal>
                <span class="badge-etiquette"><i class="bi bi-shield-fill-check"></i> Société de gardiennage – Yaoundé</span>
                <h1 class="hero-titre">
                    Des espaces <span class="surligne-jaune">sûrs</span>,<br>
                    des vies <span class="surligne-rouge">sereines</span>.
                </h1>
                <p class="hero-texte">
                    Champion Security SARL protège vos biens, vos sites et vos proches avec des agents formés,
                    disciplinés et disponibles <strong>24h/24</strong>. Prévention, surveillance, protection :
                    votre sécurité est notre priorité.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="contact.php#formulaire" class="btn btn-jaune btn-lg"><i class="bi bi-file-earmark-text"></i> Devis gratuit</a>
                    <a href="services.php" class="btn btn-contour-clair btn-lg">Nos services <i class="bi bi-arrow-right"></i></a>
                </div>
                <ul class="hero-valeurs">
                    <li><i class="bi bi-check-circle-fill"></i> Professionnalisme</li>
                    <li><i class="bi bi-check-circle-fill"></i> Réactivité</li>
                    <li><i class="bi bi-check-circle-fill"></i> Discipline</li>
                </ul>
            </div>
            <div class="col-lg-6" data-reveal>
                <div class="hero-visuel">
                    <img src="assets/img/ensemble-espaces-surs.jpg" alt="Agents de Champion Security SARL devant un site sécurisé" class="hero-img">
                    <div class="hero-carte hero-carte-1">
                        <i class="bi bi-telephone-fill"></i>
                        <div><small>Urgence / Devis</small><strong><?= e($site['tel1']) ?></strong></div>
                    </div>
                    <div class="hero-carte hero-carte-2">
                        <i class="bi bi-clock-history"></i>
                        <div><small>Disponibilité</small><strong>24h/24 – 7j/7</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CHIFFRES ===== -->
<section class="chiffres">
    <div class="container">
        <div class="row g-0 text-center">
            <div class="col-6 col-md-3 chiffre"><strong><span data-compteur="24">0</span>h</strong><span>de présence par jour</span></div>
            <div class="col-6 col-md-3 chiffre"><strong><span data-compteur="7">0</span>j/7</strong><span>toute l'année</span></div>
            <div class="col-6 col-md-3 chiffre"><strong><span data-compteur="6">0</span></strong><span>domaines d'expertise</span></div>
            <div class="col-6 col-md-3 chiffre"><strong><span data-compteur="100">0</span>%</strong><span>engagement sur le terrain</span></div>
        </div>
    </div>
</section>

<!-- ===== À PROPOS ===== -->
<section class="section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-reveal>
                <div class="cadre-image">
                    <img src="assets/img/restez-vigilants.jpg" alt="Agent Champion Security en uniforme avec talkie-walkie" class="img-fluid">
                    <div class="cadre-badge">
                        <span class="script">Sur le terrain,</span>
                        <strong>à vos côtés !</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-reveal>
                <span class="sur-titre">Qui sommes-nous ?</span>
                <h2 class="titre-section">Votre partenaire sécurité au Cameroun</h2>
                <p class="lead">Champion Security SARL est une entreprise de gardiennage et de sécurité privée implantée à Yaoundé.</p>
                <p>Notre mission est simple : <strong>prévenir, protéger, sécuriser et accompagner</strong>. Nos agents, reconnaissables à leur uniforme jaune et noir, veillent sur les entreprises, les résidences, les commerces, les écoles et les événements. Ils appliquent des procédures rigoureuses : vérification des identités, contrôle des accès, signalement rapide de toute situation suspecte.</p>
                <div class="row g-3 my-3">
                    <div class="col-sm-4"><div class="mini-valeur"><i class="bi bi-shield-shaded"></i><span>Prévention</span></div></div>
                    <div class="col-sm-4"><div class="mini-valeur"><i class="bi bi-people-fill"></i><span>Protection</span></div></div>
                    <div class="col-sm-4"><div class="mini-valeur"><i class="bi bi-hand-thumbs-up-fill"></i><span>Sérénité</span></div></div>
                </div>
                <a href="a-propos.php" class="btn btn-noir">En savoir plus <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ===== SERVICES ===== -->
<section class="section section-grise">
    <div class="container">
        <div class="text-center mb-5" data-reveal>
            <span class="sur-titre">Nos services</span>
            <h2 class="titre-section">Des professionnels à votre service</h2>
            <p class="text-muted mx-auto" style="max-width:640px">Une offre complète pour répondre à chaque besoin de sécurité, du simple poste de garde à l'encadrement d'un grand événement.</p>
        </div>
        <div class="row g-4">
            <?php foreach ($services as $cle => $s): ?>
                <div class="col-md-6 col-lg-4" data-reveal>
                    <a href="services.php#<?= $cle ?>" class="carte-service">
                        <div class="icone-service"><i class="bi <?= e($s['icone']) ?>"></i></div>
                        <h3><?= e($s['titre']) ?></h3>
                        <p><?= e($s['court']) ?></p>
                        <span class="lien-plus">Découvrir <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== SECTEURS ===== -->
<section class="section section-noire">
    <div class="container">
        <div class="row align-items-end mb-5 g-3" data-reveal>
            <div class="col-lg-7">
                <span class="sur-titre texte-jaune">Qui protégeons-nous ?</span>
                <h2 class="titre-section text-white">Des solutions pour tous</h2>
            </div>
            <div class="col-lg-5">
                <p class="mb-0 text-white-50">Chaque site est unique. Nous adaptons nos consignes, nos effectifs et nos horaires à votre activité.</p>
            </div>
        </div>
        <div class="row g-3">
            <?php
            $secteurs = [
                ['bi-building', 'Entreprises', 'Bureaux, sièges, agences'],
                ['bi-house-door', 'Particuliers', 'Villas et résidences'],
                ['bi-cart3', 'Commerces', 'Boutiques, magasins, marchés'],
                ['bi-buildings', 'Sites industriels', 'Usines, entrepôts, chantiers'],
                ['bi-stars', 'Événements', 'Mariages, concerts, cérémonies'],
                ['bi-mortarboard', 'Écoles', 'Établissements scolaires'],
            ];
            foreach ($secteurs as [$icone, $titre, $texte]): ?>
                <div class="col-6 col-md-4 col-lg-2" data-reveal>
                    <div class="carte-secteur">
                        <i class="bi <?= $icone ?>"></i>
                        <h3><?= e($titre) ?></h3>
                        <p><?= e($texte) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== POURQUOI NOUS ===== -->
<section class="section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-reveal>
                <span class="sur-titre">Pourquoi nous choisir ?</span>
                <h2 class="titre-section">La sécurité commence par la vigilance</h2>
                <div class="liste-atouts">
                    <div class="atout">
                        <span class="num rouge">1</span>
                        <div><h3>Professionnalisme</h3><p>Des agents formés, en tenue réglementaire, qui appliquent des procédures claires sur chaque site.</p></div>
                    </div>
                    <div class="atout">
                        <span class="num jaune">2</span>
                        <div><h3>Réactivité</h3><p>Une chaîne d'alerte rapide et des équipes mobiles prêtes à intervenir en renfort.</p></div>
                    </div>
                    <div class="atout">
                        <span class="num vert">3</span>
                        <div><h3>Discipline</h3><p>Ponctualité, rigueur et respect des consignes : la confiance se gagne chaque jour.</p></div>
                    </div>
                    <div class="atout">
                        <span class="num rouge">4</span>
                        <div><h3>Sensibilisation</h3><p>Nous partageons régulièrement des réflexes de sécurité pour les familles, les écoles et les entreprises.</p></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-reveal>
                <!-- Quiz interactif inspiré de la campagne « Il est 22h » -->
                <div class="quiz" id="quiz">
                    <div class="quiz-entete">
                        <span class="quiz-heure">Il est 22h…</span>
                        <p class="mb-0">Le portail est fermé. Une personne insiste pour entrer.</p>
                        <h3 class="quiz-question">Que faites-vous ?</h3>
                    </div>
                    <div class="quiz-options">
                        <button type="button" class="quiz-option" data-reponse="a"><span class="lettre bg-rouge">A</span> Je laisse entrer parce qu'elle semble convaincante.</button>
                        <button type="button" class="quiz-option" data-reponse="b"><span class="lettre bg-vert">B</span> Je vérifie son identité et son autorisation avant toute décision.</button>
                        <button type="button" class="quiz-option" data-reponse="c"><span class="lettre bg-orange">C</span> J'ouvre et je demande ensuite ce qui se passe.</button>
                    </div>
                    <div class="quiz-resultat" id="quizResultat" aria-live="polite"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SENSIBILISATION ===== -->
<section class="section section-grise">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5" data-reveal>
            <div>
                <span class="sur-titre">Nos campagnes</span>
                <h2 class="titre-section mb-0">Sensibilisation & conseils</h2>
            </div>
            <a href="galerie.php" class="btn btn-noir">Voir toutes les affiches <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4">
            <?php foreach (array_slice($galerie, 1, 3) as $i => $g): ?>
                <div class="col-md-4" data-reveal>
                    <a href="galerie.php" class="carte-affiche">
                        <img src="assets/img/<?= e($g['img']) ?>" alt="<?= e($g['titre']) ?>" loading="lazy">
                        <span class="affiche-titre"><?= e($g['titre']) ?></span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

</main>

<!-- Bandeau d'appel -->
<section class="cta-bande">
    <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between gap-3">
        <div>
            <p class="script mb-0">Ensemble pour un Cameroun plus sûr !</p>
            <h2 class="h3 fw-bold mb-0">Besoin d'agents de sécurité ? Parlons-en dès aujourd'hui.</h2>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="tel:<?= e($site['tel1_lien']) ?>" class="btn btn-noir btn-lg"><i class="bi bi-telephone-fill"></i> <?= e($site['tel1']) ?></a>
            <a href="contact.php#formulaire" class="btn btn-outline-dark btn-lg fw-semibold">Devis gratuit</a>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="assets/img/logo.jpg" alt="Logo Champion Security SARL" class="logo-footer">
                    <div>
                        <h3 class="h5 fw-bold mb-0 text-white"><?= e($site['nom']) ?></h3>
                        <p class="script texte-jaune mb-0 fs-5"><?= e($site['slogan']) ?></p>
                    </div>
                </div>
                <p>Société de gardiennage et de sécurité basée à Yaoundé. Nous protégeons les entreprises, les particuliers, les commerces, les écoles et les événements avec professionnalisme, réactivité et discipline.</p>
                <div class="drapeau-ligne"><span></span><span></span><span></span></div>
            </div>
            <div class="col-6 col-lg-2">
                <h4 class="footer-titre">Navigation</h4>
                <ul class="list-unstyled footer-liens">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="galerie.php">Sensibilisation</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-3">
                <h4 class="footer-titre">Nos services</h4>
                <ul class="list-unstyled footer-liens">
                    <?php foreach ($services as $cle => $s): ?>
                        <li><a href="services.php#<?= $cle ?>"><?= e($s['titre']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4 class="footer-titre">Contact</h4>
                <ul class="list-unstyled footer-contact">
                    <li><i class="bi bi-telephone-fill"></i> <a href="tel:<?= e($site['tel1_lien']) ?>"><?= e($site['tel1']) ?></a></li>
                    <li><i class="bi bi-telephone-fill"></i> <a href="tel:<?= e($site['tel2_lien']) ?>"><?= e($site['tel2']) ?></a></li>
                    <li><i class="bi bi-envelope-fill"></i> <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></li>
                    <li><i class="bi bi-geo-alt-fill"></i> <?= e($site['ville']) ?></li>
                </ul>
                <div class="d-flex gap-2 mt-3">
                    <a class="reseau" href="<?= e($site['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a class="reseau" href="<?= e($site['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <a class="reseau" href="https://wa.me/<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2 small">
            <span>© <?= e($site['annee']) ?> <?= e($site['nom']) ?>. Tous droits réservés.</span>
            <span>Sécurité • Confiance • Sérénité</span>
        </div>
    </div>
</footer>

<!-- Boutons flottants -->
<a href="https://wa.me/<?= e($site['whatsapp']) ?>?text=<?= rawurlencode('Bonjour Champion Security, je souhaite des informations sur vos services.') ?>" class="btn-whatsapp" target="_blank" rel="noopener" aria-label="Écrire sur WhatsApp"><i class="bi bi-whatsapp"></i></a>
<button type="button" class="btn-haut" id="btnHaut" aria-label="Retour en haut"><i class="bi bi-arrow-up"></i></button>

<script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

<?php
require_once __DIR__ . '/includes/config.php';

$erreurs = [];
$valeurs = ['nom' => '', 'telephone' => '', 'email' => '', 'service' => $_GET['service'] ?? '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($valeurs as $champ => $_) {
        $valeurs[$champ] = trim((string) ($_POST[$champ] ?? ''));
    }

    // Anti-spam : champ caché qui doit rester vide + jeton CSRF
    if (!empty($_POST['site_web'])) {
        $erreurs['global'] = 'Envoi refusé.';
    }
    if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        $erreurs['global'] = 'Session expirée, merci de réessayer.';
    }

    if (mb_strlen($valeurs['nom']) < 2)                     $erreurs['nom'] = 'Indiquez votre nom.';
    if (!preg_match('/^[0-9 +().-]{8,20}$/', $valeurs['telephone'])) $erreurs['telephone'] = 'Numéro de téléphone invalide.';
    if ($valeurs['email'] !== '' && !filter_var($valeurs['email'], FILTER_VALIDATE_EMAIL)) $erreurs['email'] = 'Adresse e-mail invalide.';
    if (!array_key_exists($valeurs['service'], $services) && $valeurs['service'] !== 'autre') $erreurs['service'] = 'Choisissez un service.';
    if (mb_strlen($valeurs['message']) < 10)                $erreurs['message'] = 'Votre message est trop court (10 caractères minimum).';

    if (!$erreurs) {
        $libelle_service = $services[$valeurs['service']]['titre'] ?? 'Autre demande';

        // 1) Sauvegarde dans data/messages.csv (toujours, même si l'e-mail échoue)
        $dossier = __DIR__ . '/data';
        if (!is_dir($dossier)) {
            mkdir($dossier, 0755, true);
        }
        $fichier = $dossier . '/messages.csv';
        $nouveau = !file_exists($fichier);
        if ($fp = fopen($fichier, 'a')) {
            if ($nouveau) {
                fwrite($fp, "\xEF\xBB\xBF"); // BOM pour Excel
                fputcsv($fp, ['Date', 'Nom', 'Téléphone', 'E-mail', 'Service', 'Message'], ';');
            }
            fputcsv($fp, [date('Y-m-d H:i'), $valeurs['nom'], $valeurs['telephone'], $valeurs['email'], $libelle_service, $valeurs['message']], ';');
            fclose($fp);
        }

        // 2) Envoi par e-mail (nécessite un serveur configuré pour mail())
        $sujet  = '=?UTF-8?B?' . base64_encode('Nouvelle demande site web – ' . $libelle_service) . '?=';
        $corps  = "Nouvelle demande reçue depuis le site web :\n\n"
                . "Nom : {$valeurs['nom']}\n"
                . "Téléphone : {$valeurs['telephone']}\n"
                . "E-mail : {$valeurs['email']}\n"
                . "Service : {$libelle_service}\n\n"
                . "Message :\n{$valeurs['message']}\n";
        $entetes = "Content-Type: text/plain; charset=UTF-8\r\n";
        if ($valeurs['email'] !== '') {
            $entetes .= 'Reply-To: ' . str_replace(["\r", "\n"], '', $valeurs['email']) . "\r\n";
        }
        @mail(EMAIL_DESTINATAIRE, $sujet, $corps, $entetes);

        $_SESSION['flash'] = 'Merci ' . $valeurs['nom'] . ' ! Votre demande a bien été envoyée. Nous vous rappelons très rapidement.';
        unset($_SESSION['csrf']);
        header('Location: contact.php#formulaire');
        exit;
    }
}

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$page_actuelle = 'contact';
$titre_page    = 'Contact & devis | Champion Security SARL';
require __DIR__ . '/includes/header.php';

function classe_champ($champ, $erreurs) {
    return 'form-control' . (isset($erreurs[$champ]) ? ' is-invalid' : '');
}
?>

<section class="banniere">
    <div class="container">
        <nav aria-label="fil d'Ariane"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="index.php">Accueil</a></li><li class="breadcrumb-item active" aria-current="page">Contact</li></ol></nav>
        <h1>Contactez-nous</h1>
        <p class="script">Pour vos besoins de sécurité</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-3" data-reveal>
                <a href="tel:<?= e($site['tel1_lien']) ?>" class="carte-contact"><i class="bi bi-telephone-fill"></i><span>Téléphone</span><strong><?= e($site['tel1']) ?></strong></a>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <a href="https://wa.me/<?= e($site['whatsapp']) ?>" target="_blank" rel="noopener" class="carte-contact"><i class="bi bi-whatsapp"></i><span>WhatsApp</span><strong><?= e($site['tel1']) ?></strong></a>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <a href="mailto:<?= e($site['email']) ?>" class="carte-contact"><i class="bi bi-envelope-fill"></i><span>E-mail</span><strong class="small text-break"><?= e($site['email']) ?></strong></a>
            </div>
            <div class="col-md-6 col-lg-3" data-reveal>
                <div class="carte-contact"><i class="bi bi-geo-alt-fill"></i><span>Adresse</span><strong><?= e($site['ville']) ?></strong></div>
            </div>
        </div>

        <div class="row g-5" id="formulaire">
            <div class="col-lg-7" data-reveal>
                <div class="bloc-formulaire">
                    <h2 class="titre-section h3">Demande de devis gratuit</h2>
                    <p class="text-muted">Décrivez votre besoin : nous vous rappelons pour étudier une solution adaptée.</p>

                    <?php if ($flash): ?>
                        <div class="alert alert-success d-flex gap-2 align-items-center"><i class="bi bi-check-circle-fill fs-4"></i> <?= e($flash) ?></div>
                    <?php endif; ?>
                    <?php if (isset($erreurs['global'])): ?>
                        <div class="alert alert-danger"><?= e($erreurs['global']) ?></div>
                    <?php endif; ?>

                    <form method="post" action="contact.php#formulaire" novalidate id="formContact">
                        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
                        <div class="d-none" aria-hidden="true"><input type="text" name="site_web" tabindex="-1" autocomplete="off"></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom complet *</label>
                                <input type="text" class="<?= classe_champ('nom', $erreurs) ?>" id="nom" name="nom" value="<?= e($valeurs['nom']) ?>" required minlength="2" autocomplete="name">
                                <div class="invalid-feedback"><?= e($erreurs['nom'] ?? 'Indiquez votre nom.') ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone *</label>
                                <input type="tel" class="<?= classe_champ('telephone', $erreurs) ?>" id="telephone" name="telephone" value="<?= e($valeurs['telephone']) ?>" required pattern="[0-9 +().\-]{8,20}" placeholder="6XX XX XX XX" autocomplete="tel">
                                <div class="invalid-feedback"><?= e($erreurs['telephone'] ?? 'Numéro de téléphone invalide.') ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="<?= classe_champ('email', $erreurs) ?>" id="email" name="email" value="<?= e($valeurs['email']) ?>" autocomplete="email">
                                <div class="invalid-feedback"><?= e($erreurs['email'] ?? 'Adresse e-mail invalide.') ?></div>
                            </div>
                            <div class="col-md-6">
                                <label for="service" class="form-label">Service souhaité *</label>
                                <select class="form-select<?= isset($erreurs['service']) ? ' is-invalid' : '' ?>" id="service" name="service" required>
                                    <option value="">— Choisir —</option>
                                    <?php foreach ($services as $cle => $s): ?>
                                        <option value="<?= $cle ?>"<?= $valeurs['service'] === $cle ? ' selected' : '' ?>><?= e($s['titre']) ?></option>
                                    <?php endforeach; ?>
                                    <option value="autre"<?= $valeurs['service'] === 'autre' ? ' selected' : '' ?>>Autre demande</option>
                                </select>
                                <div class="invalid-feedback"><?= e($erreurs['service'] ?? 'Choisissez un service.') ?></div>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Votre besoin *</label>
                                <textarea class="<?= classe_champ('message', $erreurs) ?>" id="message" name="message" rows="5" required minlength="10" placeholder="Type de site, nombre d'agents, horaires, date de l'événement…"><?= e($valeurs['message']) ?></textarea>
                                <div class="invalid-feedback"><?= e($erreurs['message'] ?? 'Votre message est trop court (10 caractères minimum).') ?></div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-jaune btn-lg w-100"><i class="bi bi-send-fill"></i> Envoyer ma demande</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5" data-reveal>
                <div class="bloc-urgence">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <h3>Besoin urgent ?</h3>
                    <p>Appelez-nous directement, nous sommes joignables 24h/24 et 7j/7.</p>
                    <a href="tel:<?= e($site['tel1_lien']) ?>" class="btn btn-noir btn-lg w-100 mb-2"><i class="bi bi-telephone-fill"></i> <?= e($site['tel1']) ?></a>
                    <a href="tel:<?= e($site['tel2_lien']) ?>" class="btn btn-outline-dark btn-lg w-100"><i class="bi bi-telephone"></i> <?= e($site['tel2']) ?></a>
                </div>
                <div class="carte-map mt-4">
                    <iframe title="Carte : Yaoundé, Cameroun" src="https://maps.google.com/maps?q=Yaound%C3%A9%2C%20Cameroun&z=12&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php
/**
 * Champion Security SARL — configuration générale du site
 * Modifiez ici les coordonnées : elles sont reprises sur toutes les pages.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$site = [
    'nom'        => 'Champion Security SARL',
    'nom_court'  => 'Champion Security',
    'slogan'     => 'Votre sécurité, notre priorité.',
    'signature'  => 'Des espaces sûrs, des vies sereines',
    'tel1'       => '+237 658 00 12 63',
    'tel1_lien'  => '+237658001263',
    'tel2'       => '+237 695 23 87 77',
    'tel2_lien'  => '+237695238777',
    'whatsapp'   => '237658001263',
    'email'      => 'championsecuritysarl@gmail.com',
    'ville'      => 'Yaoundé, Cameroun',
    'facebook'   => 'https://www.facebook.com/search/top?q=Champion%20Security%20SARL',
    'instagram'  => 'https://www.instagram.com/championsecuritysarl',
    'annee'      => date('Y'),
];

// Adresse qui reçoit les messages du formulaire de contact
define('EMAIL_DESTINATAIRE', $site['email']);

// Services (repris sur l'accueil, la page Services et le formulaire)
$services = [
    'gardiennage' => [
        'titre' => 'Gardiennage de sites',
        'icone' => 'bi-shield-check',
        'court' => 'Agents qualifiés postés jour et nuit pour protéger vos locaux, résidences et chantiers.',
        'long'  => 'Nos agents assurent le contrôle des accès, les rondes de surveillance, la tenue du registre des visiteurs et la protection de vos biens, de jour comme de nuit. Chaque poste suit des consignes écrites adaptées à votre site.',
        'points'=> ['Contrôle des accès et des visiteurs', 'Rondes intérieures et extérieures', 'Main courante et rapports quotidiens', 'Agents en uniforme identifiable'],
    ],
    'surveillance' => [
        'titre' => 'Surveillance électronique',
        'icone' => 'bi-camera-video',
        'court' => 'Vidéosurveillance et dispositifs d\'alarme pour garder un œil sur vos installations.',
        'long'  => 'Nous vous accompagnons dans la mise en place et l\'exploitation de dispositifs de vidéosurveillance et d\'alarme, en complément de la présence humaine, pour une protection continue.',
        'points'=> ['Étude des points sensibles', 'Caméras et alarmes', 'Levée de doute par nos agents', 'Conseil sur l\'exploitation des images'],
    ],
    'intervention' => [
        'titre' => 'Intervention rapide',
        'icone' => 'bi-lightning-charge',
        'court' => 'Des équipes mobiles prêtes à se déplacer en cas d\'alerte ou de situation suspecte.',
        'long'  => 'Nos équipes mobiles interviennent sur alerte pour sécuriser la situation, porter assistance à nos agents postés et informer les services compétents lorsque nécessaire.',
        'points'=> ['Patrouilles véhiculées et à moto', 'Réponse aux alarmes', 'Renfort des agents sur site', 'Liaison avec les autorités'],
    ],
    'evenementiel' => [
        'titre' => 'Sécurisation d\'événements',
        'icone' => 'bi-people',
        'court' => 'Mariages, concerts, séminaires, cérémonies : un encadrement discret et efficace.',
        'long'  => 'De la préparation au démontage, nous sécurisons vos événements publics et privés : filtrage des entrées, gestion des flux, protection des invités et des installations.',
        'points'=> ['Filtrage et contrôle des entrées', 'Gestion des foules', 'Protection des VIP et des scènes', 'Coordination avec l\'organisateur'],
    ],
    'personnes' => [
        'titre' => 'Sécurité des personnes',
        'icone' => 'bi-person-badge',
        'court' => 'Protection rapprochée et accompagnement pour dirigeants, familles et personnalités.',
        'long'  => 'Nous assurons l\'accompagnement et la protection des personnes lors de leurs déplacements et activités, avec discrétion et professionnalisme.',
        'points'=> ['Accompagnement des déplacements', 'Analyse des itinéraires', 'Discrétion et confidentialité', 'Agents formés et disciplinés'],
    ],
    'conseil' => [
        'titre' => 'Conseil et audit de sécurité',
        'icone' => 'bi-clipboard-check',
        'court' => 'Diagnostic de vos risques et plan de sécurité sur mesure pour votre activité.',
        'long'  => 'Nous analysons votre site, vos procédures et vos habitudes pour identifier les points faibles, puis nous vous proposons des mesures concrètes et une sensibilisation de votre personnel.',
        'points'=> ['Visite et diagnostic du site', 'Rapport de recommandations', 'Procédures et consignes', 'Sensibilisation du personnel'],
    ],
];

// Campagnes de sensibilisation (galerie)
$galerie = [
    ['img' => 'ensemble-espaces-surs.jpg', 'titre' => 'Ensemble pour des espaces plus sûrs', 'cat' => 'entreprise'],
    ['img' => 'restez-vigilants.jpg',      'titre' => 'Restez vigilants !', 'cat' => 'vigilance'],
    ['img' => 'reflexes-vigilance.jpg',    'titre' => '5 réflexes pour renforcer votre sécurité', 'cat' => 'vigilance'],
    ['img' => 'il-est-22h.jpg',            'titre' => 'Il est 22h… Que faites-vous ?', 'cat' => 'terrain'],
    ['img' => 'samedi-vigilants.jpg',      'titre' => 'Samedi, restons vigilants !', 'cat' => 'terrain'],
    ['img' => 'rentree-scolaire.jpg',      'titre' => 'Rentrée scolaire : protégeons nos enfants', 'cat' => 'ecoles'],
];

function e($texte) {
    return htmlspecialchars((string) $texte, ENT_QUOTES, 'UTF-8');
}

function csrf_token() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

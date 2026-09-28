# Champion Security SARL — Site web

Site vitrine de **Champion Security SARL**, société de gardiennage et de sécurité à Yaoundé (Cameroun).
*Votre sécurité, notre priorité.*

## Deux versions dans le même dossier

| Version | Fichiers | Où l'utiliser | Formulaire de contact |
|---|---|---|---|
| **Statique (HTML)** | `index.html`, `a-propos.html`, `services.html`, `galerie.html`, `contact.html` | GitHub Pages (gratuit) | Ouvre WhatsApp avec la demande pré-remplie |
| **PHP** | `index.php`, `a-propos.php`, `services.php`, `galerie.php`, `contact.php` | XAMPP ou hébergeur PHP | Enregistre dans `data/messages.csv` et envoie un e-mail |

Les deux versions partagent les mêmes dossiers `assets/` (CSS, JS, images, Bootstrap).
Sous XAMPP, `http://localhost/championWeb/` ouvre la version PHP (Apache charge `index.php` en priorité).
Sur GitHub Pages, l'adresse du site ouvre `index.html`.

## Publier gratuitement sur GitHub Pages

1. Le dépôt existe déjà : `Dedjoun/championWeb`.
2. Envoyez les nouveaux fichiers depuis ce dossier :
   ```bash
   git add .
   git commit -m "Ajout de la version HTML pour GitHub Pages"
   git push
   ```
3. Sur GitHub : **Settings → Pages → Source : Deploy from a branch → Branch : `main` / `(root)` → Save**.
4. Après une ou deux minutes, le site est en ligne à l'adresse
   **https://dedjoun.github.io/championWeb/**.

## Modifier le contenu

Les textes, téléphones et services se trouvent dans `includes/config.php` (version PHP).
Les pages `.html` sont une copie générée de la version PHP : si vous modifiez un texte,
faites-le aussi dans le fichier `.html` correspondant (ou demandez à régénérer les pages HTML).

## Technologies

HTML5 · CSS3 · JavaScript · Bootstrap 5.3 · Bootstrap Icons · PHP 7.4+

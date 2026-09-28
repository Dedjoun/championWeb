/* Champion Security SARL — scripts du site */
document.addEventListener('DOMContentLoaded', () => {

    /* --- Navigation : ombre au défilement + bouton retour en haut --- */
    const nav = document.getElementById('navPrincipale');
    const btnHaut = document.getElementById('btnHaut');
    const surDefilement = () => {
        const y = window.scrollY;
        nav && nav.classList.toggle('defile', y > 40);
        btnHaut && btnHaut.classList.toggle('visible', y > 500);
    };
    window.addEventListener('scroll', surDefilement, { passive: true });
    surDefilement();
    btnHaut && btnHaut.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

    /* Fermer le menu mobile après un clic sur un lien */
    document.querySelectorAll('#menu .nav-link').forEach(lien => {
        lien.addEventListener('click', () => {
            const menu = document.getElementById('menu');
            if (menu.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(menu).hide();
        });
    });

    /* --- Apparition des éléments au défilement --- */
    const elements = document.querySelectorAll('[data-reveal]');
    if ('IntersectionObserver' in window) {
        const obs = new IntersectionObserver(entrees => {
            entrees.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('vu'); obs.unobserve(e.target); }
            });
        }, { threshold: 0.12 });
        elements.forEach(el => obs.observe(el));
    } else {
        elements.forEach(el => el.classList.add('vu'));
    }

    /* --- Compteurs animés --- */
    const compteurs = document.querySelectorAll('[data-compteur]');
    const animer = el => {
        const cible = parseInt(el.dataset.compteur, 10);
        const duree = 1400;
        const debut = performance.now();
        const pas = t => {
            const p = Math.min((t - debut) / duree, 1);
            el.textContent = Math.round(cible * (1 - Math.pow(1 - p, 3)));
            if (p < 1) requestAnimationFrame(pas);
        };
        requestAnimationFrame(pas);
    };
    if ('IntersectionObserver' in window) {
        const obsC = new IntersectionObserver(entrees => {
            entrees.forEach(e => { if (e.isIntersecting) { animer(e.target); obsC.unobserve(e.target); } });
        }, { threshold: 0.6 });
        compteurs.forEach(c => obsC.observe(c));
    } else {
        compteurs.forEach(c => c.textContent = c.dataset.compteur);
    }

    /* --- Quiz « Il est 22h » --- */
    const quiz = document.getElementById('quiz');
    if (quiz) {
        const options = quiz.querySelectorAll('.quiz-option');
        const resultat = document.getElementById('quizResultat');
        const explications = {
            a: "Mauvais réflexe : une personne convaincante n'est pas forcément autorisée. On ne laisse jamais entrer sans vérification.",
            c: "Dangereux : ouvrir avant de savoir qui est là, c'est déjà perdre le contrôle de l'accès.",
            b: "Bonne réponse ! Vérifier l'identité et l'autorisation avant toute décision : c'est la procédure appliquée par nos agents. Chaque décision compte !"
        };
        const reinitialiser = () => {
            options.forEach(o => { o.disabled = false; o.classList.remove('bonne', 'mauvaise'); });
            resultat.innerHTML = '';
        };
        options.forEach(opt => {
            opt.addEventListener('click', () => {
                const rep = opt.dataset.reponse;
                options.forEach(o => {
                    o.disabled = true;
                    if (o.dataset.reponse === 'b') o.classList.add('bonne');
                    else if (o === opt) o.classList.add('mauvaise');
                });
                const ok = rep === 'b';
                resultat.innerHTML = `<div class="alerte ${ok ? 'ok' : 'ko'}">
                    <i class="bi ${ok ? 'bi-check-circle-fill' : 'bi-x-circle-fill'}"></i> ${explications[rep]}
                    <br><button type="button" id="quizRejouer">Rejouer</button></div>`;
                document.getElementById('quizRejouer').addEventListener('click', reinitialiser);
            });
        });
    }

    /* --- Galerie : filtres + lightbox --- */
    const boutonsFiltre = document.querySelectorAll('.btn-filtre');
    boutonsFiltre.forEach(btn => {
        btn.addEventListener('click', () => {
            boutonsFiltre.forEach(b => b.classList.remove('actif'));
            btn.classList.add('actif');
            const f = btn.dataset.filtre;
            document.querySelectorAll('.item-galerie').forEach(item => {
                item.classList.toggle('cache', f !== 'tous' && item.dataset.cat !== f);
            });
        });
    });

    const lightbox = document.getElementById('lightbox');
    if (lightbox && window.GALERIE) {
        const img = document.getElementById('lightboxImg');
        const titre = document.getElementById('lightboxTitre');
        let index = 0;
        const afficher = i => {
            index = (i + GALERIE.length) % GALERIE.length;
            img.src = GALERIE[index].src;
            img.alt = GALERIE[index].titre;
            titre.textContent = GALERIE[index].titre;
        };
        lightbox.addEventListener('show.bs.modal', e => afficher(parseInt(e.relatedTarget.dataset.index, 10)));
        document.getElementById('lightboxPrec').addEventListener('click', () => afficher(index - 1));
        document.getElementById('lightboxSuiv').addEventListener('click', () => afficher(index + 1));
        document.addEventListener('keydown', e => {
            if (!lightbox.classList.contains('show')) return;
            if (e.key === 'ArrowLeft') afficher(index - 1);
            if (e.key === 'ArrowRight') afficher(index + 1);
        });
    }

    /* --- Validation du formulaire côté navigateur --- */
    const form = document.getElementById('formContact');
    if (form) {
        form.addEventListener('submit', e => {
            if (!form.checkValidity()) {
                e.preventDefault();
                form.querySelectorAll('input, select, textarea').forEach(ch => {
                    if (ch.name && ch.type !== 'hidden') ch.classList.toggle('is-invalid', !ch.checkValidity());
                });
                const premier = form.querySelector(':invalid');
                premier && premier.focus();
                return;
            }
            /* Version statique (GitHub Pages) : la demande part par WhatsApp */
            if (form.dataset.whatsapp) {
                e.preventDefault();
                const v = n => (form.elements[n] ? form.elements[n].value.trim() : '');
                const sel = form.elements.service;
                const service = sel ? sel.options[sel.selectedIndex].text : '';
                const texte = `Bonjour Champion Security, je souhaite un devis.\n\n`
                    + `Nom : ${v('nom')}\nTéléphone : ${v('telephone')}\n`
                    + (v('email') ? `E-mail : ${v('email')}\n` : '')
                    + `Service : ${service}\n\n${v('message')}`;
                window.open(`https://wa.me/${form.dataset.whatsapp}?text=${encodeURIComponent(texte)}`, '_blank', 'noopener');
            }
        });
        /* Présélection du service depuis l'URL (?service=...) */
        const sel = form.elements.service;
        const param = new URLSearchParams(location.search).get('service');
        if (sel && !sel.value && param && sel.querySelector(`option[value="${CSS.escape(param)}"]`)) sel.value = param;
        form.querySelectorAll('input, select, textarea').forEach(ch => {
            ch.addEventListener('input', () => { if (ch.checkValidity()) ch.classList.remove('is-invalid'); });
        });
    }
});

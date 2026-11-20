# TicketTac

Gestion de tickets d'assistance en PHP natif et MySQL (PDO), sans framework. Les usagers créent des tickets, le développeur y répond.

## Prérequis

- PHP 8.3
- MySQL 8

## Installation

1. Créer la base `lc_tickets` et importer le script `docs/script_sql/lc_tickets.sql`.
2. Copier `.env.example` en `.env` et renseigner `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
3. Lancer depuis la racine du projet :

   php -S localhost:8000 -t public public/routeur.php

4. Ouvrir http://localhost:8000

## Comptes de test

| Identifiant | Rôle   | Mot de passe |
| ----------- | ------ | ------------ |
| alice       | dev    | alice        |
| bob         | usager | bob          |
| charles     | usager | charles      |

## Fonctionnalités

- Connexion, déconnexion, accès selon le rôle (403 si le rôle ne convient pas).
- Usager : créer un ticket, voir ses tickets, répondre, clôturer.
- Dev : voir les tickets en cours, répondre.
- Statuts : NOUVEAU, RESOLU, NONRESOLU, CLOS.

| Acteur | Statut du ticket     | Action possible             |
| ------ | -------------------- | --------------------------- |
| Usager | tous sauf CLOS       | Clôturer                    |
| Usager | RESOLU               | Répondre (statut NONRESOLU) |
| Dev    | NOUVEAU ou NONRESOLU | Répondre (statut RESOLU)    |
| Dev    | RESOLU ou CLOS       | Aucune action               |

Les actions sont vérifiées côté serveur.

## Structure

- `public/` : pages, routeur et CSS
- `src/` : fonctions (auth, tickets, messages, pages, base de données)
- `vues/` : pages HTML, `vues/composants/` : fragments
- `inc/` : `base()` et fichiers main d'imports
- `tests/` : tests automatisés
- `docs/` : documentation et script SQL

## Tests

php tests/tickets.php

Vérifie `validerticket()` et `actionspossibles()` (12 cas, sans base de données).

## Limites connues

- Les messages affichent « Compte 1 / Compte 2 » au lieu d'un nom.
- La 404 du routeur n'affiche pas l'utilisateur connecté.
- Pas de protection CSRF.
- Sur mobile (320 px), le tableau défile horizontalement dans son cadre ; léger décalage de marge de la navigation.
- Tests limités à `validerticket()` et `actionspossibles()` : rien sur la base, l'authentification ou les pages.
- Le dossier `docs/` est ignoré par git, sauf `docs/script_sql/lc_tickets.sql` (nécessaire à l'installation).

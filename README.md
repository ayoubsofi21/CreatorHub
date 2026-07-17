# 🎨 CreatorHub — L'Écosystème des Créateurs de Contenu

<p align="center">
  <strong>Une plateforme web hybride pour les créateurs de contenu.</strong><br>
  Portfolio • Workspace Collaboratif • Job Board
</p>

---

## 📖 À propos

**CreatorHub** est une plateforme web développée avec **Laravel 12** permettant aux créateurs de contenu, freelances et équipes de production de collaborer sur une seule plateforme.

Elle combine trois espaces principaux :

- 🎨 **Portfolio Visuel** (Pinterest / Behance)
- 📋 **Workspace Collaboratif** (Trello / Kanban)
- 💼 **Job Board** (Recrutement & Candidatures)

L'objectif est de permettre aux créateurs de publier leurs réalisations, gérer leurs projets et recruter des collaborateurs sans quitter la plateforme.

---

# ✨ Fonctionnalités

## 🎨 Portfolio Visuel

- Publication de réalisations
- Galerie des portfolios
- Likes
- Commentaires
- Favoris (Bookmarks)
- Association des compétences
- Recherche des réalisations

---

## 📋 Workspace Collaboratif

- Création de Workspace
- Gestion des membres
- Tableau Kanban
- Gestion des tâches
- Attribution des tâches
- Livraison des projets

---

## 💼 Job Board

- Publication d'offres
- Modification d'offres
- Suppression d'offres
- Consultation des offres
- Candidature en un clic
- Consultation des candidatures
- Acceptation d'une candidature
- Refus d'une candidature

---

# 🛠️ Technologies

### Backend

- Laravel 12
- PHP 8.2
- MySQL
- Eloquent ORM

### API

- REST API
- JSON
- Laravel Form Requests

### Outils

- Git
- GitHub
- Postman
- Docker

---

# 🚀 Installation

## 1. Cloner le projet

```bash
git clone https://github.com/your-username/CreatorHub.git
```

```bash
cd CreatorHub
```

---

## 2. Installer les dépendances

```bash
composer install
```

---

## 3. Copier le fichier d'environnement

```bash
cp .env.example .env
```

---

## 4. Générer la clé Laravel

```bash
php artisan key:generate
```

---

## 6. Exécuter les migrations

```bash
php artisan migrate
```

---

## 7. Lancer le projet

```bash
php artisan serve
```

---

# 🧪 Tests

Les APIs ont été testées avec **Postman**.

Fonctionnalités testées :

- CRUD des offres
- Gestion des candidatures
- Acceptation des candidatures
- Refus des candidatures

---

# 📂 Structure du projet

```
app/
│── Http/
│   ├── Controllers/
│   ├── Requests/
│
├── Models/

database/
├── migrations/
├── seeders/

routes/
└── api.php
```

---

# 📚 Documentation

- Documentation API : Postman
- Diagramme UML
- Diagramme ERD
- Dockerfile

---

# 👨‍💻 Auteur

Projet réalisé dans le cadre du brief **CreatorHub — L'Écosystème des Créateurs de Contenu** de la formation **Développement Digital Full Stack**.

---

# 📄 Licence

Ce projet est réalisé à des fins pédagogiques.

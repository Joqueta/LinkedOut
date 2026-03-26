# LinkedOut — L'anti-LinkedIn

*"Le réseau social pour ceux qui assument leurs échecs professionnels"*

---

## Projet

Sur **LinkedIn** on se vante, sur LinkedOut on se lamente. Tout est inversé : plus t'es nul, plus t'es populaire. L'algorithme booste **les losers**.

## Prérequis

Avant de démarrer le projet, assure-toi d’avoir installé :

- 🐳 **Docker** (obligatoire pour Laravel Sail)
- 🐙 **Git**
- 🧰 **Composer** 

---

## Commande de demarrage  

### 1. Cloner le projet
```bash
git clone git@github.com:Joqueta/LinkedOut.git
cd LinkedOut 
```

### 2. Copier le fichier d’environnement
```bash
cp .env.example .env
```

### 3. Installer les dépendances
```bash
composer install
```

### 4. Démarrer Sail
```bash
./vendor/bin/sail up -d
```

### 5. Générer la clé de l’application
```bash
./vendor/bin/sail artisan key:generate
```


### 6. Lancer les migrations
```bash
./vendor/bin/sail artisan migrate
```


### 8. Installer les dépendances front
```bash
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```


### Astuce (alias Sail)

Pour éviter de taper ./vendor/bin/sail à chaque fois :
```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```
Ensuite :
```bash
sail up -d
sail artisan migrate
```
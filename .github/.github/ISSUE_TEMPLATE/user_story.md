---
name: User Story
about: Décrire une fonctionnalité du point de vue utilisateur
title: "[US] "
labels: user-story
assignees: ''
---

## En tant que...
En tant que **[type d'utilisateur]**,

## Je veux...
Je veux **[action / fonctionnalité]**,

## Afin de...
Afin de **[bénéfice attendu]**.

---

## Critères d'acceptation
- [ ] Critère 1
- [ ] Critère 2

## Tâches techniques
- [ ] Tâche 1
- [ ] Tâche 2

## Metadata
| Champ | Valeur |
|---|---|
| Phase | Phase X |
| Priorité | 🔴 Haute / 🟡 Moyenne / 🟢 Basse |
| Estimation | X heure(s) |
| Assigné à | Personne 1 / Personne 2 |
```

---

## Étape 2 — Créer le projet Kanban

**1.** Va dans l'onglet **Projects** de ton repo → `New Project`

**2.** Choisis le template **"Board"** (Kanban)

**3.** Crée ces colonnes :

| Colonne | Description |
|---|---|
| **Backlog** | Toutes les US non commencées |
| **In Progress** | En cours de développement |
| **In Review** | En attente de review par le binôme |
| **Done** | Terminé et validé |

**4.** Lie les Issues au Project :
- Ouvre une issue → sidebar droite → **Projects** → sélectionne ton Kanban
- L'issue apparaît automatiquement dans la colonne **Backlog**

---

## Astuce — Automatiser le déplacement des cartes

Dans ton projet Kanban → ⚙️ **Settings → Workflows** → active :

- `Item closed` → déplace vers **Done** automatiquement
- `Item reopened` → déplace vers **In Progress**

---

## Résumé visuel du flow
```
Créer Issue avec template
        ↓
Elle apparaît dans Backlog
        ↓
On la déplace en "In Progress" quand on commence
        ↓
"In Review" quand c'est codé → l'autre relit
        ↓
"Done" quand c'est validé et mergé
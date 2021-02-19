# www.yann-trou.com
Site perso

https://codepen.io/mrReiha/pen/RwPgLeM

https://codepen.io/andrewhawkes/pen/RwwOJrO

https://codepen.io/z-/pen/WNbMjEW

Portfolio en deux parties: 
Une pour blender, et une autre pour le code.

Dans la partie code:
    -chargement des projets via le fichier json
    - (éventuellement faire un petit utilitaire pour rajouter un projet via une interface.)
    - pour chaque projet on va avoir:
        - nom
        - lien (généré a la volée)
        - dèrnière release (généré a la volée, si présent).
        - tags: langages / frameworks / IDE
    
Filtrage: 
    Tous les projets sont en mémoire. 
    on génère les filtres en fonction des tags des projets.
    La fonction filtre prend un seul param: la valeur du tag.
    on clear projects.
    pour chaque projet dans allProjects, si il contient le tag recherché, on le met dans projects.
    on appelle la fonction d'affichage des projets. 
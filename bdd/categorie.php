<!--
Faire un formulaire pour ajouter une catégorie en ajax :
- faire un formulaire avec un champ nom
- intercepter le submit en js
- envoyer la valeur du champ nom en ajax en POST vers un fichier PHP
- ce fichier vérifie que le champ nom n'est pas vide
- s'il n'est pas vide insert en bdd
- ce fichier retourne un JSON avec 2 informations :
    - statut : ok ou ko
    - message : de confirmation ou d'erreur
- en retour d'appel ajax afficher le message en vert si ok, en rouge si ko
-->

<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div id="message"></div>
        <form id="form-categorie">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
            <button type="submit">Enregistrer</button>
        </form> 
    </body>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    </script>
    
    <script>
        $(function () { 
                // interception de l'événement submit du formulaire
                $('#form-categorie').submit(function (event) {
                    // empêche la soumission du formulaire
                    event.preventDefault();
                    
                    $.post(
                            // fichier appelé
                            'add-categorie.php',
                            // données envoyées = données du formulaire
                            $(this).serialize(),
                            // fonction qui traite la réponse de categorie-ajax.php
                            function (response) { // success
                                var color = (response.statut == 'ok')
                                    ? 'green'
                                    : 'red'
                                ;
                                
                                $('#message').html(response);   
                        },
                        'json'
                    );
                });
                
        });
                
    </script>    
</html>

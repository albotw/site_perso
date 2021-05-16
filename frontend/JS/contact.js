$(document).ready(function(){
    $("#envoi").on("click", function(){
        let nom = $("#nom").val();
        let email = $("#mail").val();
        let sujet = $("#sujet").val();
        let csrf = $("#csrf").text();
        let texte = $("#texte").val();

        console.log(nom);
        console.log(email);
        console.log(sujet);
        console.log(texte);

        $.post("router.php",
            {
                csrf_token: csrf, action: "sendMessage", nom: nom, email: email, sujet: sujet, texte: texte
            },
            function(html){alert(html);}
        );
    });
});
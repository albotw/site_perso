let csrf;
$(document).ready(function()
{
    csrf = $("#csrf").text();
    init();

    $("#searchButton").on("click", function(){
        let text = $("#searchbar").val();
        console.log(text);
        $.ajax({
            url: "router.php",
            type: "POST",
            data: {csrf_token: csrf, action: "searchProjets", text: text},
            dataType: "json",
            success: function(result){setupPortfolio(result);},
            error: function(result){console.log("Erreur: " + result);}
        });
    });
});

function init()
{
    $.ajax({
        url: "router.php",
        type: "POST",
        data: { csrf_token: csrf, action: "getAllProjets"},
        dataType: "json",
        success: function (result){setupPortfolio(result);},
        error: function(result, status, error){console.log(result); console.log(status); console.log(error);}
    });
}

function setupPortfolio(json)
{
    $("#projets").empty();
    console.log(json);
    json.forEach(function(projet){
        $("#projets").append(`<p>nom: ${projet.nom}</p>`);
        $("#projets").append(`<p>url: ${projet.url}</p>`);
        $("#projets").append(`<p>downloadLink: ${projet.downloadLink}</p>`);
        projet.tags.forEach(function(tag){
            $("#projets").append(`<p>tag: ${tag.tagname}</p>`);
        });
    });
}
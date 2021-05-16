let csrf;
window.addEventListener("DOMContentLoaded", function()
{
    csrf = $("#csrf").text();

    setupTags();
    setupPortfolio();

    $("#searchbar").on("keyup", function(){
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

async function setupTags()
{
    try
    {
        var data = await $.post("router.php", {csrf_token: csrf, action: "getAllTags"});
        var json = JSON.parse(data);
        var vue2 = new Vue({el: "#taglist", data: {json}});
    }catch(error)
    {
        console.error(error);
    }
}

async function setupPortfolio()
{
    try
    {
        $("#projets").empty();
        var data = await $.post("router.php", {csrf_token: csrf, action: "getAllProjets"});
        var json = JSON.parse(data);
        var vue1 = new Vue({el: "#projets", data: {json}});
    }catch(error)
    {
        console.error(error);
    }
}
let toDisplay;
let projects;
let filters = [];

$(document).ready(function ()
{
    $.getJSON("../data.json", function (json)
    {
        toDisplay = [...json];
        projects = [...json];
        initFilters();
        displayProjects();

        console.log(toDisplay);
        console.log(filters);
    })
});

function displayProjects()
{
    if (toDisplay != undefined)
    {
        $("#output").empty();
        for (i = 0; i < toDisplay.length; i++)
        {
            let project = "<div class='project'>";
            project += "<span class='name'>" + toDisplay[i].name + "</span>";
            project += " <a href='" + toDisplay[i].url + "'>Source</a>";
            project += " <span class='tags'>" + toDisplay[i].tags + " </span>";
            project += "</div>"
            $("#output").append(project);
        }
    }
    else 
    {
        console.log("nothing to show");
    }
}

function initFilters()
{
    if (toDisplay != undefined)
    {
        for (const project of projects)
        {
            for (const tag of project.tags)
            {
                if (!filters.includes(tag))
                {
                    filters.push(tag);
                    $("#filter-list").append("<li class='filter'>" + tag + "</li>");
                }
            }
        }

        $(".filter").on("click", function ()
        {
            let tag = $(this).text();
            filter(tag);
        })
    }
}

function filter(tag)
{
    if (tag != undefined)
    {
        toDisplay.length = 0;
        for (const project of projects)
        {
            if (tag == "ALL")
            {
                toDisplay = [...projects];
            }
            else 
            {
                if (project.tags.includes(tag))
                {
                    toDisplay.push(project);
                }
            }
        }

        displayProjects();
    }
}
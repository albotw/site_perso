<input type="text" id="searchbar"/>
<div id="taglist">
    <button v-for="tag in json">
        {{ tag.tagname }}
    </button>
</div>
<div id="projets">
    <p v-for="projet in json">
        {{ projet.nom }}
    </p>
</div>

<script src="frontend/JS/projets.js" type="text/javascript"></script>
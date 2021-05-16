<input type="text" id="searchbar" value=""/>
<div id="taglist">
    <button v-for="tag in json" v-on:click="search">
        {{ tag.tagname }}
    </button>
</div>
<div id="projets">
    <projet-component
            v-for="projet in json"
            v-bind:url="projet.url"
            v-bind:downloadlink="projet.downloadLink"
            v-bind:nom="projet.nom" v-bind:key="projet.id"
            v-bind:tags="projet.tags">
    </projet-component>
</div>

<script src="frontend/JS/projets.js" type="text/javascript"></script>
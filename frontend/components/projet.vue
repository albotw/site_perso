<script>
    export default{
        name: "projet",
        props: ["url", "downloadLink", "nom", ]
    }
</script>
<template>
    <p>
    <h3>{{ nom }}</h3>
    <a :href="url">Dépot</a>
    <a :href="downloadLink">Télécharger</a>
    <button v-for="tag in tags" v-bind:key="tag.id">
        {{ tag.tagname }}
    </button>
    </p>
</template>
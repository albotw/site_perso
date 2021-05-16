Vue.component("projet-component", {
    template: `
        <template>
            <p>
            <h3>{{ projet.nom }}</h3>
            <a :href="url">{{ projet.url }}</a>
            <a :href="downloadLink">{{ projet.downloadLink }}</a>
            <button v-for="tag in projet.tags">
                {{ tag.tagname }}
            </button>
            </p>
        </template> `,
    props: {projet: Object}
});
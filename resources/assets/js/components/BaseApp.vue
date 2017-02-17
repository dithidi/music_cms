<template>
    <div class="admin">
        <main-nav></main-nav>
        <article-admin v-if="navLink == 'articles'"></article-admin>
        <social-admin v-if="navLink == 'socials'"></social-admin>
    </div>
</template>

<script>
    import MainNav from './MainNav.vue';
    import Article from './article/Article.vue';
    import Social from './social/Social.vue';

    export default {
        components: {
            'main-nav': MainNav,
            'article-admin': Article,
            'social-admin': Social
        },

        computed: {
            navLink() {
                return this.$store.getters.mainNav;
            }
        }
    }
</script>
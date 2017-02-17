<template>
    <nav class="main-nav">
        <div class="main-nav__site-title">
            <span class="main-nav__highlight">MUSI</span>CMS
        </div>
        <ul class="main-nav__list">
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'articles' }" @click.prevent="setMainNav('articles')" href="#" class="main-nav__link">Articles</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Media Manager</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Image Galleries</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Video Galleries</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Audio Galleries</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">About Us</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'socials' }" @click.prevent="setMainNav('socials')" href="#" class="main-nav__link">Social Media</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Navigation</a>
            </li>
            <li class="main-nav__list-item">
                <a :class="{ active: navLink == 'placeholder' }" @click.prevent="setMainNav('other')" href="#" class="main-nav__link">Custom Pages</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        computed: {
            navLink() {
                return this.$store.getters.mainNav;
            }
        },

        methods: {
            setMainNav: function(navLink) {
                this.$store.dispatch('setMainNav', navLink);
            }
        }
    }
</script>

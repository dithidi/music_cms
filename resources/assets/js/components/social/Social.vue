<template>
    <div class="main-stage social-admin">
        <ul class="social-admin__items">
            <li v-for="social in socials" class="social-admin__item">
                <social-form :social=social></social-form>
            </li>
        </ul>
    </div>
</template>

<script>
    import SocialForm from './SocialForm.vue';

    export default {
        components: {
            'social-form': SocialForm
        },

        computed: {
            socials() {
                return this.$store.getters.socials;
            }
        },

        created: function() {
            this.fetchInitialData();
        },

        methods: {
            fetchInitialData: function() {
                if(this.socials.length) return;

                this.$http.get('admin/socials').then((response) => {
                    this.$store.dispatch('setSocials', response.body);
                });
            }
        }
    }
</script>
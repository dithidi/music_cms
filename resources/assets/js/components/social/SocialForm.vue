<template>
    <div class="social-form__wrapper">
        <h1 class="social-form__social-title" :class="socialClass">
            {{socialData.title}}
        </h1>
        <form class="social-form__form" @submit.prevent="editSocial()">
            <div class="form-group">
                <label for="socialPath">Social Path</label>
                <input type="text" class="form-control" id="socialPath" placeholder="Social URL" v-model="socialData.path">
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
</template>

<script>
    export default {
        created: function() {
            this.setData();
        },

        data: function() {
            return {
                socialData: { id: '', title: '', path: '' },
                socialClass: ''
            }
        },

        methods: {
            editSocial: function() {

            },

            setData: function() {
                this.socialData = this.social;
                this.socialClass = 'social-form__' + this.socialData.title;
            }
        },

        props: [
            'social'
        ]
    }
</script>
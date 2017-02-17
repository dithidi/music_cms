<template>
    <div class="article-form">
        <h1 v-if="_formType == 'edit'" class="article-form__title">
            Edit Article
        </h1>
        <h1 v-else class="article-form__title">Create Article</h1>

        <form class="article-form__form" @submit.prevent="_formType == 'edit' ? editArticle() : createArticle()">
            <div class="form-group">
                <label for="articleTitle">Article Title</label>
                <input type="text" class="form-control" id="articleTitle" placeholder="Title" v-model="_article.title">
            </div>
            <div class="form-group">
                <label for="articleAuthor">Article Author</label>
                <input type="text" class="form-control" id="articleAuthor" placeholder="Author" v-model="_article.author">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" v-model="_article.published"> Published?
                </label>
            </div>
            <div class="form-group">
                <label for="articleBody">Article Body</label>
                <textarea class="form-control" rows="3" id="articleBody" v-model="_article.body"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        computed: {
            article() {
                return this.$store.getters.currentArticle;
            }
        },

        created: function() {
            this._formType = this.formType;

            if(this.article !== {}) {
                this._article = this.article;
            }
        },

        data: function() {
            return {
                _article: {
                    title: '',
                    author: '',
                    body: '',
                    id: '',
                    published: false
                },
                _formType: ''
            }
        },

        methods: {
            editArticle: function() {
                this.$http.post('admin/articles/' + this._article.id, this._article).then((response) => {
                    this.$store.dispatch('setCurrentArticle', response.body);
                });
            },

            createArticle: function() {
                this.$http.post('admin/articles', this._article).then((response) => {
                    this.$store.dispatch('setCurrentArticle', response.body);
                    this.$store.dispatch('addArticle', this.article);
                    this._article = this.article;
                    this._formType = 'edit';
                });
            }
        },

        props: [
            'formType'
        ]
    }
</script>
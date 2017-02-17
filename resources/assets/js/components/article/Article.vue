<template>
    <div class="main-stage article-admin">
        <a v-if="showForm == true" @click.prevent="showArticleList" href="#" class="article-admin__breadcrumb">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            Back to Articles
        </a>
        <transition name="slide-fade">
            <article-form v-if="showForm == true" :formType=formType></article-form>
        </transition>
        <transition name="slide-fade">
        <section v-if="showForm == false" class="article-admin__main-container">
            <div class="article-admin__search-wrapper">
                <form class="article-admin__search-form" @submit.prevent="">
                    <div class="form-group">
                        <label for="articleTitle">Search for your article</label>
                        <input v-model="searchText" type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                <a class="article-admin__create" href="#" @click.prevent="showArticleCreate">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create an Article
                </a>
            </div>
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Published</th>
                        <th>Author</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="article in filterBy(articles, searchText)" @click="setCurrentArticle(article)">
                        <td>{{article.title}}</td>
                        <td>{{article.published ? 'Yes' : 'No'}}</td>
                        <td>{{article.author}}</td>
                        <td>{{article.created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </section>
        </transition>
    </div>
</template>

<script>
    import ArticleForm from './ArticleForm.vue';

    export default {
        data() {
            return {
                showForm: false,
                formType: '',
                searchText: ''
            }
        },

        components: {
            'article-form': ArticleForm
        },

        created: function() {
            this.fetchInitialData();
        },

        computed: {
            articles() {
                return this.$store.getters.articles;
            }
        },

        methods: {
            fetchInitialData: function() {
                if(this.articles.length) return;

                this.$http.get('admin/articles').then((response) => {
                    this.$store.dispatch('setArticles', response.body);
                });
            },

            showArticleCreate: function() {
                this.$store.dispatch('setCurrentArticle', {});
                this.formType = 'create';
                this.showForm = true;
            },

            setCurrentArticle: function(article) {
                this.$store.dispatch('setCurrentArticle', article);
                this.formType = 'edit';
                this.showForm = true;
            },

            showArticleList: function() {
                this.showForm = false;
                this.formType = '';
            }
        }
    }
</script>
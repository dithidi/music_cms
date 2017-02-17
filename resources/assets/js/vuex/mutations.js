module.exports = {
    SET_MAIN_NAV(state, navLink) {
        state.mainNav = navLink;
    },

    SET_ARTICLES(state, articles) {
        state.articles = articles;
    },

    ADD_ARTICLE(state, article) {
        state.articles.push(article);
    },

    REMOVE_ARTICLE(state) {
        state.articles.$remove(state.currentArticle);
    },

    SET_CURRENT_ARTICLE (state, article) {
        state.currentArticle = article;
    },

    SET_SOCIALS(state, socials) {
        state.socials = socials;
    }
}

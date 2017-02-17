module.exports = {
    setMainNav({commit}, navLink) {
        commit('SET_MAIN_NAV', navLink);
    },

    setArticles({ commit }, articles){
        commit('SET_ARTICLES', articles);
    },

    setCurrentArticle({ commit }, article){
        commit('SET_CURRENT_ARTICLE', article);
    },

    addArticle({ commit }, article){
        commit('ADD_ARTICLE', article);
    },

    setSocials({ commit }, socials) {
        commit('SET_SOCIALS', socials);
    }
}

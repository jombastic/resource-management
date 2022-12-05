import { createStore } from 'vuex';

const state = {
    title: '',
    resourceType: 1,
    snippetDescription: '',
    htmlSnippet: '',
    pdfFIle: '',
    link: '',
    openLinkInNewTab: true
};

const mutations = {
    UPDATE_TITLE(state, payload) {
        state.title = payload;
    },
    UPDATE_RESOURCE_TYPE(state, payload) {
        state.resourceType = payload;
    },
    UPDATE_SNIPPET_DESCRIPTION(state, payload) {
        state.snippetDescription = payload;
    },
    UPDATE_SNIPPET(state, payload) {
        state.htmlSnippet = payload;
    },
    UPDATE_PDF_FILE(state, payload) {
        state.pdfFIle = payload;
    },
    UPDATE_LINK(state, payload) {
        state.link = payload;
    },
    UPDATE_NEW_TAB(state, payload) {
        console.log(payload)
        state.openLinkInNewTab = payload;
    },
};

const actions = {

};

const getters = {
    title: state => state.title,
    resourceType: state => state.resourceType,
    snippetDescription: state => state.snippetDescription,
    htmlSnippet: state => state.htmlSnippet,
    pdfFIle: state => state.pdfFIle,
    link: state => state.link,
    openLinkInNewTab: state => state.openLinkInNewTab,
};

export default createStore({
    state,
    mutations,
    actions,
    getters,
});
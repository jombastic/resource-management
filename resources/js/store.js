import { createStore } from 'vuex';

const state = {
    fields: {
        title: '',
        resourceType: '',
        snippetDescription: '',
        htmlSnippet: '',
        pdfFIle: '',
        fileName: '',
        link: '',
        openLinkInNewTab: true
    }
};

const mutations = {
    UPDATE_TITLE(state, payload) {
        state.fields.title = payload;
    },
    UPDATE_RESOURCE_TYPE(state, payload) {
        state.fields.resourceType = payload;
    },
    UPDATE_SNIPPET_DESCRIPTION(state, payload) {
        state.fields.snippetDescription = payload;
    },
    UPDATE_SNIPPET(state, payload) {
        state.fields.htmlSnippet = payload;
    },
    UPDATE_PDF_FILE(state, payload) {
        if (!payload) return;
        state.fields.pdfFIle = payload;
        state.fields.fileName = payload.name;
    },
    UPDATE_LINK(state, payload) {
        state.fields.link = payload;
    },
    UPDATE_NEW_TAB(state, payload) {
        state.fields.openLinkInNewTab = payload;
    },
};

const actions = {

};

const getters = {
    title: state => state.fields.title,
    resourceType: state => state.fields.resourceType,
    snippetDescription: state => state.fields.snippetDescription,
    htmlSnippet: state => state.fields.htmlSnippet,
    pdfFIle: state => state.fields.pdfFIle,
    fileName: state => state.fields.fileName,
    link: state => state.fields.link,
    openLinkInNewTab: state => state.fields.openLinkInNewTab,
};

export default createStore({
    state,
    mutations,
    actions,
    getters,
});
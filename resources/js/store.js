import { createStore } from 'vuex';

const state = {
    fields: {
        title: '',
        resourceType: '',
        snippetDescription: '',
        htmlSnippet: '',
        pdfFile: '',
        fileName: '',
        link: '',
        openLinkInNewTab: ''
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
        state.fields.pdfFile = payload;
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
    saveResources({ state, commit }) {
        const formData = new FormData();
        // for (const [key, value] of Object.entries(state.fields)) {
        //     formData.append(key, value);
        // }
        formData.append('title', state.fields.title);
        formData.append('resourceType', state.fields.resourceType);

        if (state.fields.resourceType === 'HTML Snippet') {
            formData.append('snippetDescription', state.fields.snippetDescription);
            formData.append('htmlSnippet', state.fields.htmlSnippet);
        }
        if (state.fields.resourceType === 'PDF Download')
            formData.append('pdfFile', state.fields.pdfFile);

        if (state.fields.resourceType === 'Link') {
            formData.append('link', state.fields.link);
            formData.append('openLinkInNewTab', state.fields.openLinkInNewTab);
        }

        return axios.post('/admin/store', formData)
            .then((response) => {
                window.location.replace('/');
            })
            .catch((error) => {
                throw error;
            })
    },
};

const getters = {
    title: state => state.fields.title,
    resourceType: state => state.fields.resourceType,
    snippetDescription: state => state.fields.snippetDescription,
    htmlSnippet: state => state.fields.htmlSnippet,
    pdfFile: state => state.fields.pdfFile,
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
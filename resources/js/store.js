import { createStore } from 'vuex';

const state = {
    fields: {
        id: window.resource.id ? window.resource.id : '',
        title: window.resource.title ? window.resource.title : '',
        resourceType: window.resource.resourceType ? window.resource.resourceType : '',
        snippetDescription: window.resource.snippetDescription ? window.resource.snippetDescription : '',
        htmlSnippet: window.resource.htmlSnippet ? window.resource.htmlSnippet : '',
        pdfFile: '',
        fileName: window.resource.pdfFile ? window.resource.pdfFile : '',
        url: window.resource.url ? window.resource.url : '',
        openLinkInNewTab: window.resource.openLinkInNewTab ? window.resource.openLinkInNewTab : 0
    },
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
    UPDATE_URL(state, payload) {
        state.fields.url = payload;
    },
    UPDATE_NEW_TAB(state, payload) {
        state.fields.openLinkInNewTab = payload;
    },
};

const actions = {
    saveResources({ state, getters }) {
        const formData = new FormData();
        formData.append('title', state.fields.title);
        formData.append('resourceType', state.fields.resourceType);

        if (state.fields.resourceType === 'HTML Snippet') {
            formData.append('snippetDescription', state.fields.snippetDescription);
            formData.append('htmlSnippet', state.fields.htmlSnippet);
        }
        if (state.fields.resourceType === 'PDF Download')
            formData.append('pdfFile', state.fields.pdfFile);

        if (state.fields.resourceType === 'Link') {
            formData.append('url', state.fields.url);
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

    editResource({ state }) {
        const formData = new FormData();
        formData.append('id', state.fields.id);
        formData.append('title', state.fields.title);
        formData.append('resourceType', state.fields.resourceType);

        if (state.fields.resourceType === 'HTML Snippet') {
            formData.append('snippetDescription', state.fields.snippetDescription);
            formData.append('htmlSnippet', state.fields.htmlSnippet);
        }
        if (state.fields.resourceType === 'PDF Download') {
            formData.append('pdfFile', state.fields.pdfFile);
            formData.append('fileName', state.fields.fileName);
        }

        if (state.fields.resourceType === 'Link') {
            formData.append('url', state.fields.url);
            formData.append('openLinkInNewTab', state.fields.openLinkInNewTab);
        }

        return axios.post('/admin/update/' + state.fields.id, formData)
            .then((response) => {
                window.location.replace('/');
            })
            .catch((error) => {
                throw error;
            })
    },

    deleteResource({ state }) {
        return axios.post('/admin/delete/' + state.fields.id)
            .then((response) => {
                window.location.replace('/');
            })
            .catch((error) => {
                throw error;
            })
    }
};

const getters = {
    id: state => state.fields.id,
    title: state => state.fields.title,
    resourceType: state => state.fields.resourceType,
    snippetDescription: state => state.fields.snippetDescription,
    htmlSnippet: state => state.fields.htmlSnippet,
    pdfFile: state => state.fields.pdfFile,
    fileName: state => state.fields.fileName,
    url: state => state.fields.url,
    openLinkInNewTab: state => state.fields.openLinkInNewTab,
};

export default createStore({
    state,
    mutations,
    actions,
    getters,
});
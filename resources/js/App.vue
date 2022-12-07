<template>
    <form @submit.prevent="submitForm" action="" class="row">
        <div class="col-6 mb-3">
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input :value="title" @input="onInputChange" type="text" class="form-control" id="title" name="TITLE"
                    placeholder="Enter title here">
                <span class="text-danger">{{ fieldErrors.title }}</span>
            </div>
            <div class="mb-5">
                <label for="resource-type" class="form-label">Resource Type <span class="text-danger">*</span></label>
                <select @change="onInputChange" :value="resourceType" name="RESOURCE_TYPE" id="resource-type"
                    class="form-select" aria-label="Default select example">
                    <option disabled value="">Select a resource type</option>
                    <option>PDF Download</option>
                    <option>HTML Snippet</option>
                    <option>Link</option>
                </select>
                <span class="text-danger">{{ fieldErrors.resourceType }}</span>
            </div>
            <SnippetComponent :fieldErrors="fieldErrors" v-if="resourceType === 'HTML Snippet'" />
            <PdfDownload :fieldErrors="fieldErrors" v-if="resourceType === 'PDF Download'" />
            <LinkComponent :fieldErrors="fieldErrors" v-if="resourceType === 'Link'" />
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</template>

<script>
import { mapGetters } from 'vuex';
import UpdateInput from './mixins/updateInput.js';
import SnippetComponent from './components/SnippetComponent.vue';
import LinkComponent from './components/LinkComponent.vue';
import PdfDownload from './components/PdfDownload.vue';

export default {
    name: 'App',

    components: {
        SnippetComponent,
        LinkComponent,
        PdfDownload,
    },

    mixins: [UpdateInput],

    computed: {
        ...mapGetters(['id', 'title', 'resourceType'])
    },

    data() {
        return {
            fieldErrors: {
                title: undefined,
                resourceType: undefined,
                snippetDescription: undefined,
                htmlSnippet: undefined,
                pdfFIle: undefined,
                url: undefined,
            }
        }
    },

    methods: {
        validateForm(fields) {
            const errors = {};
            if (!fields.title) errors.title = 'Title required';
            if (!fields.resourceType) errors.resourceType = 'Resource type required';

            if (fields.resourceType === 'HTML Snippet') {
                if (!fields.snippetDescription) errors.snippetDescription = 'Snippet description required';
                if (!fields.htmlSnippet) errors.htmlSnippet = 'Html snippet required';
            }

            if (fields.resourceType === 'PDF Download') {
                if (!fields.fileName) errors.fileName = 'File required';

                // Allowing file type
                var allowedExtensions = /(\.pdf)$/i;
                if (fields.fileName && !allowedExtensions.exec(fields.fileName)) errors.fileName = 'Invalid file type';
            }

            if (fields.resourceType === 'Link') {
                if (!fields.url) errors.url = 'Link required';
                if (fields.url && !this.isValidUrl(fields.url)) errors.url = 'Invalid link';
            }

            return errors;
        },

        isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (err) {
                return false;
            }
        },

        submitForm(evt) {
            this.fieldErrors = this.validateForm(this.$store.state.fields);

            if (Object.keys(this.fieldErrors).length) return;

            this.saveStatus = 'SAVING';
            let action = !this.id ? 'saveResources' : 'editResource';
            this.$store.dispatch(action, this.$store.state.fields)
                .then(() => {
                    this.saveStatus = 'SUCCESS';
                })
                .catch((err) => {
                    this.saveStatus = 'ERROR';
                    let fieldErrors = {};
                    
                    for (const [key, value] of Object.entries(err.response.data.errors)) {
                        fieldErrors[key] = value[0];
                    }
                    this.fieldErrors = fieldErrors;
                });
        }
    }
}
</script>
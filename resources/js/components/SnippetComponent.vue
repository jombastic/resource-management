<template>
    <div class="mb-3">
        <label for="snippet-description" class="form-label">Snippet description <span class="text-danger">*</span></label>
        <textarea :value="snippetDescription" @input="onInputChange" name="SNIPPET_DESCRIPTION" class="form-control" id="snippet-description" rows="3"
            placeholder="Enter description here"></textarea>
            <span class="text-danger">{{ fieldErrors.snippetDescription }}</span>
    </div>
    <div class="mb-3">
        <label for="snippet" class="form-label">HTML Snippet <span class="text-danger">*</span></label>
        <vue-editor id="snippet" v-model="htmlSnippet" />
        <span class="text-danger">{{ fieldErrors.htmlSnippet }}</span>
    </div>
</template>

<script>
import { VueEditor } from "vue3-editor";
import { mapGetters } from 'vuex';
import UpdateInput from '../mixins/updateInput.js';

export default {
    name: 'SnippetComponent',

    components: { VueEditor },

    mixins: [UpdateInput],

    props: ['fieldErrors'],

    computed: {
        ...mapGetters(['snippetDescription']),

        htmlSnippet: {
            get() {
                return this.$store.state.htmlSnippet;
            },
            set(val) {
                this.$store.commit('UPDATE_SNIPPET', val);
            }
        }
    },
}
</script>
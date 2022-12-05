<template>
    <div class="mb-3">
        <label for="snippet-description" class="form-label">Snippet description</label>
        <textarea :value="snippetDescription" @input="onInputChange" name="SNIPPET_DESCRIPTION" class="form-control" id="snippet-description" rows="3"
            placeholder="Enter description here"></textarea>
    </div>
    <div class="mb-3">
        <label for="snippet" class="form-label">HTML Snippet</label>
        <vue-editor id="snippet" v-model="htmlSnippet" />
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
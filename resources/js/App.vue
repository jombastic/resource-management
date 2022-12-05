<template>
    <form action="" class="row">
        <div class="col-6 mb-3">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input :value="title" @input="onInputChange" type="text" class="form-control" id="title" name="TITLE" placeholder="Enter title here">
            </div>
            <div class="mb-5">
                <label for="resource-type" class="form-label">Resource Type</label>
                <select @change="onInputChange" :value="resourceType" name="RESOURCE_TYPE" id="resource-type" class="form-select"
                    aria-label="Default select example">
                    <option disabled value="">Select a resource type</option>
                    <option value="1">PDF Download</option>
                    <option value="2">HTML Snippet</option>
                    <option value="3">Link</option>
                </select>
            </div>
            <SnippetComponent  />
            <PdfDownload  />
            <LinkComponent  />
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
        ...mapGetters(['title', 'resourceType'])
    },
}
</script>
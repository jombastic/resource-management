<template>
    <div class="mb-3">
        <label for="snippet-description" class="form-label">Snippet description</label>
        <textarea class="form-control" id="snippet-description" rows="3" placeholder="Enter description here"></textarea>
    </div>
    <div class="mb-3">
        <label for="snippet" class="form-label">HTML Snippet</label>
        <vue-editor id="snippet" v-model="content" />
    </div>
</template>

<script>
import { VueEditor } from "vue3-editor";

export default {
    name: 'HtmlSnippet',

    components: { VueEditor },

    data: () => ({
        content: "<h1>Some initial content</h1>"
    })
}
</script>
<template>
    <div class="mb-3">
        <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
        <input @input="onInputChange" :value="url" type="text" name="URL" class="form-control" id="link"
            placeholder="Enter a link here">
        <span class="text-danger">{{ fieldErrors.url }}</span>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" :checked="openLinkInNewTab" @change="onInputChange"
            name="NEW_TAB" id="new-tab">
        <label class="form-check-label" for="new-tab">
            Open the link in a new tab</label>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import UpdateInput from '../mixins/updateInput.js';

export default {
    name: 'LinkComponent',

    mixins: [UpdateInput],

    props: ['fieldErrors'],

    computed: {
        ...mapGetters(['url', 'openLinkInNewTab'])
    }
}
</script>
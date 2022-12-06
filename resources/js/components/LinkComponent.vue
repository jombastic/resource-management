<template>
    <div class="mb-3">
        <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
        <input @input="onInputChange" :value="link" type="text" name="LINK" class="form-control" id="link"
            placeholder="Enter a link here">
        <span class="text-danger">{{ fieldErrors.link }}</span>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" :checked="openLinkInNewTab" @change="onInputChange"
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
        ...mapGetters(['link', 'openLinkInNewTab'])
    }
}
</script>
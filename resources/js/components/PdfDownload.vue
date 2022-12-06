<template>
    <div class="mb-3">
        <label for="file" class="form-label d-block">Upload a pdf file <span class="text-danger">*</span></label>
        <input @input="onInputChange" class="form-control" type="file" id="file" name="PDF_FILE" style="display: none">
        <button type="button" class="btn btn-dark" onclick="document.getElementById('file').click();">Browse</button>
        <span class="ms-3">{{ fileName }}</span>&nbsp;
        <span class="text-danger">{{ fieldErrors.fileName }}</span>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import UpdateInput from '../mixins/updateInput.js';

export default {
    name: 'PdfDownload',

    mixins: [UpdateInput],

    props: ['fieldErrors'],

    computed: {
        ...mapGetters(['pdfFIle', 'fileName'])
    }
}
</script>
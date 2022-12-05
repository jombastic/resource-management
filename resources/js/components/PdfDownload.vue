<template>
    <div class="mb-3">
        <label for="file" class="form-label">Upload a pdf file</label>
        <input @input="onInputChange" :value="pdfFIle" class="form-control" type="file" id="file" name="PDF_FILE">
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import UpdateInput from '../mixins/updateInput.js';

export default {
    name: 'PdfDownload',

    mixins: [UpdateInput],
    
    computed: {
        ...mapGetters(['pdfFIle'])
    }
}
</script>
import './bootstrap';

import { createApp } from 'vue';
import HtmlSnippet from './components/HtmlSnippet.vue';
import LinkComponent from './components/LinkComponent.vue';
import PdfDownload from './components/PdfDownload.vue';

createApp({
    components: {
        HtmlSnippet,
        LinkComponent,
        PdfDownload,
    }
}).mount('#app');

// Register Vue Components
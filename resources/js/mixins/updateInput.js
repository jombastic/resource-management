export default {
    methods: {
        onInputChange(evt) {
            const element = evt.target;
            let value;

            if (element.type === 'file')
                value = element.files[0];
            else {
                value =
                    element.name === "NEW_TAB"
                        ? element.checked ? 1 : 0
                        : element.value;
            }
                    
            this.$store.commit(`UPDATE_${element.name}`, value);
        }
    }
}

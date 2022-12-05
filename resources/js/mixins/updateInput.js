export default {
    methods: {
        onInputChange(evt) {
            const element = evt.target;
            const value =
                element.name === "NEW_TAB"
                    ? element.checked
                    : element.value;
                    
            this.$store.commit(`UPDATE_${element.name}`, value);
        }
    }
}

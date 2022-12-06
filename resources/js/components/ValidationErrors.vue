<template>
    <div v-if="hasErrors">
        <div class="text-danger">Whoops! Something went wrong.</div>

        <ul class="text-danger">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'ValidationErrors'
}
</script>
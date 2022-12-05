<template>
    <div class="mb-3">
        <label for="link" class="form-label">Link</label>
        <input type="text" class="form-control" id="link" placeholder="Enter a link here">
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="new-tab">
        <label class="form-check-label" for="new-tab">
            Open the link in a new tab 
        </label>
    </div>
</template>

<script>
export default {
    name: 'LinkComponent'
}
</script>
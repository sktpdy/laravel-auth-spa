<template>
    <div class="mb-4">
        <label v-if="label" class="label-d">{{ label }}</label>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: ''
        },
    }
}
</script>

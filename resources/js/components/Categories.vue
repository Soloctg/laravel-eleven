<template>
    // ...
</template>

<script setup>
import { ref } from 'vue';

const name = ref('')

const submit = () => {
    axios.post('/api/categories', {
        name: name.value
    })
        .then(response => {
            console.log('New Category ID: ' + response.data.data.id)
        })
        .catch(error => {
            console.log(error.response.data.errors)
        })
}
</script>

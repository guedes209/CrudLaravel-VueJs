<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props:{
        onClick: {
            type: Function,
            required: true
        },
        placeholder: {
            type: String,
            required: true
        }
    },
    setup (props) {
        return {
            placeholder: props.placeholder,
            onClick: props.onClick
        }
    }
})
</script>

<template>
    <div>
        <button @click="onClick" class="btn btn-primary">{{ placeholder }}</button>
    </div>
</template>


<style scoped>

</style>
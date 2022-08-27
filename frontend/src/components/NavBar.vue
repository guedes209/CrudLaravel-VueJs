<script>
import { ref } from 'vue';

export default {
    data() {
        return {
            dense: true
        }
    }
}

</script>

<template>
    <div>
        <ui-top-app-bar
        content-selector="#content-main"
        :dense=dense
        :navIcon="false"
        class="app-bar"
        >
        <span class="top-bar">Gerenciamento de Consultas</span>
        </ui-top-app-bar>
        
        <div id="content-main">
            <RouterView/>
        </div>
    </div>
</template>

<style>
.app-bar{
    background-color: white!important;
    color: #666666!important;
}
.top-bar{
    font-size: 30px; 
    font-weight: 500;
}
</style>
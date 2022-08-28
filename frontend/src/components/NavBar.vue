<script>
import { ref } from 'vue';
import { requestGet } from '../api/index';

var logged = ref();
async function isLogged(){
    var response = await requestGet('/logged')
    if(response.success){
        logged.value = response.logged;
    } else {
        logged.value = false;
    }
}

export default {
    data() {
        return {
            dense: true,
            isLogged,
            logged
        }
    },
    watch: {
        $router: {
            deep: true,
            handler(){
                this.isLogged();
            }
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
        <div v-if="logged" style="display:flex; justify-content: start;">
            <div class="top-bar">GC</div>
            <div>algo novo</div>
        </div>
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
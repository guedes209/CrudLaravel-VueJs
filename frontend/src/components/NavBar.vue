<script>
import { RouterLink, RouterView } from 'vue-router'
import { defineComponent } from 'vue'

export default defineComponent({
    setup(props) {
        return {
            routes: [{
                name: 'Home',
                link: '/'
            },{
                name: 'Contato',
                link: '/contact'
            },{
                name: 'Sobre-nos',
                link: '/about'
            }]
        }
    }
})

</script>


<template>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
        <RouterLink class="navbar-brand ml-2" to="/">Crud Laravel + VueJs</RouterLink>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li v-for="item in routes" class="nav-item">
                    <RouterLink class="nav-link" :to="`${item.link}`">{{ item.name }}</RouterLink>
                </li>
            </ul>
        </div>
    </nav>
    <RouterView />
</template>


<style scoped>
.ml-2{
    margin-left:10px;
}
</style>
<script>
import { defineComponent, ref, reactive } from 'vue'
import axios from 'axios'

const link = 'http://127.0.0.1:8000/api';

export default defineComponent({
    setup(props) {
        var data = ref([]);

        function getProducts(){
            axios.post(link+'/getProducts')
            .then(response => {
                data.value = response.data;
            });
        }

        return {
            getProducts,
            data
        }
    },
    created() {
        this.getProducts();
    }
})

</script>

<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="dado in data">
                    <th scope="row">{{dado.id}}</th>
                    <td>{{dado.name}}</td>
                    <td>{{dado.value}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>

</style>
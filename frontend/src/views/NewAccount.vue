<script>
import { ref } from 'vue';
import { requestPost } from '../api/index';

var email = ref();
var password = ref();
var password2 = ref();

async function create(email, password){
    var response = await requestPost('/create-user', {email, password});
    if(response.success){
        console.log(response);
    } else {
        console.log(response);
    }
}
export default {
    data(){
        return {
            create,
            email,
            password,
            password2
        }
    }
}
</script>

<template> 
    <div class="create-acc">
        <img src="../assets/login.jpeg">
        <ui-form class="form" itemMarginBottom="30" labelWidth="400">
            <ui-form-field>
                <ui-textfield 
                nowrap
                outlined
                v-model=email
                required
                fullwidth
                >
                    Email
                </ui-textfield>
            </ui-form-field>
            <ui-form-field>
                <ui-textfield 
                nowrap
                outlined
                v-model=password
                required
                fullwidth
                inputType="password"
                >
                    Senha
                </ui-textfield>
            </ui-form-field>
            <ui-form-field>
                <ui-textfield 
                nowrap
                outlined
                v-model=password2
                required
                fullwidth
                inputType="password"
                >
                    Confirmar Senha
                </ui-textfield>
            </ui-form-field>
            <ui-form-field>
                <ui-button v-on:click="create(email, password)" raised style="min-width: 300px;">
                    Criar Conta
                </ui-button>
            </ui-form-field>
        </ui-form>
    </div>
</template>

<style>
.create-acc{
    display:flex; 
    justify-content: space-evenly; 
    align-items: center;
    margin-right: 100px;
}
.form{
    border: 1px solid rgb(158, 158, 158)!important;
    border-radius: 5%;
    padding: 20px!important;
    margin-top: 30px!important;
    min-width: 300px!important;
}
</style>
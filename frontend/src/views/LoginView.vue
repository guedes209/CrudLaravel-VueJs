<script>
import { ref } from 'vue';
import { requestPost } from '../api/index';

var email = ref();
var password = ref();

async function login(email, password){
    var response = await requestPost('/login', {email, password});
    if(response.success){
        console.log(response);
    } else {
        console.log(response);
    }
}
export default {
    data(){
        return {
            login,
            email,
            password
        }
    }
}
</script>

<template>
    <div class="login">
        <ui-form class="form" itemMarginBottom="35" labelWidth="400">
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
            <ui-form-field style="display: flex; justify-content: center;">
                <ui-button v-on:click="login(email,password)" style="margin-right: 10px;" raised>
                    Entrar
                </ui-button>
            </ui-form-field>
            <ui-form-field style="display: flex; justify-content: center;">
                <ui-button raised>
                    Nova Conta
                </ui-button>
            </ui-form-field>
            <ui-form-field style="display: flex; justify-content: center;">
                <ui-button>
                    Esqueci a senha
                </ui-button>
            </ui-form-field>
        </ui-form>
    </div>
</template>

<style>
.login{
    display:flex; 
    justify-content: center; 
    align-items: center;
    margin-top:50px;
}
.form{
    border: 1px solid rgb(158, 158, 158)!important;
    border-radius: 5%;
    padding: 20px!important;
    margin-top: 30px!important;
    min-width: 300px!important;
}
</style>
<script>
import { ref } from 'vue';
import { requestPost } from '../api/index';
import router from '../router';

var email = ref();
var password = ref();

async function login(email, password){
    var response = await requestPost('/login', {email, password});
    if(response.success){
        router.push('/assignments');
    } else {
        console.log(response);
    }
}

function newAccount(){
    router.push('/new-account');
}

export default {
    data(){
        return {
            login,
            email,
            password,
            newAccount
        }
    }
}
</script>

<template>
    <div class="login">
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
            <ui-form-field style="margin-bottom: 5px!important;">
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
            <ui-form-field style="display: flex; justify-content: end;">
                <ui-button class="bt-new forgot-pass">
                    Esqueceu a senha?
                </ui-button>
            </ui-form-field>
            <ui-form-field style="display: flex; justify-content: space-between;">
                <ui-button style="min-width: 300px;" v-on:click="login(email,password)" raised>
                    Entrar
                </ui-button>
            </ui-form-field>
            <ui-form-field>
                <div>
                    <span style="color: #a2a2a2">Primeiro acesso?</span>
                    <ui-button class="bt-new" v-on:click="newAccount()">
                        Clique aqui
                    </ui-button>
                </div>
            </ui-form-field>
        </ui-form>
    </div>
</template>

<style>
.bt-new{
    text-transform: none!important;
    font-size: 14px!important;
    /* color: #a2a2a2!important; */
}
.forgot-pass{
    font-size: 12px!important;
}
.login{
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
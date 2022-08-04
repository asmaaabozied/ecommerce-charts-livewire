<template>
    <section class="bank-accounts">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>{{t('bank-accounts.bank-accounts')}}</h3>
            </div>
        </div>
        <div class="bank-account-section">
            <div v-for="item in accounts" :key="item.id">
                <BankAccountsCard :data="item"/>
            </div>
        </div>   
    </div>
        
    </section>
</template>
<script>
import argon_src from "../assets/images/blue.png"
import { defineComponent } from 'vue'
import { useI18n } from 'vue-i18n'
import axios from "axios"
import BankAccountsCard from "../components/Cards/BankAccountsCard.vue"
export default defineComponent({
    name:"BankAccounts",
    components:{
        BankAccountsCard
    },
    data(){
        return{
            accounts:[],
            argon_src
        }
    },
    mounted(){
        axios.get('/api/ListOfBankAccount').then(res=>this.accounts=res.data.data)
    },
    setup() {
    const { t } = useI18n({
      inheritLocale: true,
      useScope: 'local'
    })
    return { t }
  }
});
</script>
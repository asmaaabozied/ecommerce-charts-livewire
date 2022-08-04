<template>
<div class="acc-menu-right right-list">          
    <ul class="acc-menu">
        <li v-for="item in items" :key="item" v-bind:class="{ active : item.isSelected, notselected : !item.isSelected }" @click="addStyle(item.key,item.name,item.route)" ref="el">
            <router-link :to="'/account-setting/en/' + item.route"><font-awesome-icon :icon="item.icon" /> {{t(`account-setting.list.${item.title}`)}}</router-link>
        </li>
    </ul>
    <div class="logout">
        <a href=""><font-awesome-icon icon="fas fa-sign-out-alt" /> {{t('account-setting.list.logout')}}</a>
    </div>
</div>
    
</template>
<script>
import { defineComponent } from 'vue'
import { useI18n } from 'vue-i18n'
import router from '../router/routes'
export default defineComponent({
    name:"AccountMenu",
    data(){
        return{
            items:[
                {key:"0",title:"account-details", isSelected:false,icon:"fa-solid fa-user",name:"AccountDetails",route:"details"},
                {key:"1",title:"orders", isSelected:false,icon:"fa-solid fa-shopping-cart",name:"AccountOrders",route:"orders"},
                {key:"2",title:"address", isSelected:false,icon:"fas-solid fa-map-marker-alt",name:"AccountAddress",route:"address"},
                {key:"3",title:"sellers", isSelected:false,icon:"fas-solid fa-user-friends"},
                {key:"4",title:"downloads", isSelected:false,icon:"fas fa-download"},
                {key:"5",title:"change-password", isSelected:false,icon:"fas fa-solid fa-lock"},
                {key:"6",title:"tickets", isSelected:false,icon:"fas fa-ticket-alt",name:"AccountTickets"},
                {key:"7",title:"control-panel", isSelected:false,icon:"fas fa-tachometer-alt"},
                ]
        }
    },
    methods:{
        addStyle(key,name,route){          
            this.items.forEach(element => {
                element.isSelected = false                
            });
            this.toggleSelection(key)
            this.getCurrentComponent(name)
            router.push(`/account-setting/en/${route}`)
           
        },
         toggleSelection(key) {
            const stepsItem = this.items.find(item => item.key === key)
            if (stepsItem) {
                stepsItem.isSelected = !stepsItem.isSelected
            }
        }
    },
    props:{
        getCurrentComponent: Function
    },
    setup() {
    const { t } = useI18n({
      inheritLocale: true,
      useScope: 'local'
    })
    return { t }
  }
    
})
</script>
<style>
</style>
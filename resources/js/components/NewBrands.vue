<template>
<div class="container-xl brands">
    <p class="title">{{t('home.new-brands')}}</p>
    <div class="brands-container">
        <img data-aos="fade-up" v-for="item in brandLogos" :key="item" :src="item.image_path" class="brand-logo"/>
    </div>   
</div>  
</template>
<script>

import { defineComponent } from 'vue'
import { useI18n } from 'vue-i18n'
import axios from "axios"

import AOS from "aos"

export default defineComponent({
    name:"NewBrands",
     
    data(){
        return{
            brandLogos:[]
        }
    },
    mounted(){
        axios.get('/api/ListOfBrands').then(res=>this.brandLogos=res.data.data)
        AOS.init();
    },
    setup() {
    const { t } = useI18n({
      inheritLocale: true,
      useScope: 'local'
    })
    return { t }
  },

});
</script>
<style scoped>
.brands{
    height:auto !important;
   
   /*  margin-bottom: 10rem; */
}
.brands-container{
    margin-bottom: 2rem;
}
.brand-logo{
    width: 251px;
    height: 137px;
    margin-right:1rem;
    margin-bottom: 1rem;
}
.title{
    text-align: left;
    font: normal normal 600 21px Cairo;
    letter-spacing: 1.61px;
    color: #575757;
    margin-bottom: 2rem;
}

</style>
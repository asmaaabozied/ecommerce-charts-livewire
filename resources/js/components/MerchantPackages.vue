<template>
    <div class="container-xl merchant-packages">
        <p>الباقات</p>
        <div class="packages">
            <div data-aos="fade-up" v-for="item in packages" :key="item.id" class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
            <img :src="item.image_path"/>
            <div class="rate-container">
                <span>({{item.count_in_rate}})</span>
                <star-rating v-bind:read-only=true v-bind:rating="item.rate" v-bind:rtl="true" 
                v-bind:show-rating="false" v-bind:star-size="18" active-color="#FDE172" inactive-color="#E4E4E4" class="rate" />      
            </div>
            <div class="packages-footer">
                <img :src="cartIcon"/>
                <div>
                    <p class="title">{{item.name_ar}}</p>
                    <p class="price">{{item.price}} <sub>SAR</sub></p>
                </div>
                
            </div> 
        
        </div>

        </div>
        
    </div>
</template>
<script>
import cartIcon from "../assets/icons/Group 117.svg"

import StarRating from 'vue-star-rating'
import axios from 'axios'
import AOS from "aos"


export default{
    name:"MerchantPackages",
    components:{
        StarRating,
    },
    data(){
        return{
            packages:[],
            cartIcon
        }
    },
    mounted(){
        axios.get('/api/package').then(res=>this.packages=res.data)
        AOS.init();
    }
}
</script>

<style scoped>
.merchant-packages {
    margin-top:4rem
}
.packages{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    position:relative;
    min-height: 308px;
    height:auto;
    margin-bottom: 4rem;
    margin-top: 4rem;
   /*  background-color: blue; */
}
.packages>div{
    position:relative
}
.packages >div>img{
    width:100%; 
    height:250px   
}
.merchant-packages >p{
     text-align: right;
    font: normal normal 600 19px Cairo;
    letter-spacing: 1.61px;
    color: #575757;
    opacity: 0.6;
    margin-bottom: 0;
   /*  margin-bottom: 4rem; */
}
.packages>div:first-of-type{
    padding-right: 0.5rem;
}
.packages>div:last-of-type{
    padding-left:0.5rem
}
.rate-container {
  /* float:right; */
  top:200px;
  left:30px;
  display:block;
  position:absolute;
  margin-right: 1rem;
}
.rate-container>span{
   /*  margin-right:0.5rem; */
    font: normal normal 600 16px/22px Cairo;
    letter-spacing: 1.26px;
    color: #E4E4E4;
    opacity: 1;
    display: inline-block;
    padding-top:0.5rem
}
.rate{
    width:95px;
    display: inline-block;
    display: flex;
align-items: flex-end
}
.price {
    color:#849CAA;
    font: normal normal 600 19px/27px Cairo;
    letter-spacing: 0px;
    color: #849CAA;
    opacity: 1;
    margin-bottom: 0;
}
.packages-footer{
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
}
.title{
    margin-bottom: 0;
    font: normal normal 600 18px/24px Cairo;
    letter-spacing: 1.4px;
    color: #575757;
    opacity: 0.6;
}
.packages-footer img{
    width: 40px;
height: 40px;
}
.packages-footer img:hover{
   transform:  scale(1.2,1.2)
}
@media (max-width:576px){
    .packages>div{
        margin-bottom: 2rem;
        
    }
    .packages>div:first-of-type{
        padding-right:0
    }
    .packages>div:last-of-type{
        padding-right:0
    }

}

</style>
<template>
<div>
    <div class="acc-detail-title">
    <div>
        <font-awesome-icon icon="fas fa-angle-double-right" />
        <h4>{{t('account-setting.list.sellers')}}</h4>
    </div>                      
</div>

</div>
<div class="container-seller-profile-top">
    <div class="seller-profile-top">
       <img :src="src"/>
    </div>
    <div class="seller-contact">
        <div>
            <font-awesome-icon icon="fas fa-share-nodes"  />
            <img :src="chat" @click="addAddress"/>
        </div>
        <div>
            <p>المملكة العربية السعودية</p>
            <font-awesome-icon icon="fas fa-map-marker-alt" style="width:15px;height:15px" />
        </div>
        
    </div>
</div>
<div class="seller-profile-bottom" style="margin-bottom:2rem">
    <div>
        <p>منتجات</p>
        <p>مراجعات</p>
    </div>
    <div class="test">
        <PerfumeRatingCard/>
    </div>

    </div>

    <!-- <SellerContactForm/> -->
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 add-form">
        <div class="acc-detail-mid">
            <div class="acc-details-form">
            <a class="col-12 add-tag close-tag"  @click="closeAddForm">X</a>

                <div class="details-form-title">
                    <p >{{t('sellers.create-support')}}</p>
                </div>
                <p v-if="errorMsg !== ''" style="color:red">{{errorMsg}}</p>
                <form>
                    <label for="address">{{t('sellers.subject')}}
                        <input type="text" id="address" v-model="supportSubject" @focus="deleteErrorMsg">
                    </label>
                    <label for="city">{{t('sellers.message')}}
                        <textarea v-model="supportMsg" id="city" @focus="deleteErrorMsg" style="width:100%;margin-top: 0.5rem;" />
                    </label>
                  
                    <button @click="submitForm($event)" class="col-12 done-btn">{{t('sellers.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import { useI18n } from 'vue-i18n'
import src from "../assets/images/images.png"
import chat from "../assets/icons/comment.svg"
/* import PerfumeRatingCard from './components/PerfumeRatingCard.vue' */
import PerfumeRatingCard from './PerfumeRatingCard.vue'
/* import SellerContactForm from "./SellerContactForm.vue"
 */
export default defineComponent({
    name:"SellerDetails",
    components:{
        PerfumeRatingCard
    }, 
    methods:{
        addAddress(){
        document.querySelector('.add-form').style.maxHeight="550px"
        document.querySelector('.overlay-div').style.display="block"   
        },
        closeAddForm(){  
        document.querySelector('.add-form').style.maxHeight="0"
        document.querySelector('.overlay-div').style.display="none"
        },
        test(event){
        let index = event.target.dataset.index
        let form =document.querySelector(`.edit-form-${index}`)
        form.classList.toggle("form-max-height")     
        },
        deleteErrorMsg(){
            this.errorMsg=""
        },
        submitForm(e){
        e.preventDefault()

        if(!this.supportSubject){
            this.errorMsg ='Please, enter your email'
        }     
        else if(!this.supportMsg){
            this.errorMsg = 'Please, enter your first name'
        }   
        else {
            let data = {
                subject:this.supportSubject,
                message:this.supportMsg,
            }
            this.errorMsg =""
            console.log(data)
        }  
        },
    },
    data(){
        return{
            src,chat,errorMsg:''
        }
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
<style scoped>
.seller-profile-top{
    background-image: url('../assets/images/BG-card1.png');
    background-repeat: no-repeat;
    background-size:cover;
    position:relative;
}
.test{
    margin-bottom: 2rem;
    width:212px;
}
.test img{
}
</style>
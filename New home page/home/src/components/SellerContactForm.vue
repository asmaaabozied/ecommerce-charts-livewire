<template>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 add-form">
        <div class="acc-detail-mid">
            <div class="acc-details-form">
            <a class="col-12 add-tag close-tag"  @click="closeAddForm">X</a>

                <div class="details-form-title">
                    <p>{{t('account-address.add-address')}}</p> <!-- <i class="fas fa-edit"></i> -->
                </div>
                <form action="">
                    <label for="address">{{t('account-address.street-address')}}
                        <input type="text" id="address" >
                    </label>
                    <label for="city">{{t('account-address.city')}}
                        <input type="text" id="city" >
                    </label>
                    <label for="region">{{t('account-address.region')}}
                        <input type="text" id="region" >
                    </label>
                    <button class="col-12 done-btn">{{t('account-address.add')}}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    name:"SellerContactForm",
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
    }
    }
}
</script>
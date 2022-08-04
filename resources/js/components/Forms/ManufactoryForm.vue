<template>
   <section class="form_register">
	<div class="wrapper" style="margin-bottom:0">
		<div class="row">
			<article class="part card-details col-12 " style="padding:2rem" >
				<h1>
				{{t('manufacturing.perfume-industry')}}
				</h1>
				<h5><span><i class="fas fa-info-circle"></i></span>{{t('manufacturing.limited-number')}}</h5>
				<p style="color:red">{{errorMsg}}</p>
				<div class="row">
					<div class="col-12">
				<form>
      
					<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-12">
						<input type="text" id="email" v-model="userEmail" @focus="deleteErrorMsg" name="email" placeholder="email" spellcheck="false" data-ms-editor="true">
						<input type="text" id="fname" v-model="firstName" @focus="deleteErrorMsg" name="firstname" placeholder="name" spellcheck="false" data-ms-editor="true">
						
					</div>

					<div class="col-xl-4 col-lg-4 col-md-4 col-12">
					
						<input type="text" id="adr" v-model="address" @focus="deleteErrorMsg" name="address" placeholder="address" spellcheck="false" data-ms-editor="true">
						<input type="text" id="The_required_number" @focus="deleteErrorMsg" v-model="requiredNumber" name="The_required_number" placeholder="The required number" spellcheck="false" data-ms-editor="true">            

					</div>
					<div class="col-xl-4 col-lg-4 col-md-4 col-12">
					<div class="telphone">
						<input type="tel" v-model="phone" @focus="deleteErrorMsg" placeholder="Mobile number">
						<select name="cars" id="cars" v-model="countryCode">
							<option value="+966">+966</option>
							<option value="+965">+965</option>
							<option value="+967">+967</option>
							<option value="+964">+964</option>
						</select>
						</div>
						<input type="text" id="share_capital" v-model="shareCapital" @focus="deleteErrorMsg" name="share_capital" placeholder="share capital" spellcheck="false" data-ms-editor="true" data-toggle="tooltip" data-placement="top" title="Preference is determined by money">
						<button class="btn" @click="submitForm($event)">{{t('merchant.submit')}}</button>

					</div>
					
					</div>
				
                </form>
				</div>
			
				</div>
			</article>
		</div>
		</div>
</section>
</template>
<script>
import { defineComponent } from 'vue'
import { useI18n } from 'vue-i18n'
import axios from 'axios';

export default defineComponent({
    name:"ManufactoryForm",
	data(){
        return{
            errorMsg:'',countryCode:'+966'
        }
    },
	methods:{
        deleteErrorMsg(){
            this.errorMsg=""
        },
        submitForm(e){
        e.preventDefault()
        console.log(this.countryCode)

        if(!this.userEmail){
            this.errorMsg ='Please, enter your email'
        }
         else if(!this.validate(this.userEmail)){
            this.errorMsg="Please, check email format"
        }
        else if(!this.firstName){
            this.errorMsg = 'Please, enter your first name'
        }
        else if(!this.address){
            this.errorMsg = 'Please, enter your address'
        }
        else if (!this.requiredNumber){
            this.errorMsg = 'Please, enter required number'
        }
        else if(!this.isNumber(this.requiredNumber)){
            this.errorMsg ='please, enter numbers only'
            console.log(this.isNumber(this.requiredNumber))
        }
        else if(!this.phone){
            this.errorMsg = "Please, enter your phone"
        }
        else if(!this.isNumber(this.phone)){
            this.errorMsg ='Please, enter numbers only'
        }
        else if(!this.shareCapital){
            this.errorMsg = "Please, enter share capital"
        }      
        else {
            let data = {
                email:this.userEmail,
                address:this.address,
                name:this.firstName,
                required_number:this.requiredNumber,
                share_capital:this.shareCapital,
                phone: this.countryCode + this.phone
            }
            this.errorMsg =""
			console.log(data)
			
            axios.post('/api/create_manufacturingform',data).then(res=>console.log(res))
        }
        
        },
        isNumber(value){
        return /^\d+$/.test(value);
        },
        validate(email){
            return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
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
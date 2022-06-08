<template>
	<div class="container">
		<!-- <h2>{{ greeting }}</h2> -->
		<div class="card mt-5">
			<div class="card-head p-4" style="background:#6B8085;">
				<h3 class="text-center"><strong>Notification Form</strong></h3>
			</div>
			<div class="card-body p-4" style="background-color:#C7D2D7;">
				<form @submit.prevent="onSubmit" class="add-form">
					<input type="hidden" name="_token" :value="csrf"> 
					<div class="row mb-5">
					    <div class="form-group col-md-6">
					      <label for="firstname" class="txt-color">First Name</label>
					      <input type="text" class="form-control" id="firstName" placeholder="First Name" v-model="firstName" required>
					    </div>
					    <div class="form-group col-md-6">
					      <label for="lastname" class="txt-color">Last Name</label>
					      <input type="text" class="form-control" id="lastName" placeholder="Last Name" v-model="lastName" required>
					    </div>
					 </div>
					<div class="">
					 <p class="txt2-color">How would you prefer to be notified?</p>
					</div>
					<div class="row mb-4">
					    <div class="form-group col-md-6">
					    	<div class="form-check mb-2">
						        <input class="form-check-input" type="checkbox" id="gridCheck1">
						        <label class="form-check-label txt-color" for="gridCheck1">
						          Email 
						        </label>
						    </div>
					      	<input type="email" class="form-control" id="inputEmail4" placeholder="Email" v-model="email">
					    </div>
					    <div class="form-group col-md-6">
					    	<div class="form-check mb-2">
						        <input class="form-check-input" type="checkbox" id="gridCheck1">
						        <label class="form-check-label txt-color" for="gridCheck1">
						          Phone Number
						        </label>
						    </div>
					      	<input type="text" class="form-control" id="phone" placeholder="Phone Number" v-model="phoneNumber">
					    </div>
					</div>
					<div class="row mb-5">
						<div class="form-group col-md-6 mx-auto">
							<label for="selectSupervisor" class="txt-color">Supervisor</label>
							<select class='form-control col-md-4' v-model="supervisoId" required>
								<option value="0" selected>Select ....</option>
                                <option v-for='supervisor in supervisors' :value='supervisor.id'>{{ supervisor.jurisdiction }} - {{ supervisor.lastName }}, {{ supervisor.firstName }}</option>
                            </select> 
                            <div class="spinner-border" role="status" id="loading"></div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="form-group">
							<div class="text-center">
								<button type="submit" class="btn submit-btn">SUBMIT</button>
							</div>
						</div>
					</div>					 
				</form>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
	    data(){
	    	return {
	    		supervisors: [],

    			firstName: '',
    			lastName: '',
    			email: '',
    			phoneNumber: '',
    			supervisoId: '0',

    			csrf: "",
	    	}
	    },

	    methods:{
	    	getSupervisorData: function(){
	    		axios.get('/api/supervisors')
	    			.then(function (response){
	    				this.supervisors = response.data;
	    				document.getElementById('loading').style.display = "none";

	    			}.bind(this));
	    	},
	    	onSubmit(){
             
                const NewInformation = {

                    firstName : this.firstName,
                    lastName : this.lastName,
                    email : this.email,
                    phoneNumber : this.phoneNumber,
                    supervisor : this.supervisoId,
                    token : this.$attrs['csrf'],
                }
                this.$emit('add-information', NewInformation)
                console.log(NewInformation);
                
                axios.post('/api/submit', NewInformation)
                	.then(function(response){
                		//console.log(response.data);

                		this.firstName = '',
		                this.lastName = '',
		                this.email = '',
		                this.phoneNumber = '',
		                this.supervisoId = ''
                	}.bind(this));

                
            }
	    },
	    mounted: function(){
	    	this.getSupervisorData()
	    	
	    },
	}
</script>
<template>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <div class="alert alert-success alert-dismissible" role="alert" v-if="successMessage">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-circle-notch text-success fa-spin fa-2x" aria-hidden="true"></i> <strong>{{ successMessage }}</strong>  
                    </div>

                    <div class="alert alert-danger alert-dismissible" role="alert" v-if="errorMsg">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Error!</strong> {{ errorMsg }}
                    </div>
                    <Form @submit="admLogin" :validation-schema="schema">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Admin Login</p>
                        </div>

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <Field type="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" />
                            <ErrorMessage class="text-danger" name="email" as="div" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <Field type="password" name="password" class="form-control form-control-lg"
                            placeholder="Enter password" />
                            <ErrorMessage class="text-danger" name="password" as="div" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import { Form, Field, ErrorMessage } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';
import router from '../router';

export default {
    setup(){
        if(localStorage.getItem('token')){
            router.push('dashboard');
        }
    },
    components: {
        Form,
        Field,
        ErrorMessage
    },
    data() {
        const schema = yup.object({
            email: yup.string().required('Email is required').email(),
            password: yup.string().required('Password is required').min(6)
        });

        return {
            schema,
            successMessage: '', // Add reactive successMessage
            errorMsg: '' // Add reactive errorMsg
        };
    },
    methods: {
        redirectToDashboard(){

            setTimeout(() => {

                router.push('dashboard');

            },5000);
        },
        admLogin(values) {
            // Clear previous messages
            this.successMessage = 'Wait...';

            this.errorMsg = '';

            // console.log(values);

            // Make the POST request
            // add header
            let headers = new Headers({'Content-Type': 'application/json;charset=utf-8'});

            axios.post(window.api_url + 'admin/login', values,headers).then(response => {

                let res = response.data; // Assuming response.data is already parsed
                // Handle success or error based on status
                if (res.status == 200) {

                    this.successMessage = res.message + "! Redirecting To Dashboard";

                    localStorage.setItem('token', res.token);

                    this.redirectToDashboard();

                } else {

                    this.errorMsg = res.message;

                }
            }).catch(error => {

                if (error.response && error.response.data) {

                    let res = error.response.data;

                    this.errorMsg = res.message || 'An unexpected error occurred. Please try again later.';

                } else {

                    this.errorMsg = 'Network error. Please check your connection.';

                }

            });
        }
    } 
}
</script>
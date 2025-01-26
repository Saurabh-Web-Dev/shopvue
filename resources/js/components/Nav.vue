<template>
    <!-- nav section start -->
    <div class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <router-link to="/">Home</router-link>
                    <router-link to="/products">Products</router-link>
                    <router-link to="/about">About</router-link>
                </div>
                <span class="toggle_icon" onclick="openNav()"><img src="../../../public/images/toggle-icon.png"></span>
                <a class="logo" href="index.html"><img src="../../../public/images/logo.png"></a>
                <form class="form-inline ">
                    <div class="login_text">
                        <ul>
                            <li>
                                <router-link to="/user/profile" v-if="isAuthenticated">
                                    <img src="../../../public/images/user-icon.png">
                                </router-link>
                                <router-link to="/user/login" v-else>
                                    <button type="button" class="btn btn-outline-secondary">Login</button>
                                </router-link>
                            </li>
                            <li><a href="#"><img src="../../../public/images/bag-icon.png"></a></li>
                            <li><a href="#"><img src="../../../public/images/search-icon.png"></a></li>
                        </ul>
                    </div>
                </form>
            </nav>
        </div>
    </div>
      <!-- nav section end -->
</template>

<script>
import {ref} from 'vue';

export default {
    name: "Nav",
    setup() {
        localStorage.removeItem('token');
        const isAuthenticated = ref(false);
        if(localStorage.getItem('token')) {
            isAuthenticated.value = true;
        }
        return {isAuthenticated};
    }
};
</script>
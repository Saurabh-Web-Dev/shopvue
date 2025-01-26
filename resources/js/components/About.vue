<template>
    <Nav></Nav>
     <!-- about section start -->
     <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_main">
               <div class="row">
                  <div class="col-md-6">
                     <div class="about_taital_main">
                        <h1 class="about_taital">About Our beauty sotore</h1>
                        <p class="about_text">labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatlabore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                        <div class="readmore_bt"><a href="#">Read More</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div><img src="../../../public/images/about-img.png" class="image_3"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
       <Footer></Footer>
</template>
<script>
import Footer from './Footer.vue';
import Nav from './Nav.vue';
export default {
    name: "About",
    components: {
        Footer,
        Nav
    }
}
</script>
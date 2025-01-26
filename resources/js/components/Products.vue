<template>
    <Navbar></Navbar>
    <div class="product_section layout_padding">
        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Our Products</h1>
                <p class="product_text">incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            </div>
        </div>
        <div class="product_section_2 layout_padding">
            <div class="row">
                <Ourproducts />
            </div>
            
            <div class="seemore_bt"><a href="#">See More</a></div>
        </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import Navbar from './Nav.vue';
import Footer from './Footer.vue';
import Ourproducts from './Ourproducts.vue';
export default {
    name: "Products",
    components: {
        Navbar,
        Footer,
        Ourproducts
    },
}
</script>

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$('#addModal').on('show.bs.modal', function(e) {
	

    //get data-id attribute of the clicked element
    var route = $(e.relatedTarget).data('item-route');
    var recipeID = $(e.relatedTarget).data('recipe-id');
    var itemName = $(e.relatedTarget).parent().parent().find("span").text();
    console.log(itemName);

    //populate the textbox
    $(e.currentTarget).find('form[id="itemForm"]').attr('action', "/"+route);
    $(e.currentTarget).find('input[name="itemName"]').val(itemName);
    $(e.currentTarget).find('input[name="recipeID"]').val(recipeID);
});

$('#btnFridgeDelete').click(function(e){
    e.preventDefault();
    $('#removeFridge').submit();
});

$('#btnShopDelete').click(function(e){
    e.preventDefault();
    $('#removeShop').submit();
});

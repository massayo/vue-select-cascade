<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">Laravel Vue Dependent Dropdown Example - ItSolutionStuff.com</div>  

                    <div class="card-body">

                        <div class="form-group">

                            <label>Select Country:</label>

                            <select class='form-control' v-model='country' @change='getStates()'>

                              <option value='0' >Select Country</option>

                              <option v-for='data in countries' :value='data.id'>{{ data.name }}</option>

                            </select>

                        </div>

                        

                        <div class="form-group">

                            <label>Select State:</label>

                            <select class='form-control' v-model='state'>

                              <option value='0' >Select State</option>

                              <option v-for='data in states' :value='data.id'>{{ data.name }}</option>

                            </select>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</template>

   

<script>  

    export default {

        mounted() {

            console.log('Component mounted.')

        },

        data(){

            return {

                country: 0,

                countries: [],

                state: 0,

                states: []

            }

        },

        methods:{

            getCountries: function(){

              axios.get('/api/getCountries')

              .then(function (response) {

                 this.countries = response.data;

              }.bind(this));         

            },

            getStates: function() {

                axios.get('/api/getStates',{

                 params: {

                   country_id: this.country

                 }

              }).then(function(response){

                    this.states = response.data;

                }.bind(this));

            }

        },

        created: function(){

            this.getCountries()

        }

    }

</script>


<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

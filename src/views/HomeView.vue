<template>
  <Banner />
  <div class="main-container">
    <h1>Meus Contatos: </h1>
    <Dashboard />
  </div>
</template>

<script>
import Banner from '../components/Banner.vue'
import Dashboard from '../components/Dashboard.vue'


  export default{
    name: 'HomeView',
    components: {
      Banner,
      Dashboard
    },
    data(){
      return {
        contatos: null
      }
    }
  }

</script>

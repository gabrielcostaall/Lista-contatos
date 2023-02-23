<template>
  <div class="main-container">
    <h1>Editar Contato:</h1>
    <ContactEditForm />
  </div>
</template>

<script>
import ContactEditForm from '../components/ContactEditForm.vue'


  export default{
    name: 'EditContact',
    components: {
      ContactEditForm
    },
    data(){
      return {
        contact: null
      }
    }
  }

</script>

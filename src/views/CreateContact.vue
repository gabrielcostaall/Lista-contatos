<template>
  <div class="main-container">
    <h1>Criar Contato:</h1>
    <ContactForm />
  </div>
</template>

<script>
import ContactForm from '../components/ContactForm.vue'


  export default{
    name: 'CreateContact',
    components: {
      ContactForm
    }
  }

</script>

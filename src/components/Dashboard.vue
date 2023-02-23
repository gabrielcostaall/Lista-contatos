<template>
    <div id="contact-table">
        <div>
            <div id="contact-table-heading">
                <div>Nome: </div>
                <div>Telefone: </div>
                <div>Email: </div>
                <div>Imagem: </div>
                <div>Ações: </div>
            </div>
        </div>
            <div v-if="contactLength === 0">
                <h2>Você ainda não possui contatos, <a href="/createContact">clique aqui</a> para adicionar.</h2>
            </div>
        <div id="contact-table-rows">
            <div class="contact-table-row" v-for="contact in contacts" :key="contact.id">
                <div>{{ contact.nome }} </div>
                <div>{{ contact.telefone }}</div>
                <div>{{ contact.email }}</div>
                <img src="/img/profile.png" alt="">
                <div id="btns"> 
                    <button class="btn" @click="deleteContact(contact.id)"> 
                        Apagar Contato
                    </button>
                    <router-link :to="`editContact/${contact.id}`">
                        <button id="btn2" class="btn"> Editar Contato</button>
                    </router-link>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Dashboard',
    data (){
        return {
            contacts: null,
            contact_id: null,
            contactLength: null,
            backendUrl: process.env.VUE_APP_BACKEND_URL
        }
    },
    methods: {
        async getContacts(){
            const req = await fetch (`${this.backendUrl}/api/contacts`)
            const data = await req.json();

            this.contacts = data;
            this.contactLength = this.contacts.length;
        },
        async deleteContact(id){
            const req = await fetch(`${this.backendUrl}/api/contacts/${id}`, {
                method: "DELETE"
            });
            const res = await req.json();

            this.getContacts();
        }
    },
    mounted(){
        this.getContacts();
    }
}
</script>
<style scoped>
    #contact-table{
        max-width: 1200px;
        margin: 0 auto;
    }

    #contact-table-heading,
    #contact-table-rows,
    #contact-table-row {
        display: flex;
        flex-wrap: wrap;
        
    }

    #contact-table-heading {
        font-weight: bold;
        padding: 12px;
        border-bottom: 3px solid #333;
    }

    #contact-table-heading div, 
    .contact-table-row div{
        width: 19%;
    }
    .contact-table-row {
        width: 100%;
        padding: 12px;
        border-bottom: 1px solid #CCC;
        display: flex;
        flex-direction: row;
        justify-content: space-between 10px;
        align-items: center;
        
        
       
    }

    #contact-table-heading .contact-id {
        width: 5%;
    }

    .btn {
        background-color: transparent;
        color: #222;
        font-weight: bold;
        border: 2px solid #222;
        padding: 10px;
        font-size: 16px;
        margin: 0 auto;
        cursor: pointer;
        transition: .5s;
        
    }

    .btn:hover {
        background-color: #222;
        color: #FFF;
        border: 2px solid transparent;
    }
    img {
        border-radius: 50%;
        width: 150px;
        border: 2px solid #222222cb;
    }
    h2{
    text-align: center;
    font-size: 17px;
    color: #222;
    margin: 0 auto;
    margin-top: 60px;
  }
  a {
     color: #04b3d6;
     text-decoration: none;
     transition: .5s;
  }

  a:hover {
    color: #0482d6;
  }
   #btns {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 60px;
  }
  #btn2 {
    margin-left: 5px;
  }
  
</style>
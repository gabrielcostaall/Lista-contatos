<template>
    <div>
        
        <div>
            <form id="contact-form" @submit="updateContact">
                <div class="input-container">
                    <label for="nome">Nome do contato: </label>
                    <input type="text" name="nome" id="nome" v-model="nome" placeholder="Ex: Jane Doe">
                </div>

                <div class="input-container">
                    <label for="telefone">Telefone: </label>
                    <input type="text" name="telefone" id="telefone" v-model="telefone" placeholder="Ex: (00) 0000-0000">
                    </div>

                    <div class="input-container">
                    <label for="email">E-mail: </label>
                    <input type="text" name="email" id="email" v-model="email" placeholder="Ex: janedoe@email.com">
                    </div>

                    <div id="opcionais-container" class="input-container">
                    <label id="img-title" for="opcionais">Envie uma imagem: </label>
                     <FileInput />
                </div>

                    <div class="input-container">
                        
                            <input type="submit" class="submit-btn" value="Editar Contato!">
                    </div>
                    
            </form>
            <Message :msg="msg" v-if="msg"/>
        </div>
    </div>
</template>

<script>
import FileInput from './FileInput.vue'
import Message from './Message.vue'

export default {
    name: 'ContactEditForm',
    data(){
        return {
            nome: null,
            telefone: null,
            email: null,
            img: null,
            msg: null,
            id: null,
            backendUrl: process.env.VUE_APP_BACKEND_URL
        }
    },
   
    components: {
        FileInput,
        Message
    },
    methods: {
        async updateContact(e){
            e.preventDefault();
            const data = {
                nome: this.nome,
                telefone: this.telefone,
                email: this.email,
                img: this.img
            }
            
            const dataJson = JSON.stringify(data);
            const req = await fetch (`${this.backendUrl}/api/contacts/${this.id}`, {
                method: "PUT",
                headers: {"Content-Type": "application/json"},
                body: dataJson
            }) 
            
            const res = await req.json();
            console.log(res);
            
           
           //Mensagem do sistema
            this.msg = "Contato editado com sucesso!";

            
            setTimeout(() => this.$router.push('/'), 1000);

           
        },
        async getContact(id){
            const req = await fetch (`${this.backendUrl}/api/contacts/${id}`)
            const data = await req.json();
           

             this.nome= data[0].nome;
             this.telefone= data[0].telefone;
             this.email= data[0].email;
             this.img= data[0].img;
             this.id = data[0].id;
              
            
        }
    },
    mounted(){
        this.getContact(this.$route.params.id);
    }
}
</script>

<style scoped>
    #contact-form {
        max-width: 400px;
        margin: 0 auto;
    }

    .input-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    label{
        font-weight: bold;
        margin-bottom: 15px;
        color: #222;
        padding: 5px 10px;
        border-left: solid #04b3d6;
    }

    input, select {
        padding: 5px 10px;
        width: 300px;
    }

    #img-title {
        width: 100%;
    }

    .checkbox-container {
        display: flex;
        align-items: flex-start;
        width: 50%;
        margin-bottom: 20px;
    }

    .checkbox-container span, .checkbox-container input {
        width: auto;
    }
    .checkbox-container span {
        margin-left: 6px;
        font-weight: bold;
    }

    .submit-btn {
        background-color: #222;
        color: #04b3d6;
        font-weight: bold;
        border: 2px solid #222;
        padding: 10px;
        font-size: 16px;
        margin: 0 auto;
        cursor: pointer;
        transition: .5s;
        
    }

    .submit-btn:hover {
        background-color: transparent;
        color: #222;
    }

</style>
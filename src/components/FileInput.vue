<template>
    <div>
        <input  id="inpt" type="file" @change="onFileSelected">
       
        <button @click="onUpload">Enviar Imagem</button>
    </div>
</template>
<script>
export default {
    name: "FileInput",
    data(){
        return{
            selectedFile: null
        }
    },
    methods: {
        onFileSelected(e){
            this.selectedFile = e.target.files[0]
            console.log(this.selectedFile);
        },
        onUpload(){

        }
    }
}
</script>
<style scoped>
   
   button {
    background-color: #e0dddd;
    display: flex;
    border: none;
    padding: 5px 10px 5px 10px;
    margin: 0 auto;
    margin-top: 15px;
    transition: .5s;
    cursor: pointer;
    
   }
   button:hover {
    background-color: #FFF;
  
   }
</style>
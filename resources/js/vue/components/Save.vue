<template>
<h1 v-if="post"> Update Post <span class="font-bold"> {{ post.title }} </span></h1>
<h1 v-else> New Post </h1>

<form @submit.prevent="submit">
    <div class="grid grid-cols-2 gap-2">
        <div class="col-span-2">
            <o-field label="Title" :variant="errors.title ? 'danger' : 'primary'" :message="errors.title">
                    <o-input v-model="form.title" value=""></o-input>        
            </o-field>
        </div>

        <o-field label="Description" :variant="errors.description ? 'danger' : 'primary'" :message="errors.description">
                <o-input v-model="form.description" type="textarea" value=""></o-input>        
        </o-field>

            <o-field label="Content" :variant="errors.content ? 'danger' : 'primary'" :message="errors.content">
                <o-input v-model="form.content" type="textarea" value=""></o-input>        
        </o-field>

        <o-field label="Category" :variant="errors.category_id ? 'danger' : 'primary'" :message="errors.category_id">
                <o-select v-model="form.category_id" placeholder="Choose a Category" value="">
                    <option v-for="c in categories" v-bind:key="c.id" :value="c.id">{{ c.name }}</option>
                </o-select>        
        </o-field>

        <o-field label="Posted" :variant="errors.posted ? 'danger' : 'primary'" :message="errors.posted">
                <o-select v-model="form.posted" placeholder="Choose a status" value="">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </o-select>        
        </o-field>
        <div class="flex gap-4" v-if="post">
            <o-upload v-model="file">
                <o-button tag="a" variant="primary">
                    <o-icon icon="upload"></o-icon>
                    <span>Click to upload</span>
                </o-button>
            </o-upload>
        
            <o-button @click="uploadFile" icon-left="upload">Upload</o-button>
        </div>

    </div>
    <br/>
   <o-button native-type="submit" variant="primary"> Send </o-button>
</form>
</template>

<script>
export default {
    data(){
      return {
        categories:[],
        form: {
            title:"",
            description:"",
            content:"",
            category_id:"",
            posted:""
        },
        errors: {
            title:"",
            description:"",
            content:"",
            category_id:"",
            posted:""
        },
        post: "",
        file: null
      }  
    },
    async mounted(){
        if(this.$route.params.slug){
            await this.getPost()
            this.initPost()
        }
        this.getCategories()
    },    
    methods: {
        clearErrorsForm(){
            this.errors.title = ''
            this.errors.description = ''
            this.errors.content = ''
            this.errors.category_id = ''
            this.errors.posted = ''
        },
        getCategories(){
            this.$axios.get("/api/category/all").then(res => {
                this.categories = res.data
            })
        },
        async getPost(){
            this.post = await this.$axios.get("/api/post/slug/"+this.$route.params.slug);
            this.post = this.post.data
        },
        initPost(){
            this.form.title = this.post.title
            this.form.description = this.post.description
            this.form.content = this.post.content
            this.form.category_id = this.post.category_id
            this.form.posted = this.post.posted
        },
        uploadFile(){

            const formData = new FormData()
            formData.append("image",this.file)

            this.$axios.post("/api/post/upload/"+this.post.id,formData,{
                headers: {
                    "Content-type": "multipart/form-data"
                }
            }).then((res) => {
                console.log(res)
            }).catch((error) => {
                console.log(error)
            })
            
        },
        submit(){
            
            this.clearErrorsForm()

            if(!this.post)

                return this.$axios.post("/api/post", this.form).then(res => {
                    this.$oruga.notification.open({
                        message: 'Register created!',
                        position: 'bottom-right',
                        duration: 4000,
                        closable: true
                    })
                }).catch(error => {
                    console.log(error.response.data)

                    if(error.response.data.title)
                        this.errors.title = error.response.data.title[0] 
                    if(error.response.data.description)
                        this.errors.description = error.response.data.description[0] 
                    if(error.response.data.content)
                        this.errors.content = error.response.data.content[0] 
                    if(error.response.data.category_id)
                        this.errors.category_id = error.response.data.category_id[0] 
                    if(error.response.data.posted)
                        this.errors.posted = error.response.data.posted[0]     
                })
            
            this.$axios.patch("/api/post/"+this.post.id, this.form).then(res => {
                    this.$oruga.notification.open({
                        message: 'Register updated!',
                        position: 'bottom-right',
                        duration: 4000,
                        closable: true
                    })
                }).catch(error => {
                    console.log(error.response.data)

                    if(error.response.data.title)
                        this.errors.title = error.response.data.title[0] 
                    if(error.response.data.description)
                        this.errors.description = error.response.data.description[0] 
                    if(error.response.data.content)
                        this.errors.content = error.response.data.content[0] 
                    if(error.response.data.category_id)
                        this.errors.category_id = error.response.data.category_id[0] 
                    if(error.response.data.posted)
                        this.errors.posted = error.response.data.posted[0]     
                })
        }
    }
}
</script>

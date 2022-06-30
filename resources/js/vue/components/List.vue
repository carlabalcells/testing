<template>
 <div>

    <o-modal v-model:active="confirmDeleteActive"> 
        <div class="p-4">
            <p>Are you sure you want to delete this register?</p>
        </div>
        <div class="flex flex-row-reverse gap-2 bg-gray-200 p-2">
            <o-button @click="deletePost()" variant="danger">Delete</o-button> 
            <o-button @click="confirmDeleteActive=false">Cancel</o-button>
        </div>        
    </o-modal>

    <h1> List of Posts </h1>

    <!--<router-link :to="{name:'save'}">Create</router-link>-->
    <o-button iconLeft="plus" @click="$router.push({name:'save'})">Add</o-button>

    <div class="mb-5"></div>

    <o-table :data="posts.current_page && posts.data.length ==0 ? [] : posts.data" :loading="isLoading">
        <o-table-column field="id" label="ID" numeric v-slot="p">{{ p.row.id }}</o-table-column>
        <o-table-column field="title" label="Title" v-slot="p">{{ p.row.title }}</o-table-column>
        <o-table-column field="category" label="Category" v-slot="p">{{ p.row.category.name }}</o-table-column>
        <o-table-column field="posted" label="Posted" v-slot="p">{{ p.row.posted }}</o-table-column>
        <o-table-column field="created_at" label="Created At" v-slot="p">{{ p.row.created_at }}</o-table-column>
        <o-table-column field="slug" label="Actions" v-slot="p">
            <router-link class="mr-5" :to="{name:'save', params: {'slug': p.row.slug}}">Modify</router-link>
            <o-button iconLeft="delete" rounded size="small" variant="danger" @click="deletePostRow=p; confirmDeleteActive=true"> Delete </o-button>
        </o-table-column>
    </o-table>

    <br>
    
    <o-pagination
    v-if="posts.current_page && posts.data.length > 0"
      @change="updatePage"
      :total="posts.total"
      v-model:current="currentPage"
      :range-before="2"
      :range-after="2"
      order="centered"
      size="small"
      :simple="false"
      :rounded="true"
      :per-page="posts.per_page"
    >
    </o-pagination>

 </div>
</template>

<script>

export default {

    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
            confirmDeleteActive: false,
            deletePostRow: ""
        };
    },    
    methods: {
        updatePage(){
            setTimeout(this.listPage, 100);
        },        
        listPage(){
            console.log(this.currentPage);
            this.isLoading = true;
            this.$axios.get("/api/post?page="+this.currentPage).then((res) => {
                this.posts = res.data;
                console.log(this.posts);
                this.isLoading = false;
            });
        },
        deletePost(){
            this.posts.data.splice(this.deletePostRow.index,1)
            this.$axios.delete("/api/post/"+this.deletePostRow.row.id)
            this.confirmDeleteActive = false
            this.$oruga.notification.open({
                message: 'Register deleted!',
                position: 'bottom-right',
                variant: 'danger',
                duration: 4000,
                closable: true
            })
        }
    },
    async mounted() {
        this.listPage()
    },
}
</script>


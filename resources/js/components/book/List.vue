<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to='{name:"bookAdd"}' class="btn btn-primary">Create</router-link>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Book</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="books.length > 0">
                                <tr v-for="(book,key) in books" :key="key">
                                    <td>{{ book.id }}</td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.description }}</td>
                                    <td>
                                        <router-link :to='{name:"bookEdit",params:{id:book.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteBook(book.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Books Found.</td>
                                </tr>
                            </tbody>
                        </table>
                        <v-pagination
                            v-model="page"
                            :pages="10"
                            :range-size="1"
                            active-color="#DCEDFF"
                            @update:modelValue="getBooks"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"books",
    data(){
        return {
            books:[],
            page: 1
        }
    },
    mounted(){
        this.getBooks()
    },
    
    methods:{
        async getBooks(page){
            await this.axios.get(`/api/book?page=${page}`).then(response=>{
                this.books = response.data.data;
            }).catch(error=>{
                console.log(error)
                this.books = []
            })
        },
        deleteBook(id){
            if(confirm("Are you sure to delete this book ?")){
                this.axios.delete(`/api/book/${id}`).then(response=>{
                    this.getBooks()
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
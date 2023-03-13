<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Book</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input required type="text" class="form-control" v-model="book.title" size="50">
                                </div>
                                <span v-if="notify['title']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.title[0] }} </span>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Author</label>
                                    <input required type="text" class="form-control" v-model="book.author" size="50">
                                </div>
                                <span v-if="notify['author']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.author[0] }} </span>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Genre</label>
                                    <input required type="text" class="form-control" v-model="book.genre" size="50">
                                </div>
                                <span v-if="notify['genre']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.genre[0] }} </span>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input required type="text" class="form-control" v-model="book.description" size="255">
                                </div>
                                <span v-if="notify['description']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.description[0] }} </span>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input required type="text" class="form-control" v-model="book.isbn" size="14">
                                </div>
                                <span v-if="notify['isbn']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.isbn[0] }} </span>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Published</label>
                                    <input required type="date" class="form-control" v-model="book.published">
                                </div>
                                <span v-if="notify['published']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.published[0] }} </span>
                            </div>                        
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Publisher</label>
                                    <input required type="text" class="form-control" v-model="book.publisher" size="255">
                                </div>
                                <span v-if="notify['publisher']" class="invalid_feedback" style="display:block; color:red;" role="alert">{{ notify.publisher[0] }} </span>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"update-book",
    data(){
        return {
            book:{
                title:"",
                author:"",
                genre:"",
                description:"",
                isbn:"",
                // image:"",
                published:"",
                publisher:"",
                _method:"patch"
            },
            notify:''
        }
    },
    mounted(){
        this.showBook()
    },
    methods:{
        async showBook(){
            await this.axios.get(`/api/book/${this.$route.params.id}`).then(response=>{
                const { title, author, genre, description, isbn, published, publisher } = response.data
                this.book.title = title
                this.book.genre = genre
                this.book.author = author
                this.book.description = description
                this.book.isbn = isbn
                this.book.published = published
                this.book.publisher = publisher
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.post(`/api/book/${this.$route.params.id}`,this.book).then(response=>{
                this.$router.push({name:"bookList"})
            }).catch(error=>{
                this.notify = error.response.data.errors;
                // console.log(error.response.data.errors);
            })
        }
    }
}
</script>
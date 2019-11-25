<template>
    <div class="container mt-5">
        <BookList 
            v-bind:books="books" 
            @delete-book='deleteBook'
            @accept-book-to-edit='acceptBookToEdit'
        />
        <ModalCreate @add-book='addBook'/>
        <ModalEdit @edit-book='editBook' v-bind:book="book"/>
    </div>
</template>

<script>

import BookList from '../components/AuthorBooks/BookList'
import ModalCreate from '../components/AuthorBooks/ModalCreate'
import ModalEdit from '../components/AuthorBooks/ModalEdit'
import axios from 'axios'

export default {
    name: 'AuthorBooks',
    components: {
        BookList,
        ModalCreate,
        ModalEdit
    },
    props: [
        'id',
    ],
    data() {
        return {
            books: [],
            book: Object
        }
    },
    mounted() {
        this.fetchBooks()

    },
    methods: {
        fetchBooks: function () {
            axios
                .get('/api/authors/'+this.id+'/books')
                .then(
                    response => (
                        this.books = response.data
                        )
                );
        },
        addBook: function(newBook) {
            var self=this;
            axios
                .post('/api/authors/'+this.id+'/books', JSON.stringify(newBook))
                .then(function (response) {
                    self.fetchBooks()
                })
                .catch(function (error) {
                    console.log(error);
                  })
        },
        deleteBook: function(oldBook) {
            var self=this;
            axios
                .delete('/api/authors/'+this.id+'/books/' + oldBook)
                .then(function (response) {
                    self.fetchBooks()
                })
                .catch(function (error) {
                    console.log(error);
                  })
        },
        acceptBookToEdit: function(bookToEdit) {
            this.book = bookToEdit
        },
        editBook: function(oldBook){
            var self=this;
            axios
                .patch('/api/authors/' + this.id + '/books/' + this.book.id, JSON.stringify(oldBook))
                .then(function (response) {
                    self.fetchBooks()
                })
                .catch(function (error) {
                    console.log(error);
                })
        }
    }
}
</script>

<style>

</style>
<template>
    <div>
        <h1>Список книг автора {{ author.firstName }} {{ author.lastName }}</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%">#</th>
                    <th scope="col" style="width: 30%">Название</th>
                    <th scope="col" style="width: 30%">Год</th>
                    <th scope="col" style="width: 30%"></th>
                </tr>
            </thead>
            <tbody>
                <BookItem v-bind:key="book.id" 
                            v-for="book in author.books" 
                            v-bind:book="book" 
                            @delete-book='deleteBook'
                            @accept-book-to-edit='acceptBookToEdit'
                            />
            </tbody>
        </table>
    </div>
</template>

<script>

import BookItem from './BookItem';
export default {
    name: 'BookList',
    components:{
        BookItem
    },
    props: [
        'author'
    ],
    methods:{
        deleteBook: function(oldBook) {
            this.$emit('delete-book', oldBook)
        },
        acceptBookToEdit: function(oldBook) {
            this.$emit('accept-book-to-edit', oldBook)
        }
    }
}
</script>

<style>

</style>
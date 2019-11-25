<template>
    <div class="container mt-5">
        <AuthorList v-bind:authors="authors" @accept-author-to-edit='acceptAuthor'/>
        <ModalCreate @add-author='addAuthor'/>
        <ModalEdit @edit-author='editAuthor' v-bind:author="author"/>
    </div>
</template>

<script>

import ModalCreate from '../components/Author/ModalCreate'
import ModalEdit from '../components/Author/ModalEdit'
import AuthorList from '../components/Author/AuthorList'
import axios from 'axios'
import { stringify } from 'querystring'

export default {
    name: 'Home',
    components: {
        AuthorList,
        ModalCreate,
        ModalEdit
    },
    data() {
        return {
            authors: [],
            author: Object
        }
    },
    mounted() {
        this.fetchAuthors()

    },
    methods: {
        fetchAuthors: function () {
            axios
                .get('api/authors')
                .then(
                    response => (
                        this.authors = response.data
                        )
                );
        },

        addAuthor: function (author) {
            var self=this;
            axios
                .post('api/authors', JSON.stringify(author))
                .then(function (response) {
                    self.fetchAuthors()
                })
                .catch(function (error) {
                    console.log(error);
                  })
            
        },

        acceptAuthor: function (author) {
            this.author = author
        },
        editAuthor: function (oldAuthor) {
            var self=this;
            axios
                .patch('api/authors/' + this.author.id, JSON.stringify(oldAuthor))
                .then(function (response) {
                    self.fetchAuthors()
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
<template>
    <div>
        <h1>Список авторов</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" style="width: 10%">#</th>
                    <th scope="col" style="width: 30%">Имя</th>
                    <th scope="col" style="width: 30%">Фамилия</th>
                    <th scope="col" style="width: 30%"></th>
                </tr>
            </thead>
            <tbody>
                <AuthorItem v-bind:key="author.id" 
                            v-for="author in authors" 
                            v-bind:author="author"
                            @accept-author-to-edit='acceptAuthorToEdit'
                            />
            </tbody>
        </table>
    </div>
</template>

<script>

import AuthorItem from './AuthorItem';

export default {
    name: 'AuthorList',
    components:{
        AuthorItem
    },
    props: [
        'authors'
    ],
    methods: {
        acceptAuthorToEdit (author) {
            this.$emit('accept-author-to-edit', author)
        }
    }
}
</script>

<style>

</style>
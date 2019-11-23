<template>
    <div class="container mt-5">
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
                            v-bind:author="author" />
            </tbody>
        </table>
        <a href="#"><button type="button" class="btn btn-primary">Добавить автора</button></a> 
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
    ]
}
</script>

<style>

</style>
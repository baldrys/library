<template>
    <div>
        <AuthorList v-bind:authors="authors" />
    </div>
</template>

<script>

import SomeComp from './components/SomeComponent'
import AuthorList from './components/AuthorList'

export default {
    name: 'app',
    components: {
        SomeComp,
        AuthorList
    },
    data() {
        return {
            authors: [
                {
                    id: 1,
                    firstName: "Федор",
                    lastName: "Достоевский",
                },
                {
                    id: 2,
                    firstName: "Джордж",
                    lastName: "Мартин",
                },
                {
                    id: 3,
                    firstName: "Виктор",
                    lastName: "Пелевин",
                }
            ]
        }
    }
}
</script>

<style>

</style>
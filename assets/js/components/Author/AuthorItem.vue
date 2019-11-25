<template>
    <tr>
        <th scope="row">{{ author.id }}</th>
        <td>{{ author.firstName }}</td>
        <td>{{ author.lastName }}</td>
        <td>
            <div class="float-right">
                <button @click="editAuthor" type="button" class="btn btn-primary">Редактировать</button>
                <router-link :to="{ name: 'author', params: { id: author.id }}"><button type="button" class="btn btn-primary">Список книг</button></router-link>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: [
        'author'
    ],
    methods: {
        editAuthor: function (event) {
            $('#newEditModal').modal('show')
            this.$emit('accept-author-to-edit', this.author)
        }
    }
}
</script>

<style>

</style>
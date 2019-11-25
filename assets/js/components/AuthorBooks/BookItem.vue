<template>
    <tr>
        <th scope="row">{{ book.id }}</th>
        <td>{{ book.title }}</td>
        <td>{{ book.year }}</td>
        <td>
            <div class="float-right">
                <button @click="onEdit" type="button" class="btn btn-primary">Редактировать</button>
                <button @click="onDelete" type="button" class="btn btn-danger">Удалить</button>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: [
        'book'
    ],
    methods: {
        onDelete (event) {
            this.$emit('delete-book', this.book.id)
        },
        onEdit (event) {
            $('#newEditModal').modal('show')
            this.$emit('accept-book-to-edit', this.book)
        }
    }
}
</script>

<style>

</style>
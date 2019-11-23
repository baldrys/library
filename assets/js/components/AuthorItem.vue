<template>
    <tr>
        <th scope="row">{{ author.id }}</th>
        <td>{{ author.firstName }}</td>
        <td>{{ author.lastName }}</td>
        <td>
            <div class="float-right">
                <a href="#"><button type="button" class="btn btn-primary">Редактировать</button></a>
                <a href="#"><button type="button" class="btn btn-primary">Список книг</button></a>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    props: [
        'author'
    ]
}
</script>

<style>

</style>
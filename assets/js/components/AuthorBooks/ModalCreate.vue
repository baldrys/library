<template>
  <div>
        <button type="button" class="btn btn-primary mb-5" @click="newModal">Создать книгу</button>
        <div class="modal fade" id="newCreateModal" tabindex="-1" role="dialog" aria-labelledby="newCreateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCreateModal">Новая книга</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                        <label for="firstName" class="col-form-label">Название:</label>
                        <input type="text" class="form-control" id="firstName" v-model="title" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="col-form-label">Год:</label>
                        <input type="number" min="0" class="form-control" id="lastName" v-model="year" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </form>
            </div>
            </div>
        </div>
        </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            year: ''
        }
    },
    methods: {
        newModal() {
            $('#newCreateModal').modal('show')
        },
        onSubmit (event) {
            if(this.title.trim() && this.year.trim() ){
                const newBook = {
                    title: this.title,
                    year: this.year
                }
                this.$emit('add-book', newBook)
                this.title =''
                this.year =''
            }
            $('#newCreateModal').modal('hide')
        }
    }
}
</script>

<style>

</style>
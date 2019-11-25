<template>
  <div>
        <div class="modal fade" id="newEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать книгу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                        <label for="title" class="col-form-label">Название:</label>
                        <input type="text" class="form-control" id="title" v-model="title" required>
                    </div>
                    <div class="form-group">
                        <label for="year" class="col-form-label">Год:</label>
                        <input type="number" min="0" class="form-control" id="year" v-model="year" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
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
    props: ['book'],

    data() {
        return {
            title: '',
            year: ''
        }
    },
    methods: {
        onSubmit () {
            if(this.title.trim() && this.year != null ){
                const oldBook = {
                    title: this.title,
                    year: this.year
                }
                this.$emit('edit-book', oldBook)
            }
            $('#newEditModal').modal('hide')
        }
    },
    watch: { 
      	book: function(newVal, oldVal) {
        this.title = newVal.title,
        this.year = newVal.year
    }
    }
}
</script>

<style>

</style>
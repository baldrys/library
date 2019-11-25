<template>
  <div>
        <div class="modal fade" id="newEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Редактировать автора</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form v-on:submit.prevent="onSubmit">
                    <div class="form-group">
                        <label for="firstName" class="col-form-label">Имя:</label>
                        <input type="text" class="form-control" id="firstName" v-model="firstName" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="col-form-label">Фамилия:</label>
                        <input type="text" class="form-control" id="lastName" v-model="lastName" required>
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
    props: ['author'],

    data() {
        return {
            firstName: '',
            lastName: ''
        }
    },
    methods: {
        onSubmit () {

            if(this.firstName.trim() && this.lastName.trim() ){
                const oldAuthor = {
                    firstName: this.firstName,
                    lastName: this.lastName
                }
                this.$emit('edit-author', oldAuthor)
            }
            $('#newEditModal').modal('hide')
        }
    },
    watch: { 
      	author: function(newVal, oldVal) {
        this.firstName = newVal.firstName,
        this.lastName = newVal.lastName
    }
    }
}
</script>

<style>

</style>
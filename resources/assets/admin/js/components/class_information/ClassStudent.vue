<template>
    <div>
        <div class="form-group">
            <label class="control-label">Selecionar Estudantes</label>
            <select class="form-control" name="students"></select>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th></th>
                <th>Nome</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>Excluir</td>
                    <td>{{student.user.name}}</td>
                </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    import store from '../../store/store'
    export default {
        props: ['classInformation'],
        computed: {
            students(){
                return store.state.classStudent.students;
            }
        },
        mounted(){
            store.dispatch('classStudent/query', this.classInformation);
        }

    }
</script>

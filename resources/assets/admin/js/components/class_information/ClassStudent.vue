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
    import ADMIN_CONFIG from '../../services/adminConfig'
    import store from '../../store/store'
    import 'select2'
    export default {
        props: ['classInformation'],
        computed: {
            students(){
                return store.state.classStudent.students;
            }
        },
        mounted(){
            store.dispatch('classStudent/query', this.classInformation);
            $("select[name=students]").select2({
                ajax: {
                    url: `${ADMIN_CONFIG.API_URL}/students`,
                    dataType: 'json',
                    delay: 250,
                    data(params){
                        return {
                            q: params.term
                        }
                    },
                    processResults(data){
                        return {
                            results: data.map((student) => {
                                return {id: student.id, text: student.user.name}
                            })
                        }
                    }
                },
                minimumInputLength:2
            });
        }

    }
</script>

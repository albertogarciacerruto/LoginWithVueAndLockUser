<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="header-title">Listado de Usuarios</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="DataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                    <tr class="text-white">
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr v-for="user in users">
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-primary" v-on:click.prevent="desbloquear(user)">Restablecer Usuario</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users: [] 
            }
        },
        methods: {
            //Metodo que carga todos los usuarios haciendo peticion por get
            cargar(){ 
                axios.get('lists').then(response => {
                    this.users = response.data.users
                });
            },
            //Metodo para desbloquear a los usuarios seleccionados
            desbloquear: function(user){
                var url = 'lock_user/' + user.id;
                axios.get(url).then(response =>{
                    alert("Registro restablecido");
                });
            }
        },
        created(){ 
            this.cargar(); 
        }, 
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

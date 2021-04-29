<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data User
                        <div class="card-tools">
                            <button type="button" class="btn btn-success" @click="modalBaru">Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nama User</th>
                                        <th>Level</th>
                                        <th>Email</th>
                                    </tr>
                                    <tr v-for="items in users" :key="items.id">
                                        <td> {{items.name}}  </td>
                                        <td> {{items.level.namalevel}} </td>
                                        <td> {{items.email}}  </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form @submit.prevent="simpanData()">
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="text" v-model="form.name" class="form-control" placeholder="Nama Pengguna">
                            </div>
                            <div class="form-group">
                                <select class="form-control select2" v-model="form.level_id">
                                    <option value="" >Pilih ....</option>
                                    <option v-for="items in levels" :key="items.id" :value="items.id">{{items.namalevel}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="form.email" class="form-control" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" v-model="form.password" class="form-control" placeholder="password">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                </div>

            </div>
        </div>
        <!-- Modal -->
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users:{},
                levels :{},
                form : new Form({
                    id:"",
                    name:"",
                    level_id:"",
                    email:"",
                    password:""
                })
            }
        },
       methods:{
           modalBaru(){
               $("#exampleModal").modal("show");
           },
           loadData(){
               axios.get('api/ambildatalevel').then(({data}) => this.levels = data)
               axios.get('api/ambildatauser').then(({data}) => this.users = data)
           },
           simpanData(){
               this.form.post('api/simpanuser').then(()=>{
                   console.log("data Tersimpan");
                    $("#exampleModal").modal("hide");
               })
           }
       },
       created(){
           this.loadData();
       }
    }
</script>

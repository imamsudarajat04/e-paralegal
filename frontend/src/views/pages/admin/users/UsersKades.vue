<template>
    <AdminLayout>
        <ModuleHeader>
            <template v-slot:icon>
                mdi-account
            </template>
            <template v-slot:name>
                USER KADES
            </template>
            <template v-slot:breadcrumbs>
                <v-breadcrumbs :items="breadcrumbs" class="pa-0">
                    <template v-slot:divider>
                        <v-icon>mdi-chevron-right</v-icon>
                    </template>
                </v-breadcrumbs>
            </template>
            <template v-slot:desc>
                <v-alert                                        
                    color="cyan"
                    border="left"                    
                    colored-border
                    type="info"
                    >
                    Halaman ini berisi daftar pengguna dengan role kades.
                </v-alert>
            </template>
        </ModuleHeader>   
        <v-container fluid>   
            <v-row class="mb-4" no-gutters>
                <v-col cols="12">
                    <v-card>
                        <v-card-text>
                            <v-text-field
                                v-model="search"
                                append-icon="mdi-database-search"
                                label="Search"
                                single-line
                                hide-details
                            ></v-text-field>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
            <v-row class="mb-4" no-gutters>
                <v-col cols="12">
                    <v-data-table
                        :headers="headers"
                        :items="datatable"
                        :search="search"
                        item-key="id"
                        sort-by="name"
                        show-expand
                        :expanded.sync="expanded"
                        :single-expand="true"
                        @click:row="dataTableRowClicked"
                        class="elevation-1"
                        :loading="datatableLoading"
                        loading-text="Loading... Please wait">

                        <template v-slot:top>
                            <v-toolbar flat color="white">
                                <v-toolbar-title>DAFTAR USER</v-toolbar-title>
                                <v-divider
                                    class="mx-4"
                                    inset
                                    vertical
                                ></v-divider>
                                <v-spacer></v-spacer>
                                <v-dialog v-model="dialogfrm" max-width="500px" persistent>
                                    <template v-slot:activator="{ on }">
                                        <v-btn color="primary" dark class="mb-2" v-on="on">TAMBAH</v-btn>
                                    </template>
                                    <v-form ref="frmdata" v-model="form_valid" lazy-validation>
                                        <v-card>
                                            <v-card-title>
                                                <span class="headline">{{ formTitle }}</span>
                                            </v-card-title>
                                            <v-card-text>
                                                <v-text-field 
                                                    v-model="formdata.name" 
                                                    label="NAME"
                                                    filled
                                                    :rules="rule_name">
                                                </v-text-field>  
                                                <v-text-field 
                                                    v-model="formdata.email" 
                                                    label="E-MAIL"
                                                    filled
                                                    :rules="rule_email">
                                                </v-text-field>
                                                <v-text-field 
                                                    v-model="formdata.nomor_hp" 
                                                    label="NOMOR HP"
                                                    filled
                                                    :rules="rule_nomor_hp">
                                                </v-text-field>                                             
                                                <v-text-field 
                                                    v-model="formdata.username" 
                                                    label="USERNAME"
                                                    filled
                                                    :rules="rule_username">
                                                </v-text-field>                                            
                                                <v-text-field 
                                                    v-model="formdata.password" 
                                                    label="PASSWORD"
                                                    filled
                                                    :rules="rule_password"
                                                    type="password">
                                                </v-text-field>
                                                <v-autocomplete
                                                    v-model="formdata.id_desa"
                                                    label="ID DESA"
                                                    filled
                                                    dense
                                                    item-text="text"
                                                    item-value="id"
                                                    multiple
                                                    small-chips>
                                                </v-autocomplete>                                           
                                            </v-card-text>
                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="blue darken-1" text @click.stop="closedialogfrm">BATAL</v-btn>
                                                <v-btn 
                                                    color="blue darken-1" 
                                                    text 
                                                    @click.stop="save" 
                                                    :loading="btnLoading"
                                                    :disabled="!form_valid||btnLoading">
                                                        SIMPAN
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-form>
                                </v-dialog>
                                <v-dialog v-model="dialogdetailitem" max-width="500px" persistent>
                                    <v-card>
                                        <v-card-title>
                                            <span class="headline">DETAIL DATA</span>
                                        </v-card-title>
                                        <v-card-text>
                                            <v-row no-gutters>
                                                <v-col xs="12" sm="6" md="6">
                                                    <v-card flat>
                                                        <v-card-title>ID :</v-card-title>
                                                        <v-card-subtitle>
                                                            {{formdata.id}}
                                                        </v-card-subtitle>
                                                    </v-card>
                                                </v-col>
                                                <v-responsive width="100%" v-if="$vuetify.breakpoint.xsOnly"/>
                                                <v-col xs="12" sm="6" md="6">
                                                    <v-card flat>
                                                        <v-card-title>CREATED :</v-card-title>
                                                        <v-card-subtitle>
                                                            {{$date(formdata.created_at).format('DD/MM/YYYY HH:mm')}}
                                                        </v-card-subtitle>
                                                    </v-card>
                                                </v-col>
                                                <v-responsive width="100%" v-if="$vuetify.breakpoint.xsOnly"/>
                                            </v-row>
                                            <v-row no-gutters>
                                                <v-col xs="12" sm="6" md="6">
                                                    <v-card flat>
                                                        <v-card-title>NAME :</v-card-title>
                                                        <v-card-subtitle>
                                                            {{formdata.name}}
                                                        </v-card-subtitle>
                                                    </v-card>
                                                </v-col>
                                                <v-responsive width="100%" v-if="$vuetify.breakpoint.xsOnly"/>
                                                <v-col xs="12" sm="6" md="6">
                                                    <v-card flat>
                                                        <v-card-title>UPDATED :</v-card-title>
                                                        <v-card-subtitle>
                                                            {{$date(formdata.updated_at).format('DD/MM/YYYY HH:mm')}}
                                                        </v-card-subtitle>
                                                    </v-card>
                                                </v-col>
                                                <v-responsive width="100%" v-if="$vuetify.breakpoint.xsOnly"/>
                                            </v-row>
                                        </v-card-text>
                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="blue darken-1" text @click.stop="closedialogdetailitem">KELUAR</v-btn>
                                        </v-card-actions>
                                    </v-card>                                    
                                </v-dialog>
                            </v-toolbar>
                        </template>
                        <template v-slot:item.id="{ item }">    
                           {{item.id}}
                        </template>
                        <template v-slot:item.actions="{ item }">
                            <v-icon
                                small
                                class="mr-2"
                                @click.stop="viewItem(item)">
                                mdi-eye
                            </v-icon>
                            <v-icon
                                small
                                class="mr-2"
                                @click.stop="editItem(item)">
                                mdi-pencil
                            </v-icon>
                            <v-icon
                                small
                                :loading="btnLoading"
                                :disabled="btnLoading"
                                @click.stop="deleteItem(item)">
                                mdi-delete
                            </v-icon>
                        </template>
                        <template v-slot:expanded-item="{ headers, item }">
                            <td :colspan="headers.length" class="text-center">
                                <v-col cols="12">
                                    <strong>ID:</strong>{{ item.id }}
                                    <strong>created_at:</strong>{{ $date(item.created_at).format('DD/MM/YYYY HH:mm') }}
                                    <strong>updated_at:</strong>{{ $date(item.updated_at).format('DD/MM/YYYY HH:mm') }}
                                </v-col>                                
                            </td>
                        </template>
                        <template v-slot:no-data>
                            Data belum tersedia
                        </template>
                    </v-data-table>
                </v-col>
            </v-row>
        </v-container>
    </AdminLayout>
</template>
<script>
import AdminLayout from '@/views/layouts/AdminLayout';
import ModuleHeader from '@/components/ModuleHeader';
export default {
    name:'UsersKades',
    created () {
        this.breadcrumbs = [
            {
                text:'HOME',
                disabled:false,
                href:'/dashboard/'+this.$store.getters['auth/AccessToken']
            },
            {
                text:'USERS',
                disabled:false,
                href:'#'
            },
            {
                text:'KADES',
                disabled:true,
                href:'#'
            }
        ];
        this.initialize()
    },  
    data: () => ({ 
        btnLoading:false,
        datatableLoading:false,
        expanded:[],
        datatable:[],
        headers: [                        
            { text: 'ID', value: 'id' },  
            { text: 'NAMA USER', value: 'name' },   
            { text: 'EMAIL', value: 'email' },   
            { text: 'NOMOR HP', value: 'nomor_hp' },   
            { text: 'USERNAME', value: 'username' }, 
            { text: 'ID DESA', value: 'id_desa' }, 
            { text: 'UTUSAN', value: 'utusan' }, 
            { text: 'AKSI', value: 'actions', sortable: false,width:100 },
        ],
        search:'',    
        //dialog
        dialogfrm:false,
        dialogdetailitem:false,
        //form data   
        form_valid:true,         
        formdata: {
            id:0,                        
            username:'',                    
            name:'',
            email:'',
            password:'',
            nomor_hp:'',
            id_desa:'',                       
            created_at: '',           
            updated_at: '',           
        },
        formdefault: {
            id:0,           
            username:'',                    
            name:'',
            email:'',
            password:'',
            nomor_hp:'',
            id_desa:'',                                    
            created_at: '',           
            updated_at: '',       
        },
        editedIndex: -1,
        //form rules  
        rule_name:[
            value => !!value||"Mohon untuk di isi nama user !!!",  
            value => /^[A-Za-z\s]*$/.test(value) || 'Name hanya boleh string dan spasi',                
        ], 
        rule_email:[
            value => !!value || 'Mohon E-mail di isi !!!',
            value => /.+@.+\..+/.test(value) || 'Format E-mail salah mohon diisi dengan benar',
        ],
        rule_nomor_hp:[
            value => !!value||"Nomor HP mohon untuk diisi !!!",
            value => /^\+[1-9]{1}[0-9]{1,14}$/.test(value) || 'Nomor HP hanya boleh angka dan gunakan kode negara didepan seperti +6281214553388',
        ],
        rule_username:[
            value => !!value||"Mohon untuk di isi username User !!!",
            value => /^[A-Za-z_]*$/.test(value) || 'Username hanya boleh string dan underscore',
        ],
        rule_password:[
            value => !!value||"Mohon untuk di isi password User !!!",
            value => value.length >= 8 || 'Minimial Password 8 karaketer',
        ], 
    }),
    methods: {
        initialize:async function () 
        {
            this.datatableLoading=true;
            await this.$ajax.get('/users/kades',{
                headers: {
                    Authorization:this.$store.getters['auth/Token']
                }
            }).then(({data})=>{               
                this.datatable = data.object;
                this.datatableLoading=false;
            }).catch(()=>{
                this.datatableLoading=false;
            });  
        },
        dataTableRowClicked(item)
        {
            if ( item === this.expanded[0])
            {
                this.expanded=[];                
            }
            else
            {
                this.expanded=[item];
            }               
        },
        viewItem (item) {
            this.formdata=item;      
            this.dialogdetailitem=true;              
            // this.$ajax.get('/path/'+item.id,{
            //     headers: {
            //         Authorization:this.$store.getters['auth/Token']
            //     }
            // }).then(({data})=>{               
                                           
            // });                      
        },    
        editItem (item) {
            this.editedIndex = this.datatable.indexOf(item);
            this.formdata = Object.assign({}, item);
            this.dialogfrm = true;
        },    
        save:async function () {
            if (this.$refs.frmdata.validate())
            {
                this.btnLoading=true;
                if (this.editedIndex > -1) 
                {
                    await this.$ajax.post('/path/'+this.formdata.id,
                        {
                            '_method':'PUT',
                            name:this.formdata.name,                       
                        },
                        {
                            headers:{
                                Authorization:this.$store.getters['auth/Token']
                            }
                        }
                    ).then(({data})=>{   
                        Object.assign(this.datatable[this.editedIndex], data.object);
                        this.closedialogfrm();
                        this.btnLoading=false;
                    }).catch(()=>{
                        this.btnLoading=false;
                    });                 
                    
                } else {
                    await this.$ajax.post('/path/store',
                        {
                            name:this.formdata.name,                            
                        },
                        {
                            headers:{
                                Authorization:this.$store.getters['auth/Token']
                            }
                        }
                    ).then(({data})=>{   
                        this.datatable.push(data.object);
                        this.closedialogfrm();
                        this.btnLoading=false;
                    }).catch(()=>{
                        this.btnLoading=false;
                    });
                }
            }
        },
        deleteItem (item) {           
            this.$root.$confirm.open('Delete', 'Apakah Anda ingin menghapus data dengan ID '+item.id+' ?', { color: 'red' }).then((confirm) => {
                if (confirm)
                {
                    this.btnLoading=true;
                    this.$ajax.post('/path/'+item.id,
                        {
                            '_method':'DELETE',
                        },
                        {
                            headers:{
                                Authorization:this.$store.getters['auth/Token']
                            }
                        }
                    ).then(()=>{   
                        const index = this.datatable.indexOf(item);
                        this.datatable.splice(index, 1);
                        this.btnLoading=false;
                    }).catch(()=>{
                        this.btnLoading=false;
                    });
                }                
            });
        },
        closedialogdetailitem () {
            this.dialogdetailitem = false;            
            setTimeout(() => {
                this.formdata = Object.assign({}, this.formdefault)
                this.editedIndex = -1
                }, 300
            );
        },
        closedialogfrm () {
            this.dialogfrm = false;            
            setTimeout(() => {
                this.formdata = Object.assign({}, this.formdefault);                
                this.editedIndex = -1
                this.$refs.frmdata.reset(); 
                }, 300
            );
        },
    },
    computed: {        
        formTitle () {
            return this.editedIndex === -1 ? 'TAMBAH DATA' : 'UBAH DATA'
        },        
    },
    components:{
        AdminLayout,
        ModuleHeader,        
    },
}
</script>
<template>
    <FrontLayout>
        <v-container fluid>
            <v-row justify="center">
                <v-col cols="12" sm="10" md="8" lg="6">
                    <v-form ref="frmLogin" lazy-validation>
                        <v-card>
                            <v-card-text class="my-4 text-center title">Halaman Login</v-card-text>
                                <v-card-text>
                                    <v-text-field 
                                        v-model="formlogin.username"
                                        label="Username" 
                                        :rules="rule_username"
                                    >  
                                    </v-text-field>
                                    <v-text-field
                                        v-model="formlogin.password"
                                        label="Password"
                                        type="password"
                                        :rules="rule_password"
                                    >
                                    </v-text-field> 
                                </v-card-text>
                                <v-divider class="mt-12"></v-divider>
                                    <v-card-actions> 
                                        <v-spacer></v-spacer>
                                        <v-btn color="primary" text @click="doLogin">Login</v-btn>
                                    </v-card-actions>
                            </v-card>
                    </v-form>
                </v-col>
            </v-row>
        </v-container>
    </FrontLayout>
</template>
<script>
import FrontLayout from '@/views/layouts/FrontLayout';
export default {
    name:'Login',
    data(){
        return {
            formlogin: {
                username:'',
                password:''
            },
            rule_username:[
                value => !!value || "Kolom Username mohon untuk diisi !!!"
            ],
            rule_password:[
                value => !!value || "Kolom Password mohon untuk diisi !!!"
            ]
        }
    },
    methods: {
        doLogin: async function()
        {
            if(this.$refs.frmLogin.validate())
            {
                console.log('test');
            }
        }
    },
    components: {
        FrontLayout
    }
}
</script>
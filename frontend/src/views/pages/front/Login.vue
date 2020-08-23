<template>
    <FrontLayout>
        <v-container fluid>
            <v-row align="center">
                <v-col cols="12">
                    <v-form ref="form">
                        <v-text-field 
                            v-model="email" 
                            :rules="emailRules" 
                            label="E-mail" 
                            required>
                        </v-text-field>
                        <v-text-field
                            v-model="password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show1 ? 'text' : 'password'"
                            name="input-10-1"
                            label="Password"
                            hint="At least 8 characters"
                            counter
                            @click:append="show1 = !show1"
                        >
                        </v-text-field>
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
    components: {
        FrontLayout
    }
}
</script>
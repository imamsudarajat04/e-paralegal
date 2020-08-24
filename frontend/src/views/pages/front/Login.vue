<template>
    <FrontLayout>
        <v-container fluid>
            <v-row justify="center">
                <v-col cols="12" sm="10" md="8" lg="6">
                    <v-card ref="form">
                        <v-card-text>
                            <v-text-field
                                ref="email"
                                v-model="email"
                                :rules="[() => !!email || 'This field is required']"
                                :error-messages="errorMessage"
                                label="E-mail"
                                required
                            >
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
                        </v-card-text>
                        <v-divider class="mt-12"></v-divider>
                            <v-card-actions>
                                <v-btn text>Cancel</v-btn>
                                    <v-spacer></v-spacer>
                                        <v-slide-x-reverse-transition>
                                            <v-tooltip
                                                v-if="formHasErrors"
                                                left
                                            >
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-btn
                                                        icon
                                                        class="my-0"
                                                        v-bind="attrs"
                                                        @click="resetForm"
                                                        v-on="on"
                                                    >
                                                        <v-icon>mdi-refresh</v-icon>
                                                    </v-btn>
                                                </template>
                                                 <span>Refresh form</span>
                                            </v-tooltip>
                                        </v-slide-x-reverse-transition>
                                    <v-btn color="primary" text @click="submit">Login</v-btn>
                            </v-card-actions>
                    </v-card>
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
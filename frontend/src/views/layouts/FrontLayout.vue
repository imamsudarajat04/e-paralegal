<template>
    <div>
        <v-app-bar app>
            <v-toolbar-title>
                <span class="hidden-sm-and-down">E-Paralegal</span>
            </v-toolbar-title>
            <v-spacer />
            <v-btn to="/" class="mr-2" color="primary" text large>
                Home
            </v-btn>            
            <v-btn to="/login" color="primary" text large>
                Login
            </v-btn>
        </v-app-bar>
        <v-main>
            <slot/>
        </v-main>        
    </div>
</template>
<script>
export default {
    name:'FrontLayout',
}
</script>
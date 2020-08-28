<template>
    <div>
        <v-system-bar app dark class="indigo darken-3 white--text">
            
		</v-system-bar>	
        <v-app-bar app>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer" class="grey--text"></v-app-bar-nav-icon>
            <v-toolbar-title class="headline clickable">
				<span class="hidden-sm-and-down">{{APP_NAME}}</span>
			</v-toolbar-title>
            <v-spacer></v-spacer>                        
            <v-menu 
                :close-on-content-click="true"
                origin="center center"
                transition="scale-transition"
                :offset-y="true"
                bottom 
                left>
                <template v-slot:activator="{on}">
                    <v-avatar size="30">
                        <v-img :src="photoUser" v-on="on" />
                    </v-avatar>                    
                </template>
                <v-list>
                    <v-list-item>
                        <v-list-item-avatar>
                            <v-img :src="photoUser"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>					
                            <v-list-item-title class="title">
                                ADMIN
                            </v-list-item-title>
                            <v-list-item-subtitle>                                
                                SUPERADMIN
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>                    
                    <v-divider/>
                    <v-list-item to="/usersprofil/profil">
                        <v-list-item-icon class="mr-2">
							<v-icon>mdi-account</v-icon>
						</v-list-item-icon>
                        <v-list-item-title>Profil</v-list-item-title>
                    </v-list-item>
                    <v-divider/>
                    <v-list-item @click.prevent="logout">
                        <v-list-item-icon class="mr-2">
							<v-icon>mdi-power</v-icon>
						</v-list-item-icon>
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
            <v-divider
                class="mx-4"
                inset
                vertical
            ></v-divider>
			<v-app-bar-nav-icon @click.stop="drawerRight = !drawerRight">
                <v-icon>mdi-menu-open</v-icon>
			</v-app-bar-nav-icon>            
        </v-app-bar>    
        <v-navigation-drawer v-model="drawer" width="300" dark class="indigo darken-4" :temporary="isReportPage" app>
			<v-list-item>
				<v-list-item-avatar>
					<v-img :src="photoUser" @click.stop="toProfile"></v-img>
				</v-list-item-avatar>
				<v-list-item-content>					
					<v-list-item-title class="title">
						ADMIN
					</v-list-item-title>
					<v-list-item-subtitle>
						SUPERADMIN
					</v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
			<v-divider></v-divider>
            <v-list expand>
                <v-list-group group="/dmaster" no-action color="yellow">
                    <template v-slot:activator>
                        <v-list-item-icon class="mr-2">
                            <v-icon>mdi-format-list-bulleted</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>								
                            <v-list-item-title>DATA MASTER</v-list-item-title>
                        </v-list-item-content>							
                    </template>
					<div>
						<v-list-item link to="/dmaster/jeniskegiatan">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-format-list-bulleted</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    JENIS KEGIATAN
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                </v-list-group>
                <v-list-group group="/konsultasi" no-action color="yellow">
                    <template v-slot:activator>
                        <v-list-item-icon class="mr-2">
                            <v-icon>mdi-clipboard-list-outline</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>								
                            <v-list-item-title>KONSULTASI</v-list-item-title>
                        </v-list-item-content>							
                    </template>
					<div>
						<v-list-item link to="/konsultasi/kegiatan">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-clipboard-list-outline</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    KEGIATAN
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                </v-list-group>
                <v-list-group group="/laporan" no-action color="yellow">
                    <template v-slot:activator>
                        <v-list-item-icon class="mr-2">
                            <v-icon>mdi-shredder</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>								
                            <v-list-item-title>LAPORAN</v-list-item-title>
                        </v-list-item-content>							
                    </template>
					<div>
						<v-list-item link to="/laporan/kegiatan">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-shredder</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    LAPORAN KEGIATAN
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                </v-list-group>
                <v-list-group group="/users" no-action color="yellow">
                    <template v-slot:activator>
                        <v-list-item-icon class="mr-2">
                            <v-icon>mdi-account</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>								
                            <v-list-item-title>USER</v-list-item-title>
                        </v-list-item-content>							
                    </template>
					<div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    SUPER ADMIN
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                    <div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    USERS LEGAL
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                    <div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    USERS KADES
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                    <div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    USERS PMB
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                    <div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    USERS OBH
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                    <div>
						<v-list-item link to="/users/">
                            <v-list-item-icon class="mr-2">
                                <v-icon>mdi-account</v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title>
                                    USERS KUMHAM
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>   
					</div>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
        <v-navigation-drawer v-model="drawerRight" width="300" app fixed right temporary>
            <v-list dense>
                <v-list-item>		
                    <v-list-item-icon class="mr-2">
                        <v-icon>mdi-menu-open</v-icon>
                    </v-list-item-icon>			
                    <v-list-item-content>									
                        <v-list-item-title class="title">
                            OPTIONS
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-item class="teal lighten-5 mb-5">
                    <v-list-item-icon class="mr-2">
                        <v-icon>mdi-filter</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>								
                        <v-list-item-title>FILTER</v-list-item-title>
                    </v-list-item-content>		
                </v-list-item>
                <slot name="filtersidebar"/>		                	
            </v-list>
		</v-navigation-drawer>
        <v-main class="mx-4 mb-4">			
			<slot />
		</v-main>
    </div>    
</template>
<script>
export default {
    name:'AdminLayout',        
    data:()=>({
        loginTime:0,
        drawer:null,
        drawerRight:null,   
    }),       
    methods: {        
        logout ()
        {
            
        },
        toProfile ()
        {

        }
	},
    computed:{        
        APP_NAME ()
        {
            return process.env.VUE_APP_NAME;
        },
        photoUser()
		{			
			return '';
        },
        isReportPage ()
		{
			if (this.$route.name=='ReportFormBMurni')
			{
				return true;
			}
			else
			{
				return false;
			}
        },        
    },
    watch: {
        
    }
}
</script>
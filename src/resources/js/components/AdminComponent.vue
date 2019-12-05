<template>
    <v-app id="app">
        <v-navigation-drawer v-model="drawer" app>
            <v-list dense>
                <v-list-item
                    link
                    v-for="item in items"
                    :key="item.title"
                    :href="item.href"
                >
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-toolbar color="primary" dark>
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>
            <v-toolbar-title>サンプル管理画面</v-toolbar-title>
            <v-spacer></v-spacer>
            管理者名
            <v-btn icon @click="axiosLogout()">
                <v-tooltip left>
                    <span>ログアウト</span>
                </v-tooltip>
            </v-btn>
        </v-toolbar>
    </v-app>
</template>

<script>
export default {
    name: "AdminComponent",

    props: {
        name: String,
        logout: String
    },

    data: () => ({
        drawer: false,
        items: [
            { title: "Home", icon: "dashboard", href: "/" },
            { title: "About", icon: "question_answer", href: "/about" }
        ],
        footer: "foo-----footer",
        title: "tit------title"
    }),

    mounted() {
        console.log("AdminComponent mounted.");

        if (process.env.MIX_FOOTER) {
            this.footer = process.env.MIX_FOOTER;
        }
        if (process.env.MIX_TITLE) {
            this.title = process.env.MIX_TITLE;
        }
    },

    methods: {
        axiosLogout: function() {
            axios
                .post(this.logout)
                .then(
                    function(response) {
                        console.log(response);
                    }.bind(this)
                )

                .catch(
                    function(error) {
                        console.log(error);
                        if (error.response) {
                            if (error.response.status) {
                                if (
                                    error.response.status == 401 ||
                                    error.response.status == 419
                                ) {
                                    var parser = new URL(this.logout);
                                    location.href = parser.origin;
                                }
                            }
                        }
                    }.bind(this)
                );
        }
    }
};
</script>

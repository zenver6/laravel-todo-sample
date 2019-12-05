<template>
    <div>
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

        <v-app-bar
            color="primary"
            dark
            fixed
            elevate-on-scroll
            scroll-threshold="48"
        >
            <v-app-bar-nav-icon
                @click.stop="drawer = !drawer"
            ></v-app-bar-nav-icon>
            <v-toolbar-title>サンプル管理画面</v-toolbar-title>
            <v-spacer></v-spacer>
            {{ name }}
            <v-btn icon @click="axiosLogout()" class="ml-2">
                <v-icon>exit_to_app</v-icon>
                <v-tooltip left>
                    <span>ログアウト</span>
                </v-tooltip>
            </v-btn>
            <!-- <form
                id="logout-form"
                action="/logout"
                method="POST"
                style="display: none;"
            >
                {{@csrf}}
            </form> -->
        </v-app-bar>
    </div>
</template>

<script>
export default {
    name: "AdminHeader",

    props: {
        name: String,
        logout: String
    },

    data: () => ({
        drawer: false,
        items: [
            { title: "Home", icon: "dashboard", href: "/" },
            { title: "User", icon: "people", href: "/user" }
        ]
    }),

    mounted() {
        console.log("AdminHeader mounted.");

        if (process.env.MIX_FOOTER) {
            this.footer = process.env.MIX_FOOTER;
        }
        if (process.env.MIX_TITLE) {
            this.title = process.env.MIX_TITLE;
        }
    },

    methods: {
        axiosLogout() {
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

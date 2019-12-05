<template>
    <v-flex>
        <v-card xs12 class="m-3 px-3">
            <v-card-title class="title">
                <v-icon class="pr-2">people</v-icon> ユーザー一覧
                <v-spacer></v-spacer>
                <v-spacer></v-spacer>
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
        </v-card>

        <v-data-table
            :headers="headers"
            :items="users"
            :page.sync="page"
            :items-per-page="itemsPerPage"
            :search="search"
            class="elevation-0 p-1"
        >
            <v-progress-linear
                slot="progress"
                color="blue"
                indeterminate
            ></v-progress-linear>

            <template slot="items" slot-scope="props">
                <tr>
                    <td class="text-xs-center" xs1>
                        {{
                            props.index +
                                1 +
                                (pagination.page - 1) * pagination.rowsPerPage
                        }}
                    </td>
                    <template v-for="n in headers.length - 1">
                        <td
                            :class="'text-xs-' + headers[n].align"
                            style="white-space: nowrap;"
                            v-text="props.item[headers[n].value]"
                        ></td>
                    </template>
                </tr>
            </template>
        </v-data-table>
    </v-flex>
</template>

<script>
export default {
    name: "UserList",

    props: {
        users: Array
    },

    data: () => ({
        search: "",
        page: 1,
        itemsPerPage: 15,
        headers: [
            // { align: "center", sortable: false, text: "No" },
            {
                align: "center",
                sortable: true,
                text: "ユーザーID",
                value: "user_id"
            },
            { align: "left", sortable: true, text: "氏名", value: "name" },
            { align: "left", sortable: true, text: "email", value: "email" }
        ]
    }),
    mounted() {
        console.log("User List mounted.");
        console.log(this.users);
    },
    methods: {}
};
</script>

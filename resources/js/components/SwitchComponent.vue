<template>
  <v-app id="app">
    <v-navigation-drawer v-model="drawer" clipped fixed app>
      <v-list dense>
        <r-link linkname="home"></r-link>
        <r-link linkname="profile"></r-link>
      </v-list>
    </v-navigation-drawer>

    <v-toolbar color="primary" dark fixed app clipped-left>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>{{title}}</v-toolbar-title>
      <v-spacer></v-spacer>
      {{ name }}
      <v-btn icon @click="axiosLogout()">
        <v-tooltip left>
          <v-icon slot="activator" color="white" dark>exit_to_app</v-icon>
          <span>ログアウト</span>
        </v-tooltip>
      </v-btn>
    </v-toolbar>

    <v-content>
      <v-container fluid fill-height>
        <v-layout justify-center fluid column>
          <v-fade-transition mode="out-in">
            <router-view @axios-logout="axiosLogout"></router-view>
          </v-fade-transition>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
export default {
  props: {
    name: String,
    id: 0,
    logout: String
  },

  data: () => ({
    drawer: false,
    title: "α版"
  }),

  mounted() {
    this.$store.commit("setUserId", { user_id: this.id });

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
<template>
  <v-content>
    <v-layout justify-center>
      <v-flex xs12>
        <v-card>
          <v-container fluid grid-list-md>
            <v-layout row wrap>
              <v-flex v-for="item in items" :key="item.id" xs12 sm6 md4>
                <v-card>
                  <v-card-title>
                    <router-link :to="{ name: 'entry', params: { id: item.id} }">
                      <span class="title font-weight-bold" v-text="item.title"></span>
                    </router-link>
                    <v-spacer></v-spacer>
                    <div class="text-xs-center">
                      <v-chip>{{ item.category }}</v-chip>
                    </div>
                  </v-card-title>
                  <v-img
                    :src="'storage/cavers/'+item.file_name"
                    max-height="300"
                    contain
                    class="white"
                  ></v-img>
                  <v-card-actions>
                    <v-list-tile class="grow">
                      <v-list-tile-avatar color="grey darken-3">
                        <v-img
                          src="https://iwiz-chie.c.yimg.jp/im_sigg_bkt5bJ7Faz4GqIUfbOHxg---x320-y320-exp5m-n1/d/iwiz-chie/que-12156876337"
                        ></v-img>
                      </v-list-tile-avatar>

                      <v-list-tile-content>
                        <v-list-tile-title>{{ item.name }}</v-list-tile-title>
                      </v-list-tile-content>
                      <v-layout align-center justify-end>
                        <v-btn icon>
                          <v-icon>favorite</v-icon>
                        </v-btn>
                        <v-btn icon>
                          <v-icon>share</v-icon>
                        </v-btn>
                      </v-layout>
                    </v-list-tile>
                  </v-card-actions>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card>
      </v-flex>
    </v-layout>
    <v-btn fab bottom right color="primary" dark fixed @click="dialog=true">
      <v-icon>add</v-icon>
    </v-btn>
    <PostComponent :dialog.sync="dialog"/>
  </v-content>
</template>

<script>
import PostComponent from "./PostComponent.vue";
export default {
  components: {
    PostComponent
  },
  data() {
    return {
      dialog: false,
      items: []
    };
  },

  props: {},

  created() {
    this.initialize();
  },

  mounted() {},

  methods: {
    initialize: function() {
      axios.get("api/book").then(res => (this.items = res.data));
    }
  }
};
</script>
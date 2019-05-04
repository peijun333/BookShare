<template>
  <v-container fill-height fluid grid-list-xl>
    <v-layout justify-center wrap>
      <v-flex xs12 md4>
        <template class="v-card-profile">
          <v-avatar slot="offset" class="mx-auto d-block" size="130">
            <img
              src="https://iwiz-chie.c.yimg.jp/im_sigg_bkt5bJ7Faz4GqIUfbOHxg---x320-y320-exp5m-n1/d/iwiz-chie/que-12156876337"
            >
          </v-avatar>
          <v-card-text class="text-xs-center">
            <!-- <h6 class="category text-gray font-weight-thin mb-3">CEO / CO-FOUNDER</h6> -->
            <h4 class="card-title font-weight-light">ペイ</h4>
            <p
              class="card-description font-weight-light"
            >文系大学3年生 / Laravel×Vue.jsが好きです / Python,Dockerの勉強してます /AWSは勉強してた...</p>
            <v-btn color="success" round class="font-weight-light" @click="dialog=true">
              編集
              <v-icon right dark>create</v-icon>
            </v-btn>
          </v-card-text>
        </template>
      </v-flex>
      <v-flex xs12 md8>
        <v-layout justify-center>
          <v-flex xs12>
            <v-card>
              <v-card-actions>
                <v-btn flat>投稿</v-btn>
                <v-btn flat color="purple">いいね</v-btn>
              </v-card-actions>
              <v-container fluid grid-list-md>
                <v-layout row wrap>
                  <v-flex v-for="item in items" :key="item.id" xs12 sm6>
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
      </v-flex>
    </v-layout>
    <ProfileEdit :dialog.sync="dialog"/>
  </v-container>
</template>

<script>
import ProfileEdit from "./ProfileEditDialog.vue";
export default {
  components: {
    ProfileEdit
  },
  data() {
    return {
      items: [],
      dialog: false
    };
  },
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
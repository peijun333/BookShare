<template>
  <v-content>
    <v-layout justify-center>
      <v-flex xs12>
        <v-card>
          <v-container fluid grid-list-md>
            <v-layout row wrap>
              <v-flex v-for="card in cards" :key="card.title" xs12 sm6 md4>
                <v-card>
                  <v-card-title>
                    <router-link :to="{ name: 'post', params: { id: card.id} }">
                      <span class="title font-weight-bold" v-text="card.title"></span>
                    </router-link>
                    <v-spacer></v-spacer>
                    <div class="text-xs-center">
                      <v-chip>{{ card.category }}</v-chip>
                    </div>
                  </v-card-title>
                  <v-img :src="card.src" max-height="300" contain class="white"></v-img>
                  <v-card-actions>
                    <v-list-tile class="grow">
                      <v-list-tile-avatar color="grey darken-3">
                        <v-img
                          src="https://yuruwork.com/wp-content/uploads/2018/05/CoJCckhUMAEkNqc.jpg"
                        ></v-img>
                      </v-list-tile-avatar>

                      <v-list-tile-content>
                        <v-list-tile-title>牧瀬紅莉栖</v-list-tile-title>
                      </v-list-tile-content>

                      <v-layout align-center justify-end>
                        <v-btn icon>
                          <v-icon>favorite</v-icon>
                        </v-btn>
                        <v-btn icon>
                          <v-icon>bookmark</v-icon>
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
      cards: [
        {
          id: 1,
          title: "Java勉強はじめました",
          category: "コンピュター・IT",
          src:
            "https://image.gihyo.co.jp/assets/images/gdp/2018/978-4-297-10332-3.jpg"
        },
        {
          id: 2,
          title: "この本は読むべし",
          category: "趣味・実用",
          src:
            "https://www.kinokuniya.co.jp/images/goods/ar2/web/imgdata2/large/41639/4163907955.jpg"
        },
        {
          id: 3,
          title: "Atcoderはじめます",
          category: "コンピュター・IT",
          src: "https://pbs.twimg.com/media/D2kTwFQU4AEvtjK.jpg"
        },
        {
          id: 4,
          title: "Pre-fab homes",
          category: "コンピュター・IT",
          src: "https://cdn.vuetifyjs.com/images/cards/house.jpg"
        },
        {
          id: 5,
          title: "Favorite road trips",
          category: "コンピュター・IT",
          src: "https://cdn.vuetifyjs.com/images/cards/road.jpg"
        },
        {
          id: 6,
          title: "Best airlines",
          category: "コンピュター・IT",
          src: "https://cdn.vuetifyjs.com/images/cards/plane.jpg"
        }
      ]
    };
  },

  props: {},

  created() {
    this.initialize();
  },

  mounted() {},

  methods: {
    initialize: function() {}
  }
};
</script>
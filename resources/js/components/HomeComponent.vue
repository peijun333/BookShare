<template>
  <v-content>
    <v-container fluid fill-height>
      <v-layout justify-center fluid>
        <v-flex xs12 offset-mx5>Home Component.</v-flex>
      </v-layout>
    </v-container>
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
      dialog: false
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
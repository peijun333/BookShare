<template>
  <div>
    <div>
      <h2>{{article}}</h2>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    this.getArticle();
  },
  data() {
    return {
      article: ""
    };
  },
  methods: {
    getArticle() {
      //   axios.get("/api/article/" + this.$route.params.id).then(res => {
      //     this.article = res.data;
      //   });
      this.article = this.$route.params.id;
    }
  }
};
</script>

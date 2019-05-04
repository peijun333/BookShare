<template>
  <div>
    <div v-for="article in articles" :key="article.name">
      <h2>{{article.name}}</h2>
      <h2>{{article.title}}</h2>
      <h2>{{article.category}}</h2>
      <h2>{{article.body}}</h2>
      <h2>{{article.file_name}}</h2>
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
      articles: []
    };
  },
  methods: {
    getArticle() {
      axios.get("/api/book/entry/" + this.$route.params.id).then(res => {
        this.articles = res.data;
      });
    }
  }
};
</script>

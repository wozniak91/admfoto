<template>
  <main class="section page">
    <div class="loading" v-if="loading">Loading...</div>

    <div v-if="error" class="error">
      {{ error }}
    </div>
    <transition name="fade" mode="out-in">
      <div class="page-content" v-if="page" :key="page.id">
        <div class="container mb-5">
          <h1 class="heading">
            <span class="heading-text" v-text="page.title"></span>
          </h1>
          <div class="text-center" v-html="page.content"></div>
        </div>

        <div class="maps" v-if="page.id == 1"></div>
      </div>
    </transition>
  </main>
</template>

<script>
export default {
  name: "page",
  data() {
    return {
      page: null,
      error: null,
      loading: null,
      meta_title: false,
      meta_description: false,
    };
  },
  metaInfo() {
    const _this = this;

    return {
      titleTemplate: `%s | ${_this.meta_title}`,
      meta: [
        { charset: 'utf-8' },
        { name: 'og:title', content: _this.meta_title },
        { name: 'description', content: _this.meta_description },
        { name: 'og:description', content: _this.meta_description }
      ],
    };
  },
  beforeRouteEnter(to, from, next) {
    axios(`/api/page/${to.params.id}`)
      .then((resp) => resp.data)
      .then((resp) => {
        next((vm) => {
          vm.page = resp;
          vm.meta_title = resp.meta_title;
          vm.meta_description = resp.meta_description;
        });
      });
  },
  beforeRouteUpdate(to, from, next) {
    this.page = null;
    axios(`/api/page/${to.params.id}`)
      .then((resp) => resp.data)
      .then((resp) => {
        this.page = resp;
        this.meta_title = resp.meta_title;
        this.meta_description = resp.meta_description;
        next();
      });
  },
};
</script>

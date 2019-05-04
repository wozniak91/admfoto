<template>
  <div class="app">
    <HeaderComponent/>
    <transition name="fade" mode="out-in">
      <keep-alive>
        <router-view/>
      </keep-alive>
    </transition>
    <FooterComponent/>
  </div>
</template>

<script>

import HeaderComponent from './HeaderComponent'
import FooterComponent from './FooterComponent'

export default {
  components: {
    HeaderComponent,
    FooterComponent,
  },
  name: 'App',
  metaInfo: {
    	title: 'Fotoadamski',
  }
}
</script>

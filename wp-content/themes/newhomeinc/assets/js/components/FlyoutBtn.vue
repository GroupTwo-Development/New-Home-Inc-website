<template>
  <button v-on:click="isHidden = !isHidden" type="button" class="detail-page-cta-options">
    SCHEDULE OPTIONS
  </button>
</template>

<script>
export default {
  name: "FlyoutBtn",
  data(){
    isHidden: false;
  }
}
</script>

<style scoped>

</style>
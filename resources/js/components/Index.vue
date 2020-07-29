<template>
  <v-app>
    <v-content>
      <router-view></router-view>
    </v-content>
  </v-app>
</template>

<script>
import axios from "axios";
import vue from "vue";
import vuetify from "vue";

export default {
  data: () => ({
    lists: [],
  }),

  beforeCreate() {
    console.log("M - Before Create");
  },

  created() {
    console.log("M - Created");
  },

  beforeMount() {
    console.log("M - before Mount");
    this.$router.push("/Main");
  },

  mounted() {
    console.log("M - Mounted");
  },

  beforeUpdate() {
    console.log("M - Before Update");
  },

  updated() {
    console.log("M - Updated");
  },

  beforeDestroy() {
    console.log("M - before Destroy");
  },

  destroyed() {
    console.log("M - Destroyed");
  },
};
</script>

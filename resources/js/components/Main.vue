<template>
  <v-container class="h-100">
    <v-row justify="center" align="center" class="h-100">
      <v-col cols="12" md="5">
        <v-card class="pa-3 mb-5" max-width="700">
          <v-text-field v-model="entry" label="Text" v-on:keyup.enter="addData()"></v-text-field>
          <v-row class="px-3" justify="end">
            <v-btn @click="addData()" color="primary">Enter</v-btn>
          </v-row>
        </v-card>

        <v-card
          @click="openEditDialog(list)"
          v-for="(list, i) in lists"
          :key="i"
          class="pa-3 mb-1"
          max-width="700"
        >{{list.entry}}</v-card>

        <v-dialog v-model="editDialog" max-width="700">
          <v-card class="pa-3" max-width="700">
            <v-text-field v-model="edited" label="Edit Text"></v-text-field>
            <v-row class="px-3" justify="end">
              <v-btn @click="deleteData()" color="error" class="mr-2">Delete</v-btn>
              <v-btn @click="updateData()" color="primary">Edit</v-btn>
            </v-row>
          </v-card>
        </v-dialog>
      </v-col>
    </v-row>
  </v-container>
</template>

<style scoped>
.container,
.row {
  height: 100% !important;
}
</style>


<script>
import axios from "axios";
import vue from "vue";

export default {
  data: () => ({
    entry: "",
    lists: [],
    editDialog: false,
    edited: "",
    editID: "",
  }),

  mounted() {
    this.showList();
  },

  methods: {
    addData() {
      console.log(this.entry);

      const form = new FormData();
      form.append("entry", this.entry);
      axios.post("api/addData", form).then(function (response) {
        //  console.log(response.data);
      });

      this.entry = "";
      this.showList();
    },

    showList() {
      var vm = this;
      axios.get("api/showList").then(function (response) {
        vm.lists = response.data.list;
        // console.log(vm.lists);
      });
    },

    openEditDialog(list) {
      this.editDialog = true;
      this.edited = list.entry;
      this.editID = list.id;
    },

    updateData() {
      var vm = this;
      const form = new FormData();
      form.append("id", vm.editID);
      form.append("entry", vm.edited);
      console.log(form);
      axios.post("api/updateData", form).then(function (response) {
        console.log(response.data);
      });

      this.editDialog = false;
      this.showList();
    },

    deleteData() {
      const form = new FormData();
      form.append("id", this.editID);
      axios.post("api/deleteData", form).then(function (response) {});
      this.showList();
      this.editDialog = false;
    },
  },
};
</script>
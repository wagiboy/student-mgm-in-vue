<template>
  <v-app>
    <v-app-bar app color="primary" dark>
      <div class="d-flex align-center">
        <v-img
          alt="Vuetify Logo"
          class="shrink mr-2"
          contain
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-logo-dark.png"
          transition="scale-transition"
          width="40"
        />

        <v-img
          alt="Vuetify Name"
          class="shrink mt-1 hidden-sm-and-down"
          contain
          min-width="100"
          src="https://cdn.vuetifyjs.com/images/logos/vuetify-name-dark.png"
          width="100"
        />
      </div>

      <v-spacer></v-spacer>

      <v-btn
        href="https://github.com/vuetifyjs/vuetify/releases/latest"
        target="_blank"
        text
      >
        <span class="mr-2">Latest Release</span>
        <v-icon>mdi-open-in-new</v-icon>
      </v-btn>
    </v-app-bar>

    <v-content>
      <div class="text-center">
        <v-btn color="blue" to="/"       class="mt-8 mx-2" text x-large>Home</v-btn>
        <v-btn color="blue" to="/create" class="mt-8 mx-2" dark depressed x-large>Create</v-btn>
        <v-btn color="blue" to="/list"   class="mt-8 mx-2" dark rippple x-large>List</v-btn>
      </div>
      <router-view/>
    </v-content>
  </v-app>
</template>

<script>

export default {
  name: 'App'
};
</script>

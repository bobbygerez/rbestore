<template>
    <v-menu
      offset-x
      offset-y
      left
      :close-on-content-click="false"
      :nudge-width="200"
      v-model="menu"
    >
    
      <v-btn icon flat dark slot="activator">
        <v-badge left
          color="green"

        >
         <span slot="badge">6</span>
        </v-badge>
      <v-icon>shopping_cart</v-icon></v-btn>
      <v-card>
        <v-list>
          <v-list-tile avatar>
            <v-list-tile-avatar>
              <img src="/static/doc-images/john.jpg" alt="John">
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title>John Leider</v-list-tile-title>
              <v-list-tile-sub-title>Founder of Vuetify.js</v-list-tile-sub-title>
            </v-list-tile-content>
            <v-list-tile-action>
              <v-btn
                icon
                :class="fav ? 'red--text' : ''"
                @click="fav = !fav"
              >
                <v-icon>favorite</v-icon>
              </v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-list>
          <v-list-tile>
            <v-list-tile-action>
              <v-switch v-model="message" color="purple"></v-switch>
            </v-list-tile-action>
            <v-list-tile-title>Enable messages</v-list-tile-title>
          </v-list-tile>
          <v-list-tile>
            <v-list-tile-action>
              <v-switch v-model="hints" color="purple"></v-switch>
            </v-list-tile-action>
            <v-list-tile-title>Enable hints</v-list-tile-title>
          </v-list-tile>
        </v-list>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn flat @click="menu = false">Cancel</v-btn>
          <v-btn color="primary" flat @click="menu = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-menu>
</template>
<script>
  export default {
    data: () => ({
      fav: true,
      menu: false,
      message: false,
      hints: true
    })
  }
</script>
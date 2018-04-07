<template>
	<v-menu offset-y>
        <v-btn icon slot="activator">
           <v-icon>more_vert</v-icon>
        </v-btn>
        <v-list dense>
          <v-list-tile v-for="i in 4" :key="i" @click="">
            <v-list-tile-title>{{ i }}</v-list-tile-title>
          </v-list-tile>

          <v-menu offset-x open-on-hover left>
            <v-list-tile slot="activator" @click="">
              <v-list-tile-title>Open submenu</v-list-tile-title>
              <v-list-tile-action class="justify-end">
                <v-icon>play_arrow</v-icon>
              </v-list-tile-action>
            </v-list-tile>
            <v-list dense>
              <v-list-tile v-for="i in 5" :key="i" @click="">
                <v-list-tile-title>{{ i }}</v-list-tile-title>
              </v-list-tile>

                <v-menu offset-x open-on-hover left>
                <v-list-tile slot="activator" @click="">
                  <v-list-tile-title>Open submenu</v-list-tile-title>
                  <v-list-tile-action class="justify-end">
                    <v-icon>play_arrow</v-icon>
                  </v-list-tile-action>
                </v-list-tile>
                <v-list dense>
                  <v-list-tile v-for="i in 5" :key="i" @click="">
                    <v-list-tile-title>{{ i }}</v-list-tile-title>
                  </v-list-tile>
                </v-list>
              </v-menu>
            
            </v-list>
          </v-menu>

          <v-list-tile v-for="i in 5" :key="i" @click="">
            <v-list-tile-title>{{ i + 5 }}</v-list-tile-title>
          </v-list-tile>
        </v-list>
      </v-menu>
</template>
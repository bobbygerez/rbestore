<template>
	<span>
		<span v-if="successLogin">
        <v-btn icon>
        <v-icon>power_settings_new</v-icon>
      </v-btn>
      </span>

      <span v-else>
        <v-btn icon
        @click.stop="loginDialog = !loginDialog"
      >
        <v-icon>lock</v-icon>
      </v-btn>
        <v-btn icon

          @click.stop="dialog = !dialog"
        >
          <v-icon>account_circle</v-icon>
        </v-btn>
      </span>

      <v-btn icon large>
        <v-avatar size="32px" tile>
          <img
            src="https://vuetifyjs.com/static/doc-images/logo.svg"
            alt="Vuetify"
          >
        </v-avatar>
      </v-btn>
      
	</span>
</template>
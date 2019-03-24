<template>
  <v-layout row justify-center>
    <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
      <v-card>
        <v-toolbar dark color="primary">
          <v-btn icon dark @click.native="close">
            <v-icon>close</v-icon>
          </v-btn>
          <v-toolbar-title>本を紹介する</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-toolbar-items>
            <v-btn dark flat @click="submit">投稿する</v-btn>
          </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
          <v-subheader>User Controls</v-subheader>
          <v-list-tile avatar>
            <v-text-field label="タイトル" prepend-icon='title'></v-text-field>
          </v-list-tile>
          <v-list-tile avatar>
            <v-text-field label="画像" @click='pickFile' v-model='imageName' prepend-icon='attach_file'></v-text-field>
            <input
              type="file"
              style="display: none"
              ref="image"
              accept="image/*"
              @change="onFilePicked"
            >
          </v-list-tile>
          <v-list-tile avatar>
            <!-- <v-select
              v-model="value"
              :items="items"
              label="カテゴリ"
              multiple
              prepend-icon='category'
            >
             <template v-slot:selection="{ item, index }">
             <v-chip v-if="index === 0">
              <span>{{ item }}</span>
             </v-chip>
             <span
               v-if="index === 1"
               class="grey--text caption"
             >(+{{ value.length - 1 }} others)
             </span>
             </template>
            </v-select> -->
            <v-select
              v-model="select"
              v-validate="'required'"
              :items="items"
              :error-messages="errors.collect('select')"
              label="カテゴリ"
              data-vv-name="select"
              prepend-icon='category'
              required
            ></v-select>
           </v-list-tile>
           <v-spacer></v-spacer>
           <v-list-tile avatar>
             <v-textarea
              v-model="body"
              :error-messages="errors.collect('body')"
              label="感想"
              counter
              maxlength="120"
              full-width
              single-line
              prepend-icon="create"
            ></v-textarea>
           </v-list-tile>
        </v-list>
        <v-divider></v-divider>
        <v-list three-line subheader>
          
        </v-list>
      </v-card>
    </v-dialog>
  </v-layout>
</template>

<script>
  import Vue from 'vue'
  import VeeValidate from 'vee-validate'

  Vue.use(VeeValidate)

  export default {
    $_veeValidate: {
      validator: 'new'
    },

    data: () => ({
      notifications: false,
      sound: true,
      widgets: false,
      imageName: '',
		  imageUrl: '',
      imageFile: '',
      select: null,
      items: [
        '文学・評論', '人文・思想', '社会・政治', 
        'ノンフィクション', '歴史・地理', 'ビジネス・経済', 
        '投資・金融・会社経営', '科学・テクノロジー', '医学・薬学', 
        'コンピュータ・IT', 'アート・建築・デザイン', '趣味・実用'
        ],
      value: [],
      body: '',
      custom: {
          select: {
            required: 'カテゴリを選択してください'
          }
        }
    }),

    props: {
      dialog: {
        default: false
      },
    },

    created() {
      this.initialize()
    },

    mounted() {
      this.$validator.localize('en', this.dictionary)
    },

    methods: {
      initialize: function() {
      },

      close() {
        this.$emit("update:dialog", false);
      },

      pickFile () {
        this.$refs.image.click ()
      },

      onFilePicked (e) {
			const files = e.target.files
			if(files[0] !== undefined) {
				this.imageName = files[0].name
				if(this.imageName.lastIndexOf('.') <= 0) {
					return
				}
				const fr = new FileReader ()
				fr.readAsDataURL(files[0])
				fr.addEventListener('load', () => {
					this.imageUrl = fr.result
					this.imageFile = files[0] // this is an image file that can be sent to server...
				})
			} else {
				this.imageName = ''
				this.imageFile = ''
				this.imageUrl = ''
			}
    },
    submit () {
        this.$validator.validateAll()
      },
    },

  }
</script>
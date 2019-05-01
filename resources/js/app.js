require("./bootstrap");

import Vue from "vue";
import router from "./router";
import Vuetify from "vuetify";
import colors from "vuetify/es5/util/colors";
import store from "./store";
import "vuetify/dist/vuetify.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";

Vue.use(Vuetify, {
    theme: {
        primary: "#424242",
        secondary: colors.blue.base,
        accent: colors.amber.base
    }
});

const app = new Vue({
    el: "#app",
    router,
    store
});

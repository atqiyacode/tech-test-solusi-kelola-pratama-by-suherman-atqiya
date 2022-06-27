<template>
  <div class="row align-items-center vh-100">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
      <p-card class="mb-2 shadow-lg">
        <template #title class="text-center">
          <h2 class="text-center">Login</h2>
        </template>
        <template #content>
          <form novalidate @submit.stop.prevent="onLogin">
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="email"> Email Address </label>
                <p-input-text
                  v-model="loginField.email"
                  class="p-inputtext-sm"
                  placeholder="Email Address"
                  autocomplete="off"
                  @blur="v$.loginField.email.$touch"
                  :class="v$.loginField.email.$error ? 'p-invalid' : ''"
                />
              </span>
            </div>
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="password"> Password </label>
                <p-password
                  v-model="loginField.password"
                  class="p-inputtext-sm"
                  :feedback="false"
                  toggleMask
                  placeholder="Password"
                  autocomplete="off"
                  :class="v$.loginField.password.$error ? 'p-invalid' : ''"
                />
              </span>
            </div>

            <div class="mt-3 text-center">
              <div class="p-fluid">
                <button
                  type="submit"
                  class="btn btn-block"
                  :class="v$.loginField.$invalid ? 'btn-danger' : 'btn-success'"
                  :disabled="v$.loginField.$invalid"
                >
                  <span class="px-3">
                    <span v-if="isLoading === false"> Login </span>
                    <template v-else>
                      <i
                        class="pi pi-spin pi-spinner"
                        v-if="isLoading === true"
                      />
                      Mohon Tunggu
                    </template>
                  </span>
                </button>
              </div>
            </div>

            <div class="text-center mt-3">
              Belum Punya Akun?
              <router-link :to="{ name: 'register' }" class="text-success">
                Daftar
              </router-link>
            </div>
          </form>
        </template>
      </p-card>
    </div>
  </div>
</template>

<script>
import { mapActions, mapMutations, mapState } from "vuex";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";

export default {
  setup() {
    return {
      v$: useVuelidate(),
    };
  },
  beforeMount() {
    let accessToken = localStorage.getItem("accessToken");
    if (accessToken && accessToken !== "null") {
      this.$router.push({
        name: "home",
      });
    }
  },
  data() {
    return {
      message: "",
      isLoading: false,
    };
  },
  validations: {
    loginField: {
      email: {
        required,
        email,
      },
      password: {
        required,
      },
    },
  },
  computed: {
    ...mapState(["isLoggedIn"]),
    ...mapState("auth", {
      loginField: (state) => state.loginField,
    }),
  },
  methods: {
    ...mapMutations("auth", ["CLEAR_LOGIN_FIELD"]),
    ...mapActions("auth", ["DO_LOGIN"]),

    onLogin() {
      this.isLoading = true;
      this.DO_LOGIN()
        .then((res) => {
          this.v$.loginField.$reset();
          this.CLEAR_LOGIN_FIELD();
          this.$toast.open({
            message: res.message,
            type: "success",
            position: "top",
            duration: 2000,
          });
          setTimeout(() => {
            this.$router.go(0);
          }, 2000);
        })
        .catch((error) => {
          this.$toast.open({
            message: error,
            type: "error",
            position: "top",
            duration: 2000,
          });

          setTimeout(() => {
            this.isLoading = false;
          }, 2000);
        });
    },
  },
  beforeUnmount() {
    this.v$.loginField.$reset();
    this.CLEAR_LOGIN_FIELD();
  },
};
</script>
<template>
  <div class="row align-items-center vh-100">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
      <p-card class="mb-2">
        <template #title class="text-center">
          <h2 class="text-center">Login</h2>
        </template>
        <template #content>
          <form novalidate @submit.stop.prevent="onRegister">
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="name"> Full Name </label>
                <p-input-text
                  v-model="registerField.name"
                  class="p-inputtext-sm"
                  placeholder="Full Name"
                  autocomplete="off"
                  @blur="v$.registerField.name.$touch"
                  :class="v$.registerField.name.$error ? 'p-invalid' : ''"
                />
              </span>
            </div>
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="email"> Email Address </label>
                <p-input-text
                  v-model="registerField.email"
                  class="p-inputtext-sm"
                  placeholder="Email Address"
                  autocomplete="off"
                  @blur="v$.registerField.email.$touch"
                  :class="v$.registerField.email.$error ? 'p-invalid' : ''"
                />
              </span>
            </div>
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="password"> Password </label>
                <p-password
                  v-model="registerField.password"
                  class="p-inputtext-sm"
                  :feedback="false"
                  toggleMask
                  placeholder="Password"
                  autocomplete="off"
                  :class="v$.registerField.password.$error ? 'p-invalid' : ''"
                />
              </span>
            </div>
            <div class="mt-2">
              <span class="p-fluid">
                <label class="form-label" for="password_confirmation">
                  Password confirmation
                </label>
                <p-password
                  v-model="registerField.password_confirmation"
                  class="p-inputtext-sm"
                  :feedback="false"
                  toggleMask
                  placeholder="Password confirmation"
                  autocomplete="off"
                  :class="
                    v$.registerField.password_confirmation.$error
                      ? 'p-invalid'
                      : ''
                  "
                />
              </span>
            </div>

            <div class="mt-3 text-center">
              <div class="p-fluid">
                <button
                  type="submit"
                  class="btn btn-block"
                  :class="
                    v$.registerField.$invalid ? 'btn-danger' : 'btn-success'
                  "
                  :disabled="v$.registerField.$invalid"
                >
                  <span class="px-3">
                    <span v-if="isLoading === false"> Register </span>
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
              Sudah Punya Akun?
              <router-link :to="{ name: 'login' }" class="text-success">
                Masuk
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
  name: "RegisterPage",
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
    registerField: {
      name: {
        required,
      },
      email: {
        required,
        email,
      },
      password: {
        required,
      },
      password_confirmation: {
        required,
      },
    },
  },
  computed: {
    ...mapState(["isLoggedIn"]),
    ...mapState("auth", {
      registerField: (state) => state.registerField,
    }),
  },
  methods: {
    ...mapMutations("auth", ["CLEAR_REGISTER_FIELD"]),
    ...mapActions("auth", ["DO_REGISTER"]),

    onRegister() {
      this.isLoading = true;
      this.DO_REGISTER()
        .then(() => {
          this.v$.registerField.$reset();
          this.CLEAR_REGISTER_FIELD();
          this.$router.go(0);
        })
        .catch((error) => {
          this.isLoading = false;
          this.$toast.open({
            message: error,
            type: "error",
            position: "top",
            duration: 2000,
          });
        });
    },
  },
  beforeUnmount() {
    this.v$.registerField.$reset();
    this.CLEAR_REGISTER_FIELD();
  },
};
</script>
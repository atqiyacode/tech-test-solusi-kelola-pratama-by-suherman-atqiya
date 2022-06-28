<template>
  <div class="row align-items-center vh-100">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
      <p-card>
        <template #title>
          <div class="text-center">Select Order Number</div>
        </template>

        <template #content>
          <div class="p-fluid">
            <p-dropdown
              v-model="form.orderNumber"
              :options="mainData"
              optionLabel="number"
              optionValue="id"
              placeholder="Select Order Number"
              :filter="true"
              :showClear="form.orderNumber ? true : false"
              @filter="filterData"
              @blur="v$.form.orderNumber.$touch()"
              :class="v$.form.orderNumber.$error ? 'p-invalid' : ''"
            >
              <template #option="slotProps">
                <div>
                  <span class="font-weight-bold">
                    {{ slotProps.option.id }} -
                  </span>
                  {{ slotProps.option.number }}
                </div>
              </template>
            </p-dropdown>
          </div>
        </template>
        <template #footer>
          <div class="d-flex justify-content-between">
            <p-button
              label="Home"
              @click="$router.go(-1)"
              icon="pi pi-home"
              iconPos="left"
              class="p-button-sm p-button-info"
            />
            <p-button
              :class="v$.form.$invalid ? 'p-button-danger' : ''"
              :disabled="v$.form.$invalid"
              class="p-button-sm"
              icon="pi pi-arrow-right"
              iconPos="right"
              label="Process"
              @click="showDetail()"
            />
          </div>
        </template>
      </p-card>
    </div>
  </div>
</template>
<script>
import { mapActions, mapState } from "vuex";
import { required } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
export default {
  setup() {
    return {
      v$: useVuelidate(),
    };
  },
  data() {
    return {
      form: {
        orderNumber: null,
      },
    };
  },
  validations() {
    return {
      form: {
        orderNumber: {
          required,
        },
      },
    };
  },
  mounted() {
    this.GET_ORDERS();
  },
  computed: {
    ...mapState("order", {
      mainData: (state) => state.mainData,
    }),
  },
  methods: {
    ...mapActions("order", ["GET_ORDERS"]),

    filterData(e) {
      let payload = e.value;
      this.GET_ORDERS({
        keyword: payload,
      });
    },

    showDetail() {
      if (!this.v$.form.$invalid) {
        this.$router.push({
          name: "order-detail",
          params: { id: this.form.orderNumber },
        });
      }
    },
  },
};
</script>
<template>
  <div class="row align-items-center vh-100">
    <div
      :class="
        detailItem
          ? 'col-md-10 offset-md-1'
          : 'col-lg-6 offset-lg-3 col-md-8 offset-md-2'
      "
    >
      <p-card class="px-3" v-if="detailItem != null">
        <template #title>
          <div class="text-center">{{ serviceName }}</div>
        </template>
        <template #content>
          <p-scroll-panel style="width: 100%; height: 600px" class="custombar1">
            <p-order-form :detailItem="detailItem" />
          </p-scroll-panel>
        </template>
        <template #footer>
          <div class="d-flex justify-content-between">
            <p-button
              icon="pi pi-times"
              label="Batal"
              class="p-button-secondary p-button-sm"
              @click="onClear"
            />
            <p-button
              icon="pi pi-check"
              label="Simpan"
              class="p-button-sm"
              @click="changeValueMainItem(formActive)"
            />
          </div>
        </template>
      </p-card>
      <p-card v-else>
        <template #title>
          <div class="text-center">List Pengerjaan Service</div>
        </template>
        <template #subtitle>
          <div class="text-center">
            <small>
              Silahkan selesaikan pengerjaan service ini, jika sudah selesai
              klik tombol "Order Selesai"
            </small>
          </div>
          <div class="text-center text-danger">
            <small>*Mandatory (harus dilengkapi)</small>
          </div>
        </template>

        <template #content>
          <div class="row">
            <div class="col-12 mb-2" v-for="(item, index) in form" :key="index">
              <div
                class="card px-2 shadow-sm"
                style="cursor: pointer"
                @click="onServiceDetail(item)"
              >
                <div
                  class="
                    card-body
                    align-items-center
                    d-flex
                    justify-content-center
                  "
                >
                  <div class="mx-3">
                    <p-avatar
                      :image="item.service_id.icon.icon_link"
                      shape="circle"
                    />
                  </div>
                  <strong>
                    {{ item.service_id.service_name }}
                    <span
                      v-if="item.service_id.mandatory"
                      class="text-danger fs-17"
                      >*</span
                    >
                  </strong>
                  <div class="mx-3" v-if="item.service_id.value">
                    <p-avatar
                      :icon="'pi pi-check'"
                      shape="circle"
                      style="background-color: #0bd900; color: #ffffff"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </template>
        <template #footer>
          <div class="d-flex justify-content-between">
            <p-button
              label="Back"
              @click="$router.go(-1)"
              icon="pi pi-arrow-left"
              iconPos="left"
              class="p-button-sm p-button-secondary"
            />
            <p-button
              icon="pi pi-check"
              label="Submit"
              :disabled="enableSubmit"
              @click="finishOrder"
            />
          </div>
        </template>
      </p-card>
    </div>
  </div>
</template>
<script>
import { mapActions, mapState } from "vuex";
import OrderForm from "@/views/Order/Form.vue";
export default {
  data() {
    return {
      detailItem: null,
      serviceName: "",
      form: [],
      formActive: null,
      enableSubmit: true,
    };
  },
  components: {
    "p-order-form": OrderForm,
  },
  mounted() {
    this.GET_DETAIL(this.$route.params.id);
  },
  computed: {
    ...mapState("order", {
      detailData: (state) => state.detailData,
      services: (state) => state.services,
      servicesJson: (state) => state.servicesJson,
    }),
  },
  watch: {
    servicesJson(data) {
      if (data) {
        data.forEach((val) => {
          this.form.push(val);
        });
      }
    },
  },
  methods: {
    ...mapActions("order", ["GET_DETAIL"]),

    onServiceDetail(item) {
      this.detailItem = item.json;
      this.serviceName = item.service_id.service_name;
      this.formActive = item.service_id.id;
    },

    onClear() {
      this.detailItem = null;
    },

    checkValue() {
      var item = this.form.filter((item) => item.service_id.value == "OK");
      if (item.length == this.form.length) {
        this.enableSubmit = false;
      }
    },

    changeValueMainItem(id) {
      var item = this.form.find((item) => item.service_id.id === id);
      item.service_id.value = "OK";
      this.checkValue();
      this.onClear();
      this.$toast.open({
        message: this.serviceName,
        type: "success",
        position: "top",
        duration: 2000,
      });
    },

    finishOrder() {
      this.$toast.open({
        message: "Finish Order",
        type: "success",
        position: "top",
        duration: 2000,
      });

      this.$router.push({
        name: "home",
      });
    },
  },
};
</script>

<style>
.p-scrollpanel p {
  padding: 0.5rem;
  line-height: 1.5;
  margin: 0;
}

.p-scrollpanel.custombar1 .p-scrollpanel-wrapper {
  border-right: 9px solid var(--surface-border);
}

.p-scrollpanel.custombar1 .p-scrollpanel-bar {
  background-color: var(--primary-color);
  opacity: 1;
  transition: background-color 0.2s;
}

.p-scrollpanel.custombar1 .p-scrollpanel-bar:hover {
  background-color: #007ad9;
}

.p-scrollpanel.custombar2 .p-scrollpanel-wrapper {
  border-right: 9px solid var(--surface-border);
  border-bottom: 9px solid var(--surface-border);
}

.p-scrollpanel.custombar2 .p-scrollpanel-bar {
  background-color: var(--surface-ground);
  border-radius: 0;
  opacity: 1;
  transition: background-color 0.2s;
}
</style>
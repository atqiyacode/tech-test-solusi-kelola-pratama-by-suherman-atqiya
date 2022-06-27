<template>
  <div class="row align-items-center vh-100">
    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
      <p-card class="shadow-lg">
        <template #title>
          <div class="text-center">PT Solusi Integrasi Pratama</div>
        </template>
        <template #subtitle>
          <div class="text-center">Technical Test - Suherman Atqiya</div>
        </template>
        <template #content>
          <ul>
            <li>
              Membuat REST-API dari database “sip_test” table service_headers
              dan service_details dengan format JSON seperti pada link berikut:
              <a
                href="https://drive.google.com/file/d/1NYNV04IWFA5yFcOgxCPVNQwcEPMkrNY4/view?usp=sharing"
                >Sample API Response JSON</a
              >
            </li>
            <li>
              Membuat Dynamic UI dari JSON seperti berikut:
              <a
                href="https://drive.google.com/file/d/1pg5Q-nO-TwRDjwe6OtRX07DN_HKfPU_F/view?usp=sharing"
                >Sample Test UI</a
              >
            </li>
          </ul>
        </template>
        <template #footer>
          <div class="d-flex justify-content-between">
            <p-button
              icon="pi pi-power-off"
              label="Logout"
              @click="onLogout()"
              class="p-button-sm p-button-danger"
            />
            <p-button
              class="p-button-sm p-button-info"
              icon="pi pi-list"
              label="Order List"
              @click="
                $router.push({
                  name: 'order',
                })
              "
            />
          </div>
        </template>
      </p-card>
    </div>
  </div>
</template>
<script>
import { mapActions, mapState } from "vuex";
import { useConfirm } from "primevue/useconfirm";
export default {
  setup() {
    const confirm = useConfirm();
    return {
      confirm,
    };
  },
  computed: {
    ...mapState(["isLoggedIn"]),
  },
  methods: {
    ...mapActions("auth", ["DO_LOGOUT"]),

    onLogout() {
      this.confirm.require({
        message: "Apakah anda ingin keluar?",
        header: "Konfirmasi",
        icon: "pi pi-info-circle",
        acceptClass: "p-button-danger",
        accept: () => {
          this.DO_LOGOUT()
            .then((res) => {
              this.$toast.open({
                message: res.message,
                type: "success",
                position: "top",
                duration: 2000,
              });
              setTimeout(() => {
                this.$router.push({
                  name: "login",
                });
              }, 2000);
            })
            .catch((err) => {
              console.log(err);
            });
        },
      });
    },
  },
};
</script>
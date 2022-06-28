<template>
  <p-card class="px-3">
    <template #title>
      <div class="text-center">{{ service.service_name }}</div>
    </template>
    <template #content>
      <p-scroll-panel style="width: 100%; height: 600px" class="custombar1">
        <div v-for="(item, index) in detailItem" :key="index">
          <h5 class="fw-bold mb-3">
            {{ `${index + 1}.` }}
            {{ item.description }}
          </h5>
          <div class="p-fluid">
            <template v-for="(child, id) in item.child" :key="id">
              <!-- text -->
              <div class="field mb-2" v-if="child.type == 'text'">
                <div class="p-fluid">
                  <span class="fw-bold"
                    >{{ child.description }}
                    <strong class="text-danger" v-if="child.mandatory">
                      (*)
                    </strong></span
                  >
                  <p-input-text
                    @input="onChangeText($event, child.id)"
                    :value="child.value"
                    :type="text"
                    :placeholder="child.description"
                    :required="child.mandatory"
                    :class="child.mandatory ? 'p-invalid' : ''"
                    class="m-2"
                  />
                  <small class="font-monospace">{{ child.remark }}</small>
                </div>
              </div>

              <!-- photo -->
              <div class="field mb-2" v-if="child.type == 'photo'">
                <div class="p-fluid">
                  <small class="fw-bold">
                    {{ child.description }}
                    <strong class="text-danger" v-if="child.mandatory">
                      (*)
                    </strong>
                  </small>
                  <file-pond
                    style="cursor: pointer"
                    :name="child.id"
                    class-name="my-pond"
                    label-idle="Drop files here..."
                    :allow-multiple="child.is_multiple"
                    accepted-file-types="image/*"
                    @files="child.value"
                    @addfile="onAddFile"
                    @removefile="onRemoveFile(child.id)"
                    @change="OnProcessUpload(child.id)"
                  />
                  <small class="font-monospace">{{ child.remark }}</small>
                </div>
              </div>

              <!-- video -->
              <div class="field mb-2" v-if="child.type == 'video'">
                <div class="p-fluid">
                  <small class="fw-bold">
                    {{ child.description }}
                    <strong class="text-danger" v-if="child.mandatory">
                      (*)
                    </strong>
                  </small>
                  <file-pond
                    style="cursor: pointer"
                    :name="child.id"
                    class-name="my-pond"
                    label-idle="Drop files here..."
                    :allow-multiple="child.is_multiple"
                    accepted-file-types="video/mp4,video/x-m4v,video/*"
                    @files="child.value"
                    @addfile="onAddVideo"
                    @removefile="onRemoveFile(child.id)"
                    @change="OnProcessUpload(child.id)"
                  />
                  <small class="font-monospace">{{ child.remark }}</small>
                </div>
              </div>

              <!-- checkbox -->
              <div class="form-check mx-2" v-if="child.type == 'checkbox'">
                <input
                  class="form-check-input"
                  type="checkbox"
                  :id="child.id"
                  v-model="child.value"
                  :checked="child.value"
                  @change="onChecked($event, child.value)"
                />
                <label class="form-check-label fw-bold" :for="child.id">
                  {{ child.description }}
                  <strong class="text-danger" v-if="child.mandatory">
                    (*)
                  </strong>
                </label>
              </div>
              <p-divider></p-divider>
            </template>
          </div>
        </div>
      </p-scroll-panel>
    </template>
    <template #footer>
      <div class="d-flex justify-content-between">
        <p-button
          icon="pi pi-question"
          label="Draft"
          class="p-button-secondary p-button-sm"
          @click="onClear"
        />
        <p-button
          :disabled="isLoading"
          class="p-button-sm"
          @click="changeValueMainItem(formActive)"
        >
          <span class="px-3">
            <span v-if="isLoading === false"> Submit </span>
            <template v-else>
              <i class="pi pi-spin pi-spinner" v-if="isLoading === true" />
              Sedang Diproses
            </template>
          </span>
        </p-button>
      </div>
    </template>
  </p-card>
</template>
<script>
import { useConfirm } from "primevue/useconfirm";
import { mapActions } from "vuex";

export default {
  name: "OrderForm",
  setup() {
    const confirm = useConfirm();
    return {
      confirm,
    };
  },
  data() {
    return {
      selectedChecked: [],
      checkMandatory: [],
      disableSubmit: true,
      isLoading: false,
      uploadId: null,
    };
  },
  props: {
    detailItem: Array,
    formActive: String,
    service: Object,
  },
  emits: ["clear", "changeValue"],

  methods: {
    ...mapActions("upload", ["UPLOAD_IMAGE", "UPLOAD_VIDEO"]),

    finalCheck() {
      console.log(this.checkMandatory.length);
      this.disableSubmit = this.checkMandatory.length > 0 ? true : false;
    },

    onClear() {
      this.$emit("clear", null);
    },

    changeValueMainItem(id) {
      this.isLoading = true;
      if (!this.disableSubmit) {
        this.confirm.require({
          message: "Apakah sudah yakin?",
          header: "Konfirmasi",
          icon: "pi pi-info-circle",
          acceptClass: "p-button-info",
          accept: () => {
            this.$emit("changeValue", id);
            this.isLoading = false;
          },
        });
      } else {
        this.$toast.open({
          message: "Form Belum Lengkap",
          type: "error",
          position: "top",
          duration: 2500,
        });

        setTimeout(() => {
          this.isLoading = false;
        }, 2500);
      }
    },

    onChecked() {
      this.checkMandatoryValue(this.detailItem);
      this.finalCheck();
    },

    checkMandatoryValue(data) {
      this.checkMandatory = [];
      for (let i = 0; i < data.length; i++) {
        const parent = data[i];
        parent.child.map((child) => {
          if (child.mandatory && child.value != true) {
            this.checkMandatory.push(child);
          }
        });
      }
    },

    handleFilePondInit() {
      console.log("FilePond has initialized");
    },

    onRemoveFile(id) {
      let data = this.detailItem;
      this.checkMandatory = [];
      for (let i = 0; i < data.length; i++) {
        const parent = data[i];
        parent.child.map((child) => {
          if (child.id == id) {
            child.value = null;
          }
          if (child.mandatory && child.value == null) {
            this.checkMandatory.push(child);
          }
        });
      }
      this.finalCheck();
    },

    OnProcessUpload(id) {
      this.uploadId = id;
    },

    onAddFile(err, source) {
      this.UPLOAD_IMAGE(source.file)
        .then((result) => {
          let data = this.detailItem;
          this.checkMandatory = [];
          for (let i = 0; i < data.length; i++) {
            const parent = data[i];
            parent.child.map((child) => {
              if (child.id == this.uploadId) {
                child.value = result.data.id;
              }
              if (child.mandatory && child.value == null) {
                this.checkMandatory.push(child);
              }
            });
          }
          this.finalCheck();
        })
        .catch((err) => {
          console.warn(err);
        });
    },
    onAddVideo(err, source) {
      this.UPLOAD_VIDEO(source.file)
        .then((result) => {
          let data = this.detailItem;
          this.checkMandatory = [];
          for (let i = 0; i < data.length; i++) {
            const parent = data[i];
            parent.child.map((child) => {
              if (child.id == this.uploadId) {
                child.value = result.data.id;
              }
              if (child.mandatory && child.value == null) {
                this.checkMandatory.push(child);
              }
            });
          }
          this.finalCheck();
        })
        .catch((err) => {
          console.warn(err);
        });
    },
    onChangeText(event, id) {
      let value = event.target.value;
      let data = this.detailItem;
      this.checkMandatory = [];
      for (let i = 0; i < data.length; i++) {
        const parent = data[i];
        parent.child.map((child) => {
          if (child.id == id) {
            child.value = value;
          }
          if (child.mandatory && child.value == null) {
            this.checkMandatory.push(child);
          }
        });
      }
      this.finalCheck();
    },
  },
};
</script>
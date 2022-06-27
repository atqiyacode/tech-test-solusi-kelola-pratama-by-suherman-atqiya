<template>
  <div v-for="item in detailItem" :key="item.id">
    <p class="fw-bold">
      {{ item.description }}
    </p>
    <div class="p-fluid px-2">
      <template v-for="(child, id) in item.child" :key="id">
        <!-- text -->

        <div class="field mb-2" v-if="child.type == 'text'">
          <small class="form-label">{{ child.description }}</small>
          <p-input-text
            :type="child.type"
            :placeholder="child.description"
            :required="child.mandatory"
          />
        </div>

        <!-- photo -->
        <div class="field mb-2" v-if="child.type == 'photo'">
          <p-file-upload chooseLabel="Browser" mode="basic" />
          <small class="text-small">{{ child.description }}</small>
        </div>

        <!-- video -->
        <div class="field mb-2" v-if="child.type == 'video'">
          <p-file-upload chooseLabel="Browser" mode="basic" />
          <small class="text-small">{{ child.description }}</small>
        </div>

        <!-- checkbox -->
        <div class="field-checkbox mb-2" v-if="child.type == 'checkbox'">
          <p-checkbox
            :id="child.id"
            :name="item.id"
            :value="child"
            v-model="selectedCategories"
            :required="child.mandatory"
          />
          <label class="mx-3" :for="child.id">
            <small>{{ child.description }}</small>
          </label>
        </div>

        <p-divider />
      </template>
    </div>
  </div>
</template>
<script>
export default {
  name: "OrderForm",
  data() {
    return {
      selectedCategories: [],
    };
  },
  props: {
    detailItem: Array,
  },
  emits: ["clear"],
  methods: {
    onClear() {
      this.$emit("clear", null);
    },
  },
};
</script>
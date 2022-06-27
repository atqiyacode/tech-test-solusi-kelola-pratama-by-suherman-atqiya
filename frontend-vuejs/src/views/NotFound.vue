<template>
  <div class="row align-items-center vh-100">
    <div class="col-md-6 offset-md-3">
      <h1 class="text-center">Page Not Found</h1>
      <div class="d-flex justify-content-center">
        <p-button
          label="Back"
          @click="$router.go(-1)"
          icon="pi pi-arrow-left"
          iconPos="left"
        />
      </div>
    </div>
  </div>
</template>

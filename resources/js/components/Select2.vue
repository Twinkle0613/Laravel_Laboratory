<template>
  <select class="input-sm" >
    <slot></slot>
  </select>
</template>

<style src="select2/dist/css/select2.min.css"></style>
<style src="select2-bootstrap-theme/dist/select2-bootstrap.min.css"></style>

<script>
// import $ from 'jquery'
// import Select2 from 'select2';
export default {
  props: ["options", "value", "name"],
  data() {
      return {
          msg:'lo',
      }
  },
  mounted() {
    var vm = this;
    $(this.$el)
      // init select2
      .select2({ theme:"bootstrap",data: this.options })
      .val(this.value)
      .trigger("change")
      // emit event on change.
      .on("change", function () {
        vm.$emit("input", this.value);
      });
  },
  watch: {
    value: function (value) {
      // update value
      $(this.$el)
        .val(value)
        .trigger("change");
    },
    options: function (options) {
      // update options
      $(this.$el)
        // .empty()
        .select2({ data: options });
    }
  },
  destroyed: function () {
    $(this.$el)
      .off()
      .select2("destroy");
  }



}
</script>


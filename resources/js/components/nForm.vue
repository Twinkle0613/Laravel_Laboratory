<template>
  <form id="form" class="form-horizontal">
    <div class="card-body">
      <div v-for="input in inputs_info" :key="input.key" class="form-group row">
        <label class="col-sm-2 col-form-label">{{input.label}}</label>
        <div class="col-sm-10">
          <input
            v-if="['text','email','password'].includes(input.type)"
            v-model="inputs[input.key]"
            @input="update"
            :for="input.for"
            :type="input.type"
            class="form-control"
            :id="'input'+input.key"
            :placeholder="input.label"
          />
          <v-select
            v-else-if="['select'].includes(input.type)"
            :multiple="input.multiple"
            v-model="inputs[input.key]"
            :options="['Canada','United States']"
          />
        </div>
      </div>
    </div>
  </form>
</template>

<script>


export default {
  data: () => {
    return {
      inputs: {},
      number: null,
    };
  },
  computed: {
  },
  props: {
    inputs_info: {},
  },
  mounted() {
  },
  methods: {
    update() {
      this.$emit('update', this.inputs);
    },
  },
  created() {
    let temp = {};
    this.inputs_info.forEach(element => {
      temp[element.key] = null;
    });
    console.log(this.inputs)

    this.inputs = temp;
  },
}
</script>

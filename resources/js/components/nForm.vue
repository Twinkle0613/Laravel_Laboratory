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
            class="style-chooser"
            v-else-if="['select'].includes(input.type)"
            :multiple="input.multiple"
            v-model="inputs[input.key]"
            :options="options[input.key]"
            label="name"
            :reduce="item => item.id"
            placeholder="Select"
          />
          <!-- 
            @search="(search,loading) => {onSearch(search,loading,input.key)}"
           -->
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
      options: {},
      api:{},
    };
  },
  computed: {
    getOptions(){
      return this.options;
    }
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
    onSearch(search, loading, key) {
      loading(true);
      this.search(loading, search, key);
    },
    search: _.debounce( function (loading, search, key){
       this.$http.get(this.api[key]).then(response => {
          var data = response.data.data;
          var ids = new Set(this.options[key].map(item => item.id));
          this.options[key] = [...this.options[key],...data.filter(item => !ids.has(item.id))];
          loading(false);
       });
 
    }, 350)

  },
  created() {
    let temp = {};

    this.inputs_info.forEach(element => {
      temp[element.key] = null;
    });

    this.inputs = temp;

    var haveOptions = this.inputs_info.filter((item) => {
      return item.options
    });

    haveOptions.forEach(element => {
      this.$set(this.options,element.key,element.options); //reactive the array object. 
    });

    var haveApi = this.inputs_info.filter((item) => {
      return item.api
    });

    haveApi.forEach(element => {
      this.$set(this.api,element.key,element.api); //reactive the array object. 
      let key = element.key;
      this.$http.get(element.api).then(response => {
          var data = response.data.data;
          var ids = new Set(this.options[key].map(item => item.id));
          this.options[key] = [...this.options[key],...data.filter(item => !ids.has(item.id))];
       });
    });
    
  },
}
</script>

<style>
/* .style-chooser .vs__selected {
    background-color: #6cb2eb;
  } */
</style>


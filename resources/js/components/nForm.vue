<template>
  <form id="form" class="form-horizontal" >
    <div class="card-body">
      <div v-for="input in inputs_info" :key="input.key" class="form-group row">
        <label class="col-sm-2 col-form-label">
          {{input.label}}
          <span class="text-danger">{{' *'}}</span>
        </label>
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
            @input="update"
            :options="options[input.key]"
            label="name"
            :reduce="item => item.id"
            placeholder="Select"
          />
           <!-- 
            @search="(search,loading) => {onSearch(search,loading,input.key)}"
           -->
          <div v-else-if="['image'].includes(input.type)">
            <b-img class="mb-3" v-bind="mainProps" center :src="images_url[input.key]" rounded="circle" alt="Center image"></b-img>
            <b-form-file
              :state="Boolean(inputs[input.key])"
              placeholder="Choose a file or drop it here..."
              drop-placeholder="Drop file here..."
              @input="(file)=>{addFile(file,input.key)}"
            ></b-form-file>
          </div>
          <vue-dropzone 
            ref="VueDropzone"
            v-else-if="['file'].includes(input.type)"
            id="drop1"
            :options="dropOptions"
            @vdropzone-file-added="(file)=>{addFile(file,input.key)}"
          ></vue-dropzone>

         
        </div>
      </div>
    </div>
  </form>
</template>
<script>

// const getTemplate = () => `
// <div class="dz-preview dz-file-preview">
//   <div class="dz-image">
//     <div data-dz-thumbnail-bg></div>
//   </div>
//   <div class="dz-details">
//     <div class="dz-size"><span data-dz-size></span></div>
//     <div class="dz-filename"><span data-dz-name></span></div>
//   </div>
//   <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
//   <div class="dz-error-message"><span data-dz-errormessage></span></div>
//   <div class="dz-success-mark"><i class="fa fa-check"></i></div>
//   <div class="dz-error-mark"><i class="fa fa-close"></i></div>
// </div>
// `;
const default_image = 'bower_components/admin-lte/dist/img/blue-unknown.jpg';

export default {
  data: () => {
    return {
      inputs: {},
      options: {},
      api: {},
      mainProps: { width: 150, height: 150, class: 'm1' },
      dropOptions: {
        url: "https://httpbin.org/post",
        addRemoveLinks: true,
        uploadMultiple: false,
        // parallelUploads:4,
        maxFiles: 1,
        // previewTemplate: getTemplate()
      },
      files: [],
      file: null,
      images_url:{},
      img: '',
    };
  },
  computed: {
    getOptions() {
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
    search: _.debounce(function (loading, search, key) {
      this.$http.get(this.api[key]).then(response => {
        var data = response.data.data;
        var ids = new Set(this.options[key].map(item => item.id));
        this.options[key] = [...this.options[key], ...data.filter(item => !ids.has(item.id))];
        loading(false);
      });

    }, 350),
    addFile(file,key) {
      this.inputs[key] = new Blob([file], {type: file.type});
      this.images_url[key] = URL.createObjectURL(file);
      this.$emit('update', this.inputs);
    },

  },
  async created() {
    let temp = {};

    //----------Initialize Inputs------------------
    await this.inputs_info.forEach(element => {
      temp[element.key] = null;
    });

    this.inputs = temp;

    //----------Initialize Select------------------
    await this.inputs_info.filter((item) => {
      return (item.type == 'select')
    }).forEach(element => {
      if(element.options){
        this.$set(this.options, element.key, element.options);
      }else{
        this.$set(this.options, element.key, []);
      }

      if(element.api){
        this.$set(this.api, element.key, element.api); //reactive the array object. 
        let key = element.key;
        this.$http.get(element.api).then(response => {
          var data = response.data.data;
          var ids = new Set(this.options[key].map(item => item.id));
          this.options[key] = [...this.options[key], ...data.filter(item => !ids.has(item.id))];
          this.options[key] = data;
        });
      }
    });

    //----------Initialize Image------------------
    await this.inputs_info.filter((item) => {
      return (item.type == 'image')
    }).forEach(element => {
        this.$set(this.images_url, element.key, default_image); 
    });

  },
}
</script>

<style>
.style-chooser .vs__search::placeholder {
    /* background-color: #6cb2eb; */
    color: #939BAB;
  }
</style>

<style>
/* #drop1 {
    height: 200px;
    padding: 40px;
    color: white;
    background: black;
  }

  #drop1 .dz-preview {
    width: 160px;
  } */
/* ... */
</style>
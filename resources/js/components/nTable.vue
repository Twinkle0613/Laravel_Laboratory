<template>
  <div class="row container-fluid">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{title+' '+'Table'}}</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-toggle="add" title="Download">
              <i class="fas fa-download"></i> CSV
            </button>
            <button type="button" class="btn btn-tool" data-toggle="add" title="Download">
              <i class="fas fa-download"></i> PDF
            </button>
            <button type="button" class="btn btn-tool" data-toggle="add" title="Download">
              <i class="fas fa-download"></i> EXCEL
            </button>
            <!-- <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#action-modal" @click="showModal('add')" > -->
            <button
              type="button"
              class="btn btn-tool"
              data-target="#action-modal"
              @click="showModal('add')"
            >
              <i class="fas fa-lg fa-plus-square"></i>
            </button>
            <button
              type="button"
              class="btn btn-tool"
              data-card-widget="collapse"
              data-toggle="tooltip"
              title="Collapse"
            >
              <i class="fas fa-minus"></i>
            </button>
            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>-->
          </div>
        </div>
        <div class="card-body p-0">
          <table id="user_table" class="table table-striped projects">
            <thead class="text-center">
              <tr>
                <th
                  v-for="field in table_fields"
                  :key="field.key"
                  :style="{'width':field.width}"
                >{{field.label}}</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data) in table_data" :key="data.id" class="text-center">
                <td v-for="field in table_fields" :key="field.key">
                  <span v-if="['text'].includes(field.type)">{{data[field.key]}}</span>
                  <div
                    v-else-if="['tag'].includes(field.type) && (data[field.key])"
                    :style="{'textAlign': 'left'}"
                  >
                    <b-badge
                      variant="primary"
                      v-for="tag in data[field.key]"
                      :key="tag[field.data]"
                      :style="{'fontSize': '90%','margin':'2px','fontWeight':'normal'}"
                    >{{tag[field.data]}}</b-badge>
                  </div>
                </td>
                <td class="project-actions text-right" :style="{'minWidth': '238px'}">
                  <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#action-modal" @click="showModal('view',data.id)" > -->
                  <button
                    class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#action-modal"
                  >
                    <i class="fas fa-search"></i>
                    View
                  </button>
                  <button class="btn btn-info btn-sm" @click="showModal('edit',data.id)">
                    <i class="fas fa-pencil-alt"></i>
                    Edit
                  </button>
                  <button class="btn btn-danger btn-sm" @click="showModal('delete',data.id)">
                    <i class="fas fa-trash"></i>
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-left">
            <li class="page-item">
              <a class="page-link" @click="updatePageNo(first_page)">&laquo;</a>
            </li>
            <li v-for="(n) in meta.last_page" :key="n" class="page-item" @click="updatePageNo(n)">
              <a class="page-link">{{n}}</a>
            </li>
            <li class="page-item">
              <a class="page-link" @click="updatePageNo(meta.last_page)">&raquo;</a>
            </li>
          </ul>

          <select
            class="form-control select2 float-right form-control-sm"
            v-model="per_page"
            @change="updatePerPage"
            style="width: 100px;"
          >
            <option selected="selected">3</option>
            <option>5</option>
            <option>10</option>
            <option>20</option>
            <option>50</option>
            <option>100</option>
          </select>
        </div>
      </div>

      <div ref="action-modal" class="modal fade" id="action-modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{modal.title}}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <n-form ref="nForm" :inputs_info="inputs_info" @update="nFormUpdate"></n-form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button
                type="button"
                class="btn btn-primary"
                data-dismiss="modal"
                v-on:click="postData(modal.mode)"
              >{{modal.button_label}}</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <b-modal
      id="action-modal"
      v-model="modal.show"
      @hidden="resetModal"
      @show="resetModal"
      ref="action-modal"
      size="lg"
      :title-html="modal.title"
      title-tag="h4"
    >
      <n-form ref="nForm" :inputs_info="inputs_info" @update="nFormUpdate"></n-form>
      <template v-slot:modal-footer>
        <div class="w-100">
          <b-button type="button" class="btn btn-default float-left" @click="modal.show=false">Close</b-button>
          <b-button
            type="button"
            class="btn btn-primary float-right"
            variant="primary"
            v-on:click="postData(modal.mode,modal.id)"
          >{{modal.button_label}}</b-button>
        </div>
      </template>
    </b-modal>
  </div>
</template>

<script>


export default {
  data: () => {
    return {
      show_modal: false,
      table_data: [],
      first_page: 1,
      per_page: 5,
      page_no: 1,
      meta: [],
      modal: {
        title: '',
        button_label: 'Submit',
        mode: '',
        show: false,
        id: null,
      },
      inputs: []


    };
  },
  computed: {
  },
  props: {
    table_fields: Array,
    url_path: String,
    title: String,
    inputs_info: Array
  },
  mounted() {
    this.inputs = this.$refs.nForm.inputs;
  },
  methods: {
    resetModal() {
      this.inputs_info.forEach(element => {
        this.inputs[element.key] = null;
      });
    },
    showModal(action, id = null) {
      this.modal.button_label = action.charAt(0).toUpperCase() + action.slice(1);
      this.modal.title = action.charAt(0).toUpperCase() + action.slice(1) + ' ' + this.title;
      this.modal.mode = action;
      this.modal.id = id ? id : null;
      if (['add', 'edit', 'view'].includes(action)) {
        if (['edit', 'view'].includes(action)) {
          this.fetchDataWithId(id);
        }
        this.modal.show = true;
      } else {
        this.deleteModal(id);
      }
    },
    deleteModal(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          this.$http.delete(this.url_path + '/' + id)
            .then((response) => {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }).catch((error) => {
              this.noticeError(error);
            }).then(() => {
              this.fetchData();
            });
        }
      })
    },
   postData(mode, id = null) {
      const data = new FormData();

      for ( var key in this.inputs ) {
          if(this.inputs[key]){
              if(Array.isArray(this.inputs[key])){
                this.inputs[key].forEach( (item,index) =>{
                  data.append(`${key}[${index}]`,item);
                })
              }else{
                 data.append(key,this.inputs[key]);
              }
          }
      }
      
      if(mode == 'edit'){
        data.append("_method", "PUT");
      }
     this.$http({
        method: (mode == 'add') ? 'post' : 'post',
        url: this.url_path + (id ? '/' + id : ''),
        data: data,
      })
      .then((response) => {
        Swal.fire({
          icon: 'success',
          title: 'Your work has been saved',
          showConfirmButton: true,
          timer: 1300
        })
        var self = this;
        setTimeout(function () {
          self.modal.show = false;
        }, 500);

      }).catch((error) => {
        this.noticeError(error);
      }).then(() => {
        this.fetchData();
      });
    },
    updatePerPage() {
      this.page_no = this.first_page;
      this.fetchData();
    },
    updatePageNo(page_no) {
      this.page_no = page_no;
      this.fetchData();
    },
    nFormUpdate(value) {
      console.log('nFormUpdate',value);
      this.inputs = value;
    },
    fetchData: function () {
      this.$http.get(this.url_path, {
        params: {
          'per_page': this.per_page,
          'page_number': this.page_no
        }
      })
        .then((response) => {
          this.table_data = response.data.data;
          this.meta = response.data.meta;
        })
    },
    noticeError(error) {
      let errors = error.response.data.errors;
      let error_title = error.response.data.message;
      let error_info = Object.values(errors).toString().split(',').join("<br/>");
      Swal.fire({
        icon: 'error',
        title: error_title,
        html: error_info,
        showConfirmButton: true,
      })
    },
    fetchDataWithId(id) {
      this.$http.get(this.url_path + '/' + id)
        .then((response) => {
          let data = response.data.data;
          var nForm = this.$refs.nForm;
          this.inputs_info.forEach(element => {
            if (element.type == 'select') {
              nForm.inputs[element.key] = _.map(data[element.key], 'id')
            }else if(element.type == 'image'){
              // nForm.inputs[element.key] = data['media'][0];
              if(element.type == 'image' && data['image_url']){
                nForm.images_url[element.key] = data['image_url'];
              }
            }else{
              nForm.inputs[element.key] = data[element.key];
            }
          });
          this.inputs = nForm.inputs;
          console.log(this.inputs);
        }).catch((error) => {
          this.noticeError(error);
        }).then(() => {
          this.fetchData();
        });
    }
  },
  created() {
    this.fetchData();
  }
}
</script>

<template>
      <form id="form" class="form-horizontal">
        <div class="card-body">   
            <div v-for="input in inputs_info" :key="input.key" class="form-group row">
                <label  class="col-sm-2 col-form-label">{{input.label}}</label>
                <div class="col-sm-10">
                    <input v-model="inputs[input.key]" @input="update" :for="input.for" :type="input.type" class="form-control" :id="'input'+input.key" :placeholder="input.label" >
                </div>
            </div>
            <!-- {{inputs}} -->
        </div>
      </form>            
</template>

<script>

    
    export default {
        data: () => {
            return {
                inputs:{},
            };
        },
        computed:{
        },
        props: {
            inputs_info: {},
        },
        mounted() {
        },
        methods:{
            update(){
                this.$emit('update',this.inputs);
            },
        },
        created(){
           let temp = {};
           this.inputs_info.forEach(element => {
               temp[element.key]=null;
           });
            console.log(this.inputs)

            this.inputs = temp;
        },
    }
</script>

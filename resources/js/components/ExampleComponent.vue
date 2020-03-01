<template>
    <div class="row container-fluid">
        <div class=" col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"  data-toggle="add" title="Download">
                                <i class="fas fa-download"></i> CSV</button>
                            <button type="button" class="btn btn-tool"  data-toggle="add" title="Download">
                                <i class="fas fa-download"></i> PDF</button>
                            <button type="button" class="btn btn-tool"  data-toggle="add" title="Download">
                                <i class="fas fa-download"></i> EXCEL</button>
                            <button type="button" class="btn btn-tool"  data-toggle="add" title="add">
                                <i class="fas fa-lg fa-plus-square"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table id="user_table" class="table table-striped projects">
                            <thead class="text-center">
                                <tr>
                                    <th v-for="field in table_fields" :key="field.label" :style="{'width':field.width}">
                                    {{field.label}} 
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr v-for="(d) in table_data" :key="d.id" class="text-center">
                                        <td>
                                            {{d.id}}
                                        </td>
                                        <td>
                                            {{d.email}}
                                        </td>
                                        <td>
                                            {{d.email}}
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm" href="#">
                                                <i class="fas fa-search">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm" href="#">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="#">
                                                <i class="fas fa-trash">
                                                </i>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>               
                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-left">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>

                        <select class="form-control select2 float-right form-control-sm" style="width: 100px;">
                            <option selected="selected">10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                </div>

                
        </div>
    </div>
</template>

<script>
    export default {
        data: () => {
            return {
                
            };
        },
        computed:{
            table_fields(){
                return JSON.parse(this.fields);
            },
            table_data(){
                return JSON.parse(this.data);
            }
        },
        props: {
            fields: {},
            data: {},
        },
        mounted() {
            
            console.log(this.table_fields)
            console.log(this.table_data)
        }
    }
</script>

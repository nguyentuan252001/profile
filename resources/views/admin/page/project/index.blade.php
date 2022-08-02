@extends('admin.share.master')
@section('title')
    Cấu hình Project
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-5">
            <div class="form">
                <div class="form-group">
                    <label for="">Name</label>
                    <input v-model="add.name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <div class="input-group">
                        <input v-model="add.hinh_anh" id="slide" class="form-control" type="text" name="filepath">
                        <span class="input-group-prepend">
                            <a id="lfm" data-input="slide" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>
                <div class="form-group text-start">
                    <button v-on:click="themMoi()" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">#</th>
                        <th class="text-center align-middle" scope="col">Name</th>
                        <th class="text-center align-middle" scope="col">Hình Ảnh</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(value,key) in projects">
                        <th class="text-center align-middle" scope="row">@{{ key + 1 }}</th>
                        <td class="text-center">@{{ value.name }}</td>
                        <td class="text-center text-wrap text-break">@{{ value.hinh_anh }}</td>
                        <td class="align-middle text-center">
                            <button v-on:click="edit = value" class="btn btn-info" data-toggle="modal"
                                data-target="#editModal">Cập
                                Nhật</button>
                            <button v-on:click="remove = value" class="btn btn-danger" data-toggle="modal"
                                data-target="#xoaModal">Xóa</button>
                        </td>
                    </tr>
                    {{-- edit modal --}}
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Cập Nhật</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input v-model="edit.name" type="text" class="form-control">
                                            <img src="" alt="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô Tả</label>
                                            <div class="input-group">
                                                <input v-model="edit.hinh_anh" id="slide" class="form-control"
                                                    type="text" name="filepath">
                                                <span class="input-group-prepend">
                                                    <a id="edit_lfm" data-input="slide" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                            </div>
                                            <div id="edit_holder" style="margin-top:15px;max-height:100px;">
                                                @foreach ($hinh_anh as $key => $value)
                                                    <img src="{{ $value->hinh_anh }}" alt="" class="img-fluid"
                                                        style="width: 100px;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button v-on:click="capNhat()" type="button" data-dismiss="modal"
                                        class="btn btn-primary">Cập
                                        nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- delete modal --}}
                    <div class="modal fade" id="xoaModal" tabindex="-1" role="dialog"
                        aria-labelledby="xoaModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="xoaModalLabel">Xóa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Bạn Có Muốn Xóa Không
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button v-on:click="xoa()" type="button" data-dismiss="modal"
                                        class="btn btn-primary">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
        $('#lfm_images').filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script>
        new Vue({
            el: '#app',
            data: {
                projects: [],
                add: {},
                edit: {},
                remove: {},
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/admin/project/data')
                        .then((res) => {
                            console.log(res.data.data);
                            this.projects = res.data.data;
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/project/create', this.add)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Đã thêm mới thành công!!!")
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                capNhat() {
                    axios
                        .post('/admin/project/update', this.edit)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Đã Cập nhật thành công!!!")
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                xoa() {
                    axios
                        .post('/admin/project/delete', this.remove)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Đã xóa thành công!!!")
                                this.loadData();
                            }
                        })
                        .catch((res) => {
                            var errors = res.response.data.errors;
                            $.each(errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                }
            }
        });
    </script>
@endsection

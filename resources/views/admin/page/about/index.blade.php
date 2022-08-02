@extends('admin.share.master')
@section('title')
    Cấu hình About
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-3">
            <div class="form">
                <div class="form-group">
                    <label for="">Age</label>
                    <input v-model="add.age" type="number" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Qualification</label>
                    <input v-model="add.qualification" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nghề Nghiệp</label>
                    <input v-model="add.nghe_nghiep" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Language</label>
                    <input v-model="add.language" type="text" class="form-control">
                </div>
                <div class="form-group text-right">
                    <button v-on:click="themMoi()" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center align-middle" scope="col">#</th>
                        <th class="text-center align-middle" scope="col">Tuổi</th>
                        <th class="text-center align-middle" scope="col">Qualification</th>
                        <th class="text-center align-middle" scope="col">Nghề Nghiệp</th>
                        <th class="text-center align-middle" scope="col">Language</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(value,key) in about">
                        <th class="text-center align-middle" scope="row">@{{ key + 1 }}</th>
                        <td class="text-center">@{{ value.age }}</td>
                        <td class="text-center">@{{ value.qualification }}</td>
                        <td class="text-center">@{{ value.nghe_nghiep }}</td>
                        <td class="text-center">@{{ value.language }}</td>
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
                                            <label for="">Age</label>
                                            <input v-model="add.age" type="number" min="0" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Qualification</label>
                                            <input v-model="add.qualification" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nghề Nghiệp</label>
                                            <input v-model="add.nghe_nghiep" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Language</label>
                                            <input v-model="add.language" type="text" class="form-control">
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
        new Vue({
            el: '#app',
            data: {
                about: [],
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
                        .get('/admin/about/data')
                        .then((res) => {
                            console.log(res.data.data);
                            this.about = res.data.data;
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/about/create', this.add)
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
                        .post('/admin/about/update', this.edit)
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
                        .post('/admin/about/delete', this.remove)
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

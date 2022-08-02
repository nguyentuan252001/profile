@extends('admin.share.master')
@section('title')
    Cấu hình HomePage
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-3">
            <div class="form">
                <div class="form-group">
                    <label for="">Họ và Tên</label>
                    <input v-model="add.ho_va_ten" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea v-model="add.mo_ta" class="form-control" cols="30" rows="10"></textarea>
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
                        <th class="text-center align-middle" scope="col">Họ và Tên</th>
                        <th class="text-center align-middle" scope="col">Mô Tả</th>
                        <th class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(value,key) in home">
                        <th class="text-center align-middle" scope="row">@{{ key + 1 }}</th>
                        <td class="text-center align-middle">@{{ value.ho_va_ten }}</td>
                        <td class="text-center">@{{ value.mo_ta }}</td>
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
                                            <label for="">Họ và Tên</label>
                                            <input v-model="edit.ho_va_ten" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea v-model="edit.mo_ta" class="form-control" cols="30" rows="10"></textarea>
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
                    <div class="modal fade" id="xoaModal" tabindex="-1" role="dialog" aria-labelledby="xoaModalLabel"
                        aria-hidden="true">
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
                home: [],
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
                        .get('/admin/config/data')
                        .then((res) => {
                            console.log(res.data.data);
                            this.home = res.data.data;
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/config/create', this.add)
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
                        .post('/admin/config/update', this.edit)
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
                        .post('/admin/config/delete', this.remove)
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

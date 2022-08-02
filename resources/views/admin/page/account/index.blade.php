@extends('admin.share.master')
@section('title')
    Cấu hình Account
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Tạo mới Admin
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Họ Và Tên</label>
                            <input v-model="add.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input v-model="add.email" type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mật Khẩu</label>
                            <input v-model="add.password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nhập Lại Mật Khẩu</label>
                            <input v-model="add.re_password" type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Số Điện Thoại</label>
                            <input v-model="add.so_dien_thoai" type="text" class="form-control">
                        </div>
                    </form>
                    <div class="form-group text-right">
                        <button v-on:click="themMoi()" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Tài Khoản
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Họ Và Tên</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Số Điện Thoại</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value,key) in account">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="align-middle">@{{ value.ho_va_ten }}</td>
                                <td class="align-middle">@{{ value.email }}</td>
                                <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info edit">Cập Nhật</button>
                                    <button v-on:click="remove = value, xoa()" class="btn btn-danger delete">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                account: [],
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
                        .get('/admin/tai-khoan/data')
                        .then((res) => {
                            console.log(res.data.data);
                            this.account = res.data.data;
                        });
                },
                themMoi() {
                    axios
                        .post('/admin/tai-khoan/create', this.add)
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
                xoa() {
                    axios
                        .post('/admin/tai-khoan/delete', this.remove)
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

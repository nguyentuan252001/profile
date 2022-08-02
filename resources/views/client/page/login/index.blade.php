<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.css" rel="stylesheet" media="all">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
</style>

<body>
    <div class="container-fluid " style="height: 100vh;background-color: #f2f2f2">
        <div class="container bg-white"
            style=" border-radius: 15px;position: relative;top: 50%;transform: translateY(-50%);">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-fluid"
                        src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t39.30808-6/274875209_1347020692426343_3468300242868956745_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=8qVNKRmLao0AX_2dRsU&_nc_ht=scontent.fsgn2-3.fna&oh=00_AT86wgA9T4RySaXoRk-cIC_W2950aCvmNK6x8C16a12R0w&oe=62EA5A50"
                        alt="" style="height: 90vh; border-radius: 5px">
                </div>
                <div class="col-md-6" style="margin: auto 0">
                    <span class="text-center d-block p-5" style="font-size: 25px">
                        ACCOUNT LOGIN
                    </span>
                    <form action="/admin/login" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" style="width: 49%" class="p-2">
                            <input type="password" name="password" placeholder="Password" style="width: 49%"
                                class="p-2">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success form-control" type="submit" value="SIGN IN"></input>
                        </div>
                    </form>
                    <div class="text-dark text-center" style="font-size: 14px">Forgot <a href="#"
                            class="text-dark">User name</a> / <a href="#" class="text-dark">password</a>?</div>

                    <a href="#" class="text-center text-success d-block" style="margin-top: 150px">SIGN UP</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnout.com/jquery/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</html>

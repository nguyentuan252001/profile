<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nguyễn Tuân/ Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.css" rel="stylesheet" media="all">
    @toastr_css
</head>
<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .nav-bar li:hover {
        opacity: 0.8;
        transition: all 0.3s;
    }

    #menu {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div id="menu" class="col-md-2 bg-dark text-center">
                <div class="avatar rounded-circle" style="width: 150px; margin: 0 auto;">
                    <img src="https://scontent.fsgn2-3.fna.fbcdn.net/v/t39.30808-6/274875209_1347020692426343_3468300242868956745_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=8qVNKRmLao0AX_ud6DB&_nc_ht=scontent.fsgn2-3.fna&oh=00_AT_MPyevMbdmHaRh8_JCjjtemESRT_HY6FFWqTzlgkmRkw&oe=62E665D0"
                        alt="" class="img-fluid rounded-circle">
                </div>
                <div class="infor text-white my-2">
                    <h2>Nguyen Tuan</h2>
                    <p>Front End Developer</p>
                </div>
                <nav class="nav-bar">
                    <ul>
                        <li class="nav-item bg-info text-center" style="list-style-type: none; border-radius: 15px;">
                            <a href="/admin/config" class="nav-link  text-white">
                                Cấu hình HomePage
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav-item bg-info text-center" style="list-style-type: none; border-radius: 15px;">
                            <a href="/admin/about" class="nav-link  text-white">
                                Cấu hình About
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav-item bg-info text-center" style="list-style-type: none; border-radius: 15px;">
                            <a href="/admin/education" class="nav-link  text-white">
                                Cấu hình Education
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="nav-item bg-info text-center" style="list-style-type: none; border-radius: 15px;">
                            <a href="/admin/project" class="nav-link  text-white">
                                Cấu hình Projects
                            </a>
                        </li>
                    </ul>
                </nav>
                <a class="btn btn-info" href="/admin/logout">Logout</a>
            </div>

            <div class="col-md-10" style="margin-left: 16.666667%;">
                <h1 class="title">@yield('title')</h1>
                @yield('content')
            </div>
        </div>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
<script src="https://cdnout.com/jquery/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.1/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@yield('js')

</html>

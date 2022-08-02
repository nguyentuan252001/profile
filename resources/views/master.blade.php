<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nguyễn Tuân</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
@include('client.share.style')

<body>
    <div class="container-fluid" style="position: relative">
        <a href="#homepage"><i class="fa-solid fa-rocket d-inline"
                style="position: fixed;
        z-index: 111111111111111111;
        font-size: 24px;
        color: yellow;
        right: 20px;
        bottom: 20px;"></i></a>
        <div class="row">
            @include('client.share.navbar')
            <div class="col-md-9 text-white" style="margin-left: 25%; background-color: rgb(11 11 11);">
                {{-- Home Page --}}
                @include('client.share.homepage')
                {{-- About me --}}
                @include('client.share.about')
                {{-- Education --}}
                @include('client.share.education')
                {{-- Projects --}}
                @include('client.share.project')
                {{-- Contact --}}
                @include('client.share.contact')
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>

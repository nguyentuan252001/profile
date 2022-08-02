<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    html {
        scroll-behavior: smooth;
    }

    .avatar {
        width: 150px;
        border: 5px solid yellow;
        margin: 0 auto;
    }

    .nav-bar li {
        width: 250px;
        margin: 0 auto;
        background-color: rgb(80, 79, 79);
    }

    .btn:hover,
    .nav-bar li:hover {
        opacity: 0.8;
        transition: all 0.3s;
        background-color: yellow;
        color: #000;
    }

    .btn:hover,
    .nav-bar li a {
        color: #fff;
    }

    .btn:hover,
    .nav-bar li:hover a {
        color: #333;
    }

    #homepage {}

    #homepage .card {
        background-color: rgb(11 11 11);
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 800px;
    }

    .btn {
        color: #fff;
        background-color: rgb(80, 79, 79);
        border-radius: 10px;
    }

    .icon {
        position: absolute;
        top: 0;
        left: -6px;
        z-index: 111;
        padding: 10px;
        font-size: 20px;
    }

    #project .col-md-4 {
        transform: scale(0.9);
        transition: all 0.3s;
    }

    #project .col-md-4:hover {
        cursor: pointer;
        transform: scale(1);
        transition: all 0.3s;
    }

    ::placeholder {
        color: #000;
    }

    #profile {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 11111;
    }

    #project .image:hover #project_link {
        opacity: 1;
        top: 50%;
    }

    #project_link {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        z-index: 99999;
        opacity: 0;
        transition: 0.5s ease;
    }

    #project .overlay {
        position: absolute;
        transition: 0.5s ease;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background-color: #000;
        opacity: 0;
    }

    #project .image:hover .overlay {
        opacity: 0.6;
    }
</style>

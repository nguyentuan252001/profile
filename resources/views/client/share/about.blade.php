<div id="about" class="row" style="height: 100vh">
    <div class="col-md-12">
        <div class="card" style="background-color: rgb(11 11 11);">
            <div class="card-header text-center" style="border-bottom: 1px solid rgb(80, 79, 79);">
                <h1><b class="text-warning">About</b> Me</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6" style="margin: auto 0">
                        <p>Name: <b id="ho_va_ten_about"
                                class="text-warning text-capitalize">{{ $homepage[0]->ho_va_ten }}</b></p>
                        <p>Age: <b class="text-warning">{{ $about[0]->age }}</b></p>
                        <p>Qualification: <b class="text-warning">{{ $about[0]->qualification }}</b></p>
                        <p>Post: <b class="text-warning">{{ $about[0]->nghe_nghiep }}</b></p>
                        <p>Language: <b class="text-warning">{{ $about[0]->language }}</b></p>
                        <a class="btn" target="_blank"
                            href="https://www.canva.com/design/DAFHaPK26Ow/1XbRjvbeznTbf5VBd1rDvA/view?website#2">
                            Download CV<i class="ml-2 fa-solid fa-download"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 text-center align-middle mb-4">
                                <div class="card" style="background-color: rgb(53, 51, 51);">
                                    <div class="card-body">
                                        <h2 class="text-warning">2+</h2>
                                        <p>Years Of Experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center align-middle mb-4">
                                <div class="card" style="background-color: rgb(53, 51, 51);">
                                    <div class="card-body">
                                        <h2 class="text-warning">10+</h2>
                                        <p>Projects Completed</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center align-middle mb-4">
                                <div class="card" style="background-color: rgb(53, 51, 51);">
                                    <div class="card-body">
                                        <h2 class="text-warning">140+</h2>
                                        <p>Happy Customers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-center align-middle mb-4">
                                <div class="card" style="background-color: rgb(53, 51, 51);">
                                    <div class="card-body">
                                        <h2 class="text-warning">10+</h2>
                                        <p>Awards Won</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var slug = function(str) {
        str = str.toLowerCase();
        str = str
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '');
        str = str.replace(/[đĐ]/g, 'd');
        str = str.replace(/([^0-9a-z-\s])/g, '');
        // str = str.replace(/(\s+)/g, '-');
        str = str.replace(/-+/g, '-');
        str = str.replace(/^-+|-+$/g, '');
        return str;
    }
    var name = slug(document.querySelector('#ho_va_ten_about').textContent);
    document.querySelector('#ho_va_ten_about').innerHTML = name;
</script>

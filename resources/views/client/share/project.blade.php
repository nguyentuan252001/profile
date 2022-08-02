<div id="project" class="row" style="height: 100vh">
    <div class="col-md-12">
        <div class="card" style="background-color: rgb(11 11 11);">
            <div class="card-header text-center" style="border-bottom: 1px solid rgb(80, 79, 79);">
                <h1>My <b class="text-warning">Projects</b></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($project as $key => $value)
                        <div data-aos="zoom-in-up" data-aos-duration="80000" class="col-md-4 mb-3 image">

                            <a href="#">
                                <div style="position: relative">
                                    <img src="{{ $value->hinh_anh }}" alt="" class="img-fluid rounded"
                                        style="height: 250px; width: 100%;">
                                    <div id="project_link" class="text-center text-warning">
                                        {{ $value->name }}
                                    </div>
                                    <div class="overlay">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

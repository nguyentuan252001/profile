<div id="education" class="row" style="height: 100vh">
    <div class="col-md-12">
        <div class="card" style="background-color:  rgb(11 11 11)">
            <div class="card-header text-center" style="border-bottom: 1px solid rgb(80, 79, 79);">
                <h1>My <b class="text-warning">Education</b></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($education as $key => $value)
                        <div class="col-md-4 mb-5">
                            <div class="icon bg-warning text-white d-inline rounded-circle">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="card-body"
                                style="padding-left:40px;border-left: 2px solid; position: relative;">
                                <h3 class="d-inline text-center bg-dark"
                                    style="border-radius: 10px; padding: 2px 15px; font-size: 0.9rem">
                                    {{ $value->year }}
                                </h3>
                                <h1 style="font-size: 1.5rem; margin-top: 10px"> {{ $value->name }}</h1>
                                <p>
                                    {{ $value->mo_ta }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

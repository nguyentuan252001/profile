<div id="homepage" class="row" style="height: 100vh">
    <div class="col-md-12">
        <div class="card" style="border: none">
            <h3>HI THERE!</h3>
            <h1>I'M <b id="ho_va_ten" class="text-warning text-capitalize">{{ $homepage[0]->ho_va_ten }}</b> </h1>
            <p>{{ $homepage[0]->mo_ta }}</p>
            <a href="#about" style="width: 150px;" class=" btn text-white">About
                me<i class="pl-2 fa-solid fa-user"></i>
            </a>
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
    var name = slug(document.querySelector('#ho_va_ten').textContent);
    document.querySelector('#ho_va_ten').innerHTML = name;
</script>

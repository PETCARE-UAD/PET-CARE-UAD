function tampilkanSemuaLayanan() {
    $.getJSON('data/hewan.json', function (data) {
        let layanan = data.layanan;
        $.each(layanan, function (i, data){
            $('#daftar-layanan').append('<div class="col-md-4"><div class="card mb-3"><img src="img/hewan/'+ data.gambar +'" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p></div></div></div>')
        });
    });
}

tampilkanSemuaLayanan();


$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).html();
    $('h1').html(kategori);

    if( kategori == 'Home' ) {
        tampilkanSemuaLayanan();
        return;

    }


    $.getJSON('data/hewan.json', function (data) {
        let layanan = data.layanan;
        let content = '';

        $.each(layanan, function(i, data) {
            if( data.kategori == kategori.toLowerCase()) {
                content += '<div class="col-md-4"><div class="card mb-3"><img src="img/hewan/'+ data.gambar +'" class="card-img-top"><div class="card-body"><h5 class="card-title">'+ data.nama +'</h5><p class="card-text">'+ data.deskripsi +'</p></div></div></div>'
            }
        });

        $('#daftar-layanan').html(content);
    });


});

function searchPETCARE() {
    $('#petcare-list').html('');

    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '2a6189de',
            's': $('#search-input').val()
        },
        success: function (result) {
            if (result.Response == "True") {
                let PETCARE = result.Search;
                
                $.each(PETCARE, function (i, data) {
                    $('#petcare-list').append(`
                        <div class="col-md-4">
                            <div class="card mb-3">
                            <img src="`+data.Poster+`" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">`+ data.Title +`</h5>
                                <h6 class="card-subtitle mb-2 text-muted">`+ data.Year +`</h6>
                                <a href="#" class="card-link">See Detail</a>
                            </div>
                        </div>
                    </div>
                    `);
                });

                $('#search-input').val('');


            } else {
                $('#petcare-list').html(`
                <div class="col">
                    <h1 class="text-center">` + result.Error + `</h1>
                </div>
                `)
            }
        }

    });

}

$('#search-button').on('click', function() {
    searchPETCARE();

});

$('#search-input').on('keyup', function (e) {
    if (e.which === 13) {
        searchPETCARE();
    }
})

$(document).ready(function () {
    $('#dataupdate').on('click', '.pageNumber', function(event) { 
        event.preventDefault();
        var pageNumber = $(this).attr("value");
        var search = $('#search-field').val();
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
                SearchField : search,
            },
            success: function (data) {
                $('#dataupdate').html("");
                $('#dataupdate').html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                //console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });


    $('#search-field').on('input',function(e){
        console.log('Changed!');
        var search = $(this).val();
        var pageNumber = 1;
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
                SearchField : search,
            },
            success: function (data) {
                $('#dataupdate').html("");
                $('#dataupdate').html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
               // console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    $('#dataupdate').on('click', '.pageNumber2', function(event) { 
        event.preventDefault();
        var pageNumber = $(this).attr("value");
        var year = $('#this-year').val();
        var month = $('#this-month').val();
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
                month : month,
                year  : year,
            },
            success: function (data) {
                $('#dataupdate').html("");
                $('#dataupdate').html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                //console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    $('#search-btn').on('click', function(event) { 
        console.log('Clicked!');
        var pageNumber = 1;
        var year = $('#this-year').val();
        var month = $('#this-month').val();
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
                month : month,
                year  : year,
            },
            success: function (data) {
                $('#dataupdate').html("");
                $('#dataupdate').html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                //console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

});
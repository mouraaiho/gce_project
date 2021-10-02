
$(document).ready(function () {
    $('#dataupdate').on('click', '.pageNumber', function(event) { 
        event.preventDefault();
        var pageNumber = $(this).attr("value");
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
            },
            success: function (data) {
                $('#dataupdate').html("");
                $('#dataupdate').html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
                console.log(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    
    
    
});
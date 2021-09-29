
$(document).ready(function () {
    $('#dataupdate').on('click', '.pageNumber', function(event) { 
        event.preventDefault();
        var pageNumber = $(this).attr("value");
       // alert(pageNumber);
        var currentLocation = window.location.href;
        $.ajax({
            type: "get",
            url: currentLocation + "/getunpaidinvoices/?pageN="+pageNumber,
            success: function (data) {
                if(data.success == true){
                    $('#dataupdate').html("");
                    $('#dataupdate').html(data.output);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
                
                console.log(data.output);
            },
            error: function (xhr, status, error) {
                console.error(xhr);
            }
        });
    });

    
    
    
});
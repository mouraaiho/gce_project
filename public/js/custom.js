
function isNumeric(str) {
    if (typeof str != "string") return false // we only process strings!  
    return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
           !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
}


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

    var currentConsumption = "";

    $('#dataupdate').on('focus', '.thisMonthConsumptionInput',function(e){
        currentConsumption = $(this).val();
    });


    $('#dataupdate').on('blur', '.thisMonthConsumptionInput',function(e){
        console.log('Changed!');
        var thisConsumption = $(this).val();
        var counterId =  $(this).attr('data-value');
        var lastConsumption = $("#last-consumption-" + counterId).text();
        var year = $('#this-year').val();
        var month = $('#this-month').val();
        console.log("counter_id = "+ counterId + " : thisconsumption = "+ thisConsumption + " lastConsumption = "+ lastConsumption);

        if(isNumeric(thisConsumption) && parseInt(thisConsumption) > parseInt(lastConsumption) || (isNumeric(thisConsumption) && lastConsumption =='')){
            $.ajax({
                type: "get",
                url: update_url,
                data: {
                    counter_id : counterId,
                    last_consumption : lastConsumption,
                    this_consumption : thisConsumption,
                    year : year,
                    month : month,
                },
                success: function (data) {
                    // $('#dataupdate').html("");
                    // $('#dataupdate').html(data);
                    // $("html, body").animate({ scrollTop: 0 }, "slow");
                   console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }
            });
        }else{
            $(this).val(currentConsumption);
        }
    });


    $('#invoice-search-btn').on('click', function(event) { 
        console.log('Clicked!');
        var pageNumber = 1;
        var year = $('#this-year').val();
        var month = $('#this-month').val();
        var type_invoice = $('#type-invoice').val();
        var client_name = $('#client-name').val();
        var counter_name = $('#counter-number').val();
        var invoice_number = $('#invoice-number').val();
        $.ajax({
            type: "get",
            url: main_url,
            data: {
                pageN : pageNumber,
                month : month,
                year  : year,
                typeInvoice : type_invoice,
                clientNumber : client_name,
                counterName : counter_name,
                invoiceNumber : invoice_number,
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
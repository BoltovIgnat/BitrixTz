$(document).ready(function(){

    $( "#ibc-search" ).click(function(e) {
        e.preventDefault();

        $.ajax({
            method: "POST",
            data: {
                ipadress: $('.form-control').val()
            },
            url: "/ajax/geoip.php",
            error: function (error) {
                $.ajax({
                    method: "POST",
                    url: "/ajax/sendEmail.php"
                });
            },
            success: function(data){
                if (data == 'Информации по данному ип адрессу нету'){
                    console.log('Информации по данному ип адрессу нету');
                    var url = "https://suggestions.dadata.ru/suggestions/api/4_1/rs/iplocate/address?ip=";
                    var token = "01091598094ff69a402c1c24fdddfcb5ce5e5536";
                    //var query = "46.226.227.20";
                    var query = $('.form-control').val();

                    var options = {
                        method: "GET",
                        mode: "cors",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "Authorization": "Token " + token
                        }
                    }

                    fetch(url + query, options)
                        .then(response => response.json())
                        .then(result =>{
                            console.log(result.location.value);
                            $('.ibc-result').text(result.location.value)
                            $.ajax({
                                method: "POST",
                                data: {
                                    ipadress: $('.form-control').val(),
                                    sity: result.location.value
                                },
                                url: "/ajax/addtohl.php",
                                error: function (error) {
                                    $.ajax({
                                        method: "POST",
                                        url: "/ajax/sendEmail.php"
                                    });
                                },
                                success: function(data){
                                    console.log(data)
                                }
                            });
                        })
                        .catch(error => {
                            $.ajax({
                                method: "POST",
                                url: "/ajax/sendEmail.php"
                            });
                        });
                }else{
                    var json = $.parseJSON(data);
                    console.log(json.UF_SITY);
                    $('.ibc-result').text(json.UF_SITY)
                }

            }
        });

    });


    $(function () {

        $.mask.definitions['i'] = "[0-2]";
        $.mask.definitions['x'] = "[0-5]";
        $('.form-control').mask("ixx.ixx.ixx.ixx");
    });
});

$(document).ready(function(){

//realtime des prochaines sceances sur la home

    if($('#panelajax').length > 0){
        setInterval(function(){

            //console.log('test');

            $.ajax({

                url:$('#panelajax').attr('data-url')


            }).done(function (data) {

                $('#dashboard-recent').html(data);

            });




        },3000);
    }


    //realtime des tasks sur la advanced
    if($('.widget-tasks').length > 0) {
        setInterval(function () {

            //console.log('test');

            $.ajax({

                url: $('.widget-tasks').attr('data-url')


            }).done(function (data) {

                $('.widget-tasks .panel-body').html(data);

            });


        }, 3000);
    }
//realtime for cinema reviews
    if($('.cinema-review').length > 0) {
        setInterval(function () {

            //console.log('test');

            $.ajax({

                url: $('.cinema-review').attr('data-url')


            }).done(function (data) {

                $('.cinema-review').html(data);

            });


        }, 3000);

    }
    if($('table#users').length > 0) {
        setInterval(function () {

            //console.log('test');

            $.ajax({

                url: $('table #users').attr('data-url')


            }).done(function (data) {

                $('table #users').html(data);

            });


        }, 3000);

    }



});
//# sourceMappingURL=realtime.js.map
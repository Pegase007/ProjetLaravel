$(document).ready(function(){


    setInterval(function(){

        //console.log('test');

        $.ajax({

            url:$('#panelajax').attr('data-url')


        }).done(function (data) {

            $('#dashboard-recent').html(data);

        });




    },3000);


});
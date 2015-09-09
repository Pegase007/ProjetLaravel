$(document).ready(function(){


    init.push(function(){


        $('.date').datepicker({


            format:'dd/mm/yyyy',
            todayBtn:'linked'
        });

        $('.wyswyg').summernote({
            height:200,
            tabsize:2,
            codemirror:{
                theme:'monokai'
            }
        });



        $('#image').pixelFileInput(
            {placeholder:"Aucun fichier selectionné"}
        );


        $(".js-example-tags").select2();


        $("#synopsis").limiter(140, { label: '#character-limit-input-label' });




        $("#slider").slider({
            'range': 'min',
            'min': 0,
            'max': 10,
            'value': 5,
             slide: function (event, ui) {
                    $("#note_presse").val(ui.value);
                }


        });





        });





    });





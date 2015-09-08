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


        var colorful_sliders_options = {
            'range': 'min',
            'min': 0,
            'max': 10,
            'value': 5
        };

        $('.ui-slider-colors-demo').slider(colorful_sliders_options);

        $('.ui-slider-colors-demo').change(function(e, ui) {
            $('#note').attr('value', ui.value);
        });



        });





    });




});
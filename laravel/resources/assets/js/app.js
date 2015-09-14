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


// Easy Pie Charts
        var easyPieChartDefaults = {
            animate: 2000,
            scaleColor: false,
            lineWidth: 6,
            lineCap: 'square',
            size: 90,
            trackColor: '#e5e5e5'
        };
        $('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
            barColor: PixelAdmin.settings.consts.COLORS[1]
        }));
        $('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
            barColor: PixelAdmin.settings.consts.COLORS[1]
        }));
        $('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
            barColor: PixelAdmin.settings.consts.COLORS[1]
        }));





    });





    });





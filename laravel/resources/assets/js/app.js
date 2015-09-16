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


//tasks table
        $('.widget-tasks .panel-body').sortable({
            axis: "y",
            handle: ".task-sort-icon",
            stop: function( event, ui ) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children( ".task-sort-icon" ).triggerHandler( "focusout" );
                var data = $(this).sortable('serialize');

                $.ajax({
                    data: { data: data, _token: $('.widget-tasks .panel-body').attr('data-token')},
                    type: 'POST',
                    url: $('.widget-tasks .panel-body').attr('data-url')
                });

                console.log(data);
            }
        });
        console.log( $('.widget-tasks .panel-body').length);




    });





    });





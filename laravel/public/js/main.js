$(document).ready(function(){

   $('div.alert-danger').delay(3000).fadeOut('slow');

});

$(document).ready(function(){

    //ciblage de lelement + evenement dessus

    $('table#list .btn-danger').click(function(e){

        e.preventDefault(); //annuler l'evenement href de mes liens

       //console.log('vous avez cliqué dessu :)');

        var elt = $(this);
        $.ajax({
            url: elt.attr('href') //url de mon href lien)
        }).done(function(){

            elt.parents('tr').fadeOut('slow');

        });

        });


    //cliblage et greffe du bon element
        $('#actions').change(function(e) {

            if ($(this).val() == 'Activer') {

                $("#list :checked").each(function (index) {

                    console.log($(this));
                    //Envoyer une requete ajax d'activation pour chaque film coché

                });
            }

            else if ($(this).val() == 'Supprimer') {

                $("#list :checked").each(function (index) {

                    //console.log($(this));
                    //Envoyer une requete ajax de suppression pour chaque film coché

                    var elt = $(this);
                    $.ajax({
                        url: elt.attr('data-url') //url de mon href lien)
                    }).done(function () {

                        elt.parents('tr').fadeOut('slow');

                    });
                });

            }


        });

//RECOVERY OF DELETED MOVIES

    $('#recover').click(function(e){

        e.preventDefault(); //annuler l'evenement href de mes liens

        //console.log('vous avez cliqué dessu :)');

        var elt = $(this);
        $.ajax({
            url: elt.attr('href') //url de mon href lien)
        }).done(function(){

            elt.parents('tr').fadeOut('slow');

        });

    });

//ON SUBMIT OF COMMENT
    $('form#addcomment').submit(function(e){

        e.preventDefault();

        var elt = $(this);

        console.log(elt);
        console.log(elt.attr('action'));
        console.log(elt.serialize());

        $.ajax({
            url: elt.attr('action'),
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize()
            //data:envoyer des données
        }).done(function(data){

            var elt = $('#comment .comment:first').clone();

            elt.find('.comment-text').html(
                "<div class='comment-heading'><a href='#' title=''>Moi</a><span> il y a un instant</span></div> " + $('#addcomment textarea').val()
            );

            $('#comment').append(elt);
            $('#addcomment textarea').val("");



        });



    });


//LISTENS TO ANY ACTION ON A NON EXISTING OBJECT TASK
    $('.widget-tasks').on( "click", ":checkbox", function(e) {

            console.log('ahhhhh');

            var elt = $(this);
            $.ajax({
                url: elt.attr('data-url') //url de mon href lien)
            })

        });

    $('form#clear').submit(function (e) {
        e.preventDefault();

        $('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');

        var elt = $(this);

        $.ajax({
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize(),
            url: elt.attr('action') //url de mon href lien)
        })


    });


    $('form#taskform').submit(function(e){

        e.preventDefault();

        var elt = $(this);

        $.ajax({
            url: elt.attr('action'),
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize()
            //data:envoyer des données
        }).done(function(data){

                $.growl.notice({ message: "Task added" });
            document.getElementById("taskform").reset();
            });

        });














    });



$(document).ready(function(){


    init.push(function(){


        $('.date').datepicker({

            format:'dd/mm/yyyy',
            todayBtn:'linked'
        });

            $('#datetimepicker1').datetimepicker({

                format: 'dd/MM/yyyy hh:mm:ss',
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



        //CHAT
        $(".chat-controls-input .form-control").autosize();


//tasks table
        if($('.widget-tasks .panel-body').length > 0) {
            $('.widget-tasks .panel-body').sortable({
                axis: "y",
                handle: ".task-sort-icon",
                stop: function (event, ui) {
                    // IE doesn't register the blur when sorting
                    // so trigger focusout handlers to remove .ui-state-focus
                    ui.item.children(".task-sort-icon").triggerHandler("focusout");
                    var data = $(this).sortable('serialize');

                    $.ajax({
                        data: {data: data, _token: $('.widget-tasks .panel-body').attr('data-token')},
                        type: 'POST',
                        url: $('.widget-tasks .panel-body').attr('data-url')
                    });

                    console.log(data);
                }
            });
            console.log($('.widget-tasks .panel-body').length);

        }





    //GRAPHS

    if($('#actorsgraph').length > 0) {
        var marseille = $('#actorsgraph').data('marseille');
        var lyon = $('#actorsgraph').data('lyon');
        var newyork = $('#actorsgraph').data('newyork')
        var hampshire = $('#actorsgraph').data('hampshire');

        console.log(hampshire);

        Morris.Bar({
            element: 'actorsgraph',
            data: [
                {ville: 'Lyon', quantity: lyon},
                {ville: 'Marseille', quantity: marseille},
                {ville: 'Hampshire', quantity: hampshire},
                {ville: 'New York', quantity: newyork},

            ],
            xkey: 'ville',
            ykeys: ['quantity'],
            labels: ['Actors']
        });
    }



//PIE CHART ACTORS AGE
    if($('#actorsage').length > 0) {
        var dataSet = [{
            label: "Entre 18 et 25",
            data: $('#actorsage').data('one'),
            color: "#005CDE"
        }, {
            label: "Entre 25 et 35",
            data: $('#actorsage').data('two'),
            color: "#00A36A"
        }, {
            label: "Entre 35 et 45",
            data: $('#actorsage').data('three'),
            color: "#7D0096"
        }, {
            label: "Entre 45 et 60",
            data: $('#actorsage').data('four'),
            color: "#992B00"
        }, {
            label: "Plus de 60",
            data: $('#actorsage').data('five'),
            color: "#DE000F"
        }];

        var options = {
            series: {
                pie: {
                    show: true,
                    innerRadius: 0.5,

                }
            },
            legend: {
                show: true
            },
            grid: {
                hoverable: true
            }
        };


        $.plot($("#actorsage"), dataSet, options);
    }

    //$('#actorsage').plot(dataSet, {
    //    series: {
    //        pie: {
    //            show: true,
    //            radius: 1,
    //            innerRadius: 0.5,
    //            label: {
    //                show: true,
    //                radius: 3 / 4,
    //                formatter: function (label, series) {
    //                    return '<div style="font-size:14px;text-align:center;padding:2px;color:white;">' + Math.round(series.percent) + '%</div>';
    //                },
    //                background: { opacity: 0 }
    //            }
    //        }
    //    }
    //}, {
    //    height: 205
    //});


//DIRECTORS CHART
    if($('#bestdirectors').length > 0){
    Morris.Line({
        element: 'bestdirectors',
        data: [
            { period: '2010 Q1', iphone: 2666, ipad: null, itouch: 2647 },
            { period: '2010 Q2', iphone: 2778, ipad: 2294, itouch: 2441 },
            { period: '2010 Q3', iphone: 4912, ipad: 1969, itouch: 2501 },
            { period: '2010 Q4', iphone: 3767, ipad: 3597, itouch: 5689 },
            { period: '2011 Q1', iphone: 6810, ipad: 1914, itouch: 2293 },
            { period: '2011 Q2', iphone: 5670, ipad: 4293, itouch: 1881 },
            { period: '2011 Q3', iphone: 4820, ipad: 3795, itouch: 1588 },
            { period: '2011 Q4', iphone: 15073, ipad: 5967, itouch: 5175 },
            { period: '2012 Q1', iphone: 10687, ipad: 4460, itouch: 2028 },
            { period: '2012 Q2', iphone: 8432, ipad: 5713, itouch: 1791 }
        ],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        hideHover: 'auto',
        fillOpacity: 0.3,
        behaveLikeLine: true,
        lineWidth: 2,
        pointSize: 4,
        gridLineColor: '#cfcfcf',
        resize: true
    });

    }

        if($('#hero-area').length > 0){

    $.getJSON(
        $("#hero-area").data('url'), function(data){
        var items = [];

        $.each(data, function (key, val) {
            items.push(val.firstname);
        });

        console.log(items);

    });
        }

        //Piechart repartition des films par categories
        if($('#container').length > 0) {
            $.getJSON(
                $("#container").data('url'), function(data) {
                    $('#container').highcharts({
                        chart: {
                            type: 'pie',
                            options3d: {
                                enabled: true,
                                alpha: 45,
                                beta: 0
                            }
                        },
                        title: {
                            text: 'Piechart repartition des films par categories'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                depth: 35,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.name}'
                                }
                            }
                        },
                        series: [{
                            type: 'pie',
                            name: 'Browser share',
                            data: data
                        }]
                    });
                });
//FIN PIE CHART

    }


        //STACKED COLUMN CHART
        if($('#stackedcolumn').length > 0) {

            $.getJSON(


           $("#stackedcolumn").data('url'), function(data) {

                console.log(data.result);
                console.log(data.cat);

            $('#stackedcolumn').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Repartition des categories pour les 5 meilleurs acteurs'
                },
                xAxis: {
                    categories: data.cat
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'nb de films'
                    },
                    stackLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                        }
                    }
                },
                legend: {
                    align: 'right',
                    x: -30,
                    verticalAlign: 'top',
                    y: 25,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
                },
                tooltip: {
                    headerFormat: '<b>{point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px black'
                            }
                        }
                    }
                },
                series: data.result
            });

        })}

//END STACKD COLUMN
});
});






//# sourceMappingURL=main.js.map
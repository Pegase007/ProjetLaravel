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






//# sourceMappingURL=main.js.map
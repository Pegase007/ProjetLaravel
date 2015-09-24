$(document).ready(function() {

    //ciblage de lelement + evenement dessus

    $('table#list .btn-danger').click(function (e) {

        e.preventDefault(); //annuler l'evenement href de mes liens

        //console.log('vous avez cliqué dessu :)');

        var elt = $(this);
        $.ajax({
            url: elt.attr('href') //url de mon href lien)
        }).done(function () {

            elt.parents('tr').fadeOut('slow');

        });

    });


    //cliblage et greffe du bon element
    $('#actions').change(function (e) {

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

    $('#recover').click(function (e) {

        e.preventDefault(); //annuler l'evenement href de mes liens

        //console.log('vous avez cliqué dessu :)');

        var elt = $(this);
        $.ajax({
            url: elt.attr('href') //url de mon href lien)
        }).done(function () {

            elt.parents('tr').fadeOut('slow');

        });

    });

//ON SUBMIT OF COMMENT
    $('form#addcomment').submit(function (e) {

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
        }).done(function (data) {

            var elt = $('#comment .comment:first').clone();

            elt.find('.comment-text').html(
                "<div class='comment-heading'><a href='#' title=''>Moi</a><span> il y a un instant</span></div> " + $('#addcomment textarea').val()
            );

            $('#comment').append(elt);
            $('#addcomment textarea').val("");


        });


    });


//LISTENS TO ANY ACTION ON A NON EXISTING OBJECT TASK
    $('.widget-tasks').on("click", ":checkbox", function (e) {

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


    $('form#taskform').submit(function (e) {

        e.preventDefault();

        var elt = $(this);

        $.ajax({
            url: elt.attr('action'),
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize()
            //data:envoyer des données
        }).done(function (data) {

            $.growl.notice({message: "Task added"});
            document.getElementById("taskform").reset();
        });

    });

    //SWITCHER
    //$('.switcher').switcher({
    //    on_state_content: '<span class="fa fa-check" style="font-size:11px;"></span>',
    //    off_state_content: '<span class="fa fa-times" style="font-size:11px;"></span>'
    //});


    $('.switcher').click(function (e) {


        var elt = $(this);

        if ($(this).is(':checked')) {

            $.ajax({
                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: 'add', _token: elt.data('token')}

            }).done(function () {

                console.log(elt.data('id') + " en fav")

            });


        } else {

            $.ajax({
                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: 'remove', _token: elt.data('token')}

            }).done(function () {

                console.log(elt.data('id') + " plus en fav")


            });

        }


    });

    //ENDSWITCHER


    //FAV


    //SWITCHER
    //$('.switcher').switcher({
    //    on_state_content: '<span class="fa fa-check" style="font-size:11px;"></span>',
    //    off_state_content: '<span class="fa fa-times" style="font-size:11px;"></span>'
    //});

//START FAV
    $('.heart').click(function (e) {
        e.preventDefault();

        var elt = $(this);

        if (elt.find("i").hasClass("fa-heart-o")) {

            $.ajax({
                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: 'comfav', _token: elt.data('token')}

            }).done(function () {

                elt.find('i').removeClass("fa fa-heart-o").addClass("fa fa-heart")

            })
        }

        else {

            $.ajax({
                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: 'comunfav', _token: elt.data('token')}

            }).done(function () {

                elt.find('i').removeClass("fa fa-heart").addClass("fa fa-heart-o")


            })

        }
    });

        //END FAV
    console.log('booooo');
        //START FAVBOX


    $('#favbox').click(function (e) {

            e.preventDefault();

            var elt = $(this);
        //$(".switcher").removeAttr('checked');

        console.log('good');

            $.ajax({
                url: elt.data('href'),



            }).done(function () {

               elt.parent().find('.message').fadeOut('slow');
                //$('.switcher').switcher({
                //    selected: false
                //});

                //$(".switcher").attr('checked',false);





                console.log('coucou')


            })

        });

        //ENDBOX









});



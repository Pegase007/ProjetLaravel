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


    });



//# sourceMappingURL=main.js.map
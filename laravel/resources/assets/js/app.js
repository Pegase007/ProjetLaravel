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

       



    });




});
"use strict";



$(document).ready(function () {
    var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
    var phonereg1=/^([0-9]+){9}$/;
    var phonereg2=/\s/;
    $(".submit_message").click(function (){
        let isValid=true
        $(".invalid-feedback").remove();
        $("#fname").removeClass("is-invalid")
        $("#lname").removeClass("is-invalid")
        $("#email").removeClass("is-invalid")
        $("#subject").removeClass("is-invalid")
        $("#message").removeClass("is-invalid")
        if( $("#fname").val() == "" ){
            $("#fname").addClass("is-invalid");
            $("#fname").focus().after("<div class='invalid-feedback'>Ingrese su nombre</div>");
            isValid=false;
        }
        if( $("#lname").val() == "" ){
            $("#lname").addClass("is-invalid");
            $("#lname").focus().after("<div class='invalid-feedback'>Ingrese su apellido</div>");
            isValid=false;
        }
        if( $("#email").val() == "" || !emailreg.test($("#email").val()) ){
            $("#email").addClass("is-invalid");
            $("#email").focus().after("<div class='invalid-feedback'>Ingrese un email correcto</div>");
            isValid=false;
        }
        if( $("#subject").val() == ""){
            $("#subject").addClass("is-invalid");
            $("#subject").focus().after("<div class='invalid-feedback'>Ingrese el asunto</div>");
            isValid=false;
        }
        if( $("#message").val() == "" ){
            $("#message").addClass("is-invalid");
            $("#message").focus().after("<div class='invalid-feedback'>Ingrese un mensaje</div>");
            isValid=false;
        }
        return isValid
    });
    $("#fname").keyup(function(){
        if( $(this).val() != "" ){
            $("#fname").removeClass("is-invalid")
            $(".invalid-feedback").fadeOut();
            return false;
        }
    });
    $("#lname").keyup(function(){
        if( $(this).val() != "" ){
            $("#lname").removeClass("is-invalid")
            $(".invalid-feedback").fadeOut();
            return false;
        }
    });
    $("#email").keyup(function(){
        console.log($(this).val())
        if( $(this).val() != "" && emailreg.test($(this).val())){
            $("#email").removeClass("is-invalid")
            $(".invalid-feedback").fadeOut();
            return false;
        }
    });
    $("#subject").keyup(function(){
        if( $(this).val() != "" ){
            $("#subject").removeClass("is-invalid")
            $(".invalid-feedback").fadeOut();
            return false;
        }
    });
    $("#message").keyup(function(){
        if( $(this).val() != "" ){
            $("#message").removeClass("is-invalid")
            $(".invalid-feedback").fadeOut();
            return false;
        }
    });
});





var message_server_url = '/contact';



$(function () {

    var $ajax = {
                    
        sendMessage:function (p) {
            $("#enviar").attr('disabled', true)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })


            var form_fill = $(p);

            // Get the form data.
            var form_inputs = form_fill.find(':input');
            var form_data = {};
            form_inputs.each(function () {
                form_data[this.name] = $(this).val(); 
            });


            
            $.ajax(
                {
                    /*
                     *Your Ajax Server Here, 
                     * use internal url (such as './ajaxserver/server.php') or 
                     * external URL such as:  url: 'http://www.example.com/avenir/ajaxserver/server.php'
                     * depending to your requirements
                     */
                    url: message_server_url,
                    // url: $('.send_message_form').attr('action'),
                    type: 'POST',
                    data: form_data,
                    dataType: 'json',


                    /* CALLBACK FOR SENDING EMAIL GOEAS HERE */
                    success: function (data) {

                        // If the returned login value successful.
                        Swal.fire({
                          icon: 'success',
                          title: 'Excelente',
                          text: data,
                        })
                    
                    },
                    /* show error message */
                    error: function (jqXHR, textStatus, errorThrown) {
                       Swal.fire({
                          icon: 'error',
                          title: 'Lo sentimos',
                          text: 'Su correo no ha sido enviado',
                        })
                    },
                    complete: function (data){
                        $("#enviar").attr('disabled', false)
                        $("#fname").val("")
                        $("#lname").val("")
                        $("#email").val("")
                        $("#subject").val("")
                        $("#message").val("")
                    }
                    /* END EMAIL SENDING CALLBACK */
            });
        }
    };

    $('.send_message_form').submit(function (event) {
        event.preventDefault();
        
        console.log('message should be sent');
        $ajax.sendMessage(this);
    });
    
});


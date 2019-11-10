
  $( "form" ).on( "submit", function( event ) {
    event.preventDefault();
        if (validation()) {
            var params= 'action=signin&' + $( this ).serialize();            
            $.ajax({
                url:"points/signin.php",
                data:params,
                method:"POST",
                dataType:"json",
                success:function(anwser){
                    console.log(anwser);
                    if (anwser.code == 1)
                    location.href ='http://localhost/Practica/hangman.php';
                    else{
                        $('#signin-error').show();
                        $('#signin-error').html('Ocurrió un error durante el registro, Inténtelo nuevamente');
                    }
                    
                },
                error: function () {
        
                },						
            });
        }  
  });

 
 
  function validation(){
    if (!$('#signin-name').val() || !$('#signin-email').val() || !$('#signin-user').val() || !$('#signin-password').val() || !$('#signin-confirm-password').val()){
        $('#signin-error').show();
        $('#signin-error').html('Debe completar todos los campos');
        return false;
    }else if ($('#signin-password').val() != $('#signin-confirm-password').val()){
        $('#signin-error').show();
        $('#signin-error').html('Las contraseñas no coinciden');
        return false;
    }else{
        $('#signin-error').hide();
        return true;
    }
}


function login() {
    var user = $('#user').val();
    var password = $('#password').val();
    if (!user || !password){
        $('#login-error').show();
        $('#login-error').html('Debe completar todos los campos');
    }else{
        $('#login-error').hide();
        var params = `user=${user}&password=${password}`;
        $.ajax({
            url:"points/login.php",
            data:params,
            method:"POST",
            dataType:"json",
            success:function(anwser){
                if(anwser.code == 1)
                    location.href = 'http://localhost/Practica/hangman.php';
                else {
                    $('#login-error').show();
                    $('#login-error').html('Credenciales incorrectas');
                }
            },
            error: function () {
    
            },						
        });
    }
}
var gameSelected;
window.onload = function() {
    $.ajax({
        url:"points/getActiveGames.php",
        dataType:"json",
        type: 'POST',
        success:function(answer){   
            console.log(answer);
                       
            if (answer.length == 0)
                console.log('No hay juegos activos');
            else{
                for (let i = 0; i < answer.length; i++) {
                    document.getElementById('game-list').innerHTML +=`<li onclick="gameDetails(${answer[i].GAME_ID}, '${answer[i].USER_NAME}',  '${answer[i].GAME_PROGRESS}' )" class="list-group-item">${answer[i].USER_NAME}(${answer[i].GAME_PROGRESS})</li>`;
                }
            }
                  
        },
        error: function () {

        },						
    });

   
  };




  function gameDetails(gameID, userName, gameProgress){
      $('#details-div').show();
      gameSelected = gameID;
    document.getElementById('hide-word').innerHTML ="";
        if (gameProgress.length==0){
            document.getElementById('hide-word').innerHTML += '<div class="bg bg-info p-2 ml-3 text-white">Juego sin empezar</div>';
        }
      for (var i = 0; i < gameProgress.length; i++) {
        document.getElementById('hide-word').innerHTML += `<div id="secret-${i}" class="hide-letter">${gameProgress[i]}</div>`;
      }
  }

  function sendHelp(user){
    console.log('enviando ayuda a ', gameSelected, ' de ', user );
    if($('#text-help').val()== ""){
        $('#help-error').show();
        $('#help-error').html('Debe llenar el campo');
    }else{
        var params = `help=${$('#text-help').val()}&gameId= ${gameSelected}&user=${user}`;
        $.ajax({
            url:"points/sendHelp.php",
            dataType:"json",
            type: 'POST',
            data: params,
            success:function(answer){                   
                if (answer.code == 1) {                    
                    $('#help-success').show();
                    $('#help-error').hide();
                    $('#help-success').html('Ayuda enviada');
                    $('#text-help').val('');
                }
                      
            },
            error: function () {
    
            },						
        });
    }
    
    
  }
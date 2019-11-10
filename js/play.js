
var arrayWordSelected= [];
var correctAnswer = "";
var Attempts = 0;
var myGame;

window.onload = function() {
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'Ñ', 'O', 'P', 'Q', 'R', 'S', 'T', 'U' ,'V', 'W', 'X', 'Y', 'Z'];

    for (var i = 0; i < alphabet.length; i++) {
        document.getElementById("alphabet").innerHTML  += `<div id="alphabet-${alphabet[i]}" onclick="letterSelected('${alphabet[i]}')" class="letter">${alphabet[i]}</div>`;
    }

    $.ajax({
        url:"points/generateWord.php",
		method:"POST",
        dataType:"json",
        success:function(answer){              
            correctAnswer = answer.word.toUpperCase();                      
            myGame = new Array(answer.word.length);
           for (var i = 0; i < answer.word.length; i++) {
             document.getElementById("hide-word").innerHTML  += `<div id="secret-${i}" class="hide-letter"></div>`;
             arrayWordSelected.push(answer.word[i].toUpperCase());             
           }           
        },
        error: function () {

        },						
    });
    refreshHelp();  
  };

  function letterSelected(key) {
    $(`#alphabet-${key}`).hide();
      var success = false;
      var wordProgress='';
      for (var i = 0; i < arrayWordSelected.length; i++) {
        if (arrayWordSelected[i] == key){
            $(`#secret-${i}`).html(key);
            myGame[i]= key;
            success = true;

        }
      }

      if(!success){
        Attempts ++;
        $("#attempts").text(`${Attempts}/5`)

        if (Attempts == 5) {
            swal({
                icon: "warning",
                title: "Haz perdido",
                text:`La partida ha finalizado, la palabra correcta era ${correctAnswer} `,
                buttons:{
                }
            
              });
              changeGameStatus();
              window.setTimeout(function(){
                location.reload();
              },2000)
        }
      }else{
           //insert progress in database
        for (let i = 0; i < myGame.length; i++) {                
            if (myGame[i]!= undefined){
            wordProgress += myGame[i];
            }else{
                wordProgress += '-';
            }                
        }

        //verify if win
        if (wordProgress == correctAnswer){
            swal({
                icon: "success",
                title: "Felicidades",
                text:"Haz ganado la partida",
                buttons:{
                }
            
            });
            changeGameStatus();
            window.setTimeout(function(){
              location.reload();
            },2000)
        }

          //insert
        $.ajax({
            url:"points/updateGame.php",
            method:"POST",
            data:`progress=${wordProgress}`,
            dataType:"text",
            success:function(answer){                        
                        
            },
            error: function () {
                
            },						
        });
      }
  }

  function changeGameStatus(){
    $.ajax({
        url:"points/changeGameStatus.php",
        success:function(answer){                        
                    
        },
        error: function () {
            
        },						
    });
  }

  window.setInterval(function(){
    refreshHelp();
  }, 5000)

  function  refreshHelp(){
    document.getElementById('help').innerHTML ="";
    $.ajax({
        url:"points/getHelp.php",
        dataType:"json",
        type: 'POST',
        success:function(answer){   
           for (var i = 0; i < answer.length; i++) {
            document.getElementById('help').innerHTML += `<div class="help">
                <h5>${answer[i].USER_NAME}</h5>
                Ayuda: <span>${answer[i].MESSAGE}</span>
            </div>`;
           }
              
        },
        error: function () {

        },						
    });
  }
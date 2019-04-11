function loadData(){
    loadTeams();
    loadPlayers();
    loadGames();
    loadUsers();
}


function loadUsers() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
      var Games = document.getElementById("cUsername2");
      var values  = JSON.parse(this.responseText);    
       for(i = 0; i < values.length; i++){
           var child1 = document.createElement("option");

           child1.value = values[i].cUsername;
           
           child1.innerHTML = values[i].cUsername;
           
           Games.appendChild(child1);
       }
    }
    }
  };
  xhttp.open("GET", "request.php?request=users", true);
  xhttp.send("");
}


function loadGames() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
      var Games = document.getElementById("Games");
      var values  = JSON.parse(this.responseText);    
       for(i = 0; i < values.length; i++){
           var child1 = document.createElement("option");

           child1.value = values[i].gID;
           
           child1.innerHTML = values[i].gLocation + "  (" + values[i].gDate + ")";
           
           Games.appendChild(child1);
       }
    }
    }
  };
  xhttp.open("GET", "request.php?request=games", true);
  xhttp.send("");
}


document.getElementById("playerID").addEventListener("change",loadPlayerDetail);

function loadPlayerDetail() {
  var xhttp = new XMLHttpRequest();
    var pid = document.getElementById("playerID").value;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
        var values = JSON.parse(this.responseText);
        document.getElementById("pPos2").value = values[0].pPos;
        document.getElementById("pTeam2").value =  values[0].pTeam;
        document.getElementById("pHeight2").value =  values[0].pHeight;
        document.getElementById("pWeight2").value =  values[0].pWeight;
    }
    }
  };
  xhttp.open("GET", "request.php?request=playerdetail&pid="+pid, true);
  xhttp.send("");
}

document.getElementById("playerID2").addEventListener("change",loadPlayerStat);

function loadPlayerStat() {
  var xhttp = new XMLHttpRequest();
  
    var pid = document.getElementById("playerID2").value;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
        var values = JSON.parse(this.responseText);
       console.log(values);
        for(i = 0; i < values.length; i++){
            var child = document.createElement("option");
            child.value = values[i].gID+values[i].pID+values[i].statName;
           child.innerHTML = values[i].gLocation + " (" + values[i].gDate + ")" + " - " + values[i].statName;
       
           
           document.getElementById("stat").appendChild(child);
        }
    }
    }
  };
  xhttp.open("GET", "request.php?request=playerstats&pid="+pid, true);
  xhttp.send("");
}


function loadPlayers() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
      var players = document.getElementById("Players");
        var players2 = document.getElementById("playerID");
        var players3 = document.getElementById("playerID2");
      var values  = JSON.parse(this.responseText);    
        
       for(i = 0; i < values.length; i++){
           var child1 = document.createElement("option");
           var child2 = document.createElement("option");
           var child3 = document.createElement("option");
           child1.value = values[i].pID;
           child2.value = values[i].pID;
             child3.value = values[i].pID;
           
           child1.innerHTML = values[i].fName + " " + values[i].lName + " (" + values[i].pPos + ")";
           child2.innerHTML = values[i].fName + " " + values[i].lName + " (" + values[i].pPos + ")";
           child3.innerHTML = values[i].fName + " " + values[i].lName + " (" + values[i].pPos + ")";
           
           players.appendChild(child1);
           players2.appendChild(child2);
            players3.appendChild(child3);
       }
    }
    }
  };
  xhttp.open("GET", "request.php?request=players", true);
  xhttp.send("");
}


function loadTeams() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    if(this.responseText){
      var home = document.getElementById("gTeamHome");
      var away = document.getElementById("gTeamAway");
      var values  = JSON.parse(this.responseText);    
        
       for(i = 0; i < values.length; i++){
           var child1 = document.createElement("option");
           var child2 = document.createElement("option");
           
           child1.value = values[i].pTeam;
           child2.value = values[i].pTeam;
           
           child1.innerHTML = values[i].pTeam;
           child2.innerHTML = values[i].pTeam;
           
           home.appendChild(child1);
           away.appendChild(child2);
       }
    }
    }
  };
  xhttp.open("GET", "request.php?request=teams", true);
  xhttp.send("");
}

$(".coachNav li a").click(function(event) {
         $(".coachNav li a").removeClass("activeNav");
       $("#"+event.target.id).addClass("activeNav");
    
     elid = event.target.id;
        elid = elid.substring(0, elid.length - 3);
    
        $(".insert_form").fadeOut(400);
            
             
        $("#"+elid).delay(410).fadeIn("slow");
    
        
    $(".responsemsg").html("");
      
    
    });





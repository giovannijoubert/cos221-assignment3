function ShowAllPlayers(){
    
    var xhttp = new XMLHttpRequest();
  
    var sortBy = document.getElementById("sortBy").value;
    var statType = document.getElementById("statType").value;
    
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
    if(this.responseText){
        
        
        
        document.getElementById("sortBy").value = sortBy;
        document.getElementById("statType").value = statType;
        
        var values = JSON.parse(this.responseText);
        var out = document.getElementById("output");
        
        out.innerHTML = "";
        
        

        
        for (i = 0; i < values.length; i++){
            var row = document.createElement("tr");
            var th = document.createElement("th");
            th.innerHTML = i+1;
            var name = document.createElement("td");
            var height = document.createElement("td");
            var weight = document.createElement("td");
            var stat = document.createElement("td");
            
            
            name.innerHTML = values[i].fName + " " + values[i].lName + " (" + values[i].pPos + ")";
            height.innerHTML = values[i].pHeight;
            weight.innerHTML = values[i].pWeight;
            stat.innerHTML = values[i].statName + " : " +  values[i].statValue;
            
            row.append(th);
            row.append(name);
            row.append(height);
            row.append(weight);
            row.append(stat);
            
            out.append(row);
        }
            
        
        
        } else {
            document.getElementById("output").innerHTML = "no results";
        }
    
    }
  };
  xhttp.open("GET", "request.php?request=ShowAllPlayers&sortBy="+sortBy+"&statType="+statType, true);
  xhttp.send("");
    
    
}
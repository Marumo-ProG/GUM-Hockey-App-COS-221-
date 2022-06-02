function ChangeTable() {
    var theList = document.getElementById("stats"); 
    if (theList.options[theList.selectedIndex].text == "Games"){
        document.getElementById("PlayerStats").style.visibility = "hidden"; 
        document.getElementById("GameStats").style.visibility = "visible"; 
    } else if (theList.options[theList.selectedIndex].text == "Players") {
        document.getElementById("PlayerStats").style.visibility = "visible"; 
        document.getElementById("GameStats").style.visibility = "hidden"; 
    }
}
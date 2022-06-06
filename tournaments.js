function DiffTable() {
    var theList = document.getElementById("upcoming"); 
    if (theList.options[theList.selectedIndex].text == "Tournaments"){
        document.getElementById("Tournaments").style.visibility = "visible"; 
        document.getElementById("Games").style.visibility = "hidden"; 
    } else if (theList.options[theList.selectedIndex].text == "Games") {
        document.getElementById("Tournaments").style.visibility = "hidden"; 
        document.getElementById("Games").style.visibility = "visible"; 
    }
}
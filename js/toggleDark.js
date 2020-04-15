function toggleDark() {
  
    //-----------------------------------------------------------------------------------------------------------------------
    // Dett er en JavaScript funksjon som bytter CSS stylesheet fra vanlig til darkmode når bruker trykker på en checkbox
    //-----------------------------------------------------------------------------------------------------------------------
    // Kodet av: Vigleik Espeland Stakseng

    var checkBox = document.getElementById("toggle1");      // Finner selve checkboxen
  
    var link = document.getElementById("lnk");              // Finner output teksten

    if (checkBox.checked == true){                          // if-setning som kjører dersom checkbox/toggleswitch er TRUE
        link.setAttribute("href", "css/sheetDark.css");     // Setter href til stylesheet for darkmode
    } else {                                                // if-setning som kjører dersom checkbox/toggleswitch er FALSE
        link.setAttribute("href", "css/stylesheet.css");    // Setter href til stylesheet for vanlig nettside design (ikke darkmode)
    }
}
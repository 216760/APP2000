function toggleDark(cssFile) {
  
    //-----------------------------------------------------------------------------------------------------------------------
    // Dett er en JavaScript funksjon som bytter CSS stylesheet fra vanlig til darkmode når bruker trykker på en checkbox
    //-----------------------------------------------------------------------------------------------------------------------
    // Kodet av: Vigleik Espeland Stakseng

    var checkBox = document.getElementById("toggle1");      // Finner selve checkboxen
  
    var link = document.getElementById("text");             // Finner output teksten

    if (checkBox.checked == true){                          // if-setning som kjører dersom checkbox/toggleswitch er TRUE
        var link = document.getElementById("lnk");          // Finner CSS filen ved hjelp av getElementById
        link.setAttribute("href", "css/sheetDark.css");     // Setter href til stylesheet for darkmode
    } else {                                                // if-setning som kjører dersom checkbox/toggleswitch er FALSE
        var link = document.getElementById("lnk");          // Finner CSS filen ved hjelp av getElementById
        link.setAttribute("href", "css/sheetDark.css");     // Setter href til stylesheet for vanlig nettside design (ikke darkmode)
    }

}
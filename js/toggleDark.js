function toggleDark(cssFile) {
  //Kodet av: Vigleik Espeland Stakseng

  // Finner checkboxen (toggle)
  var checkBox = document.getElementById("toggle1");
  // Finner output teksten
  var link = document.getElementById("text");

  if (checkBox.checked == true){
    var link = document.getElementById("lnk"); //Finner CSS filen
	link.setAttribute("href", "css/sheetDark.css"); //Bytter href
  } else {
    var link = document.getElementById("lnk"); //Finner CSS filen
	link.setAttribute("href", "css/stylesheet.css"); //Bytter href
  }
}
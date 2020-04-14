// check for saved 'darkMode' in localStorage
let darkMode = localStorage.getItem('darkMode');

const darkModeToggle = document.querySelector('#dark-mode-toggle'); 

var link = document.getElementById("lnk");

const enableDarkMode = () => {
  link.setAttribute("href", "css/sheetDark.css");
  // 2. Update darkMode in localStorage
  localStorage.setItem('darkMode', 'enabled')
};

const disableDarkMode = () => {
  link.setAttribute("href", "css/stylesheet.css");
  // 2. Update darkMode in localStorage
  localStorage.setItem('darkMode', null);
};

// If the user already visited and enabled darkMode
// start things off with it on
if (darkMode === 'enabled') {
  enableDarkMode();
}

// When someone clicks the button
darkModeToggle.addEventListener('click', () => {
  // get their darkMode setting
  darkMode = localStorage.getItem('darkMode'); 
  
  // if it not current enabled, enable it
  if (darkMode !== 'enabled') {
    enableDarkMode();
    console.log(darkMode);
  // if it has been enabled, turn it off  
  } else {  
    disableDarkMode();
    console.log(darkMode); 
  }
});
// http://regexlib.com/(X(1)A(zXVJ7BDYjXavh0UfIrda8tI_86fNWFJaVEmhF3PFb-HgwvV34ArZow26DqB7HBEB3Rwo60Sbr6pK6Kp3T-onqXmm88v8eYrQs77r8BGhEHRgNxxq2veVnNkvjj6VxrNdempAnPp_nBL9Fk0wZUqSXIKModGLbrtW4KkVpzOwR-bjgPlyRrMuvuxq1XHCCltx0))/Search.aspx?k=password&AspxAutoDetectCookieSupport=1
function validation(){
    
    let password = document.forms["form1"]["password"].value
    let message = document.getElementById("error_message").innerHTML= ""
    let regex = /^[a-zA-Z]\w{3,14}$/

    if (password.match(regex)){
        message.document.getElementById("error_message").innerHTML= ""
        return true;
    
    } else{
        message.document.getElementById("error_message").innerHTML= "The password's first character must be a letter, it must contain at least 4 characters and no more than 15 characters and no characters other than letters, numbers and the underscore may be used";
        return false;
    }   
}
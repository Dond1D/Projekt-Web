function validateSignupForm() {
    var mail = document.getElementById("signEmail").value;
    var name = document.getElementById("signName").value;
    var password = document.getElementById("signPassword").value;

    if (mail == "" || name == "" || password == "") {
        document.getElementById("errorMsg").innerHTML = "Please fill the required fields"
        return false;
    }

    else if (password.length < 8) {
        document.getElementById("errorMsg").innerHTML = "Your password must include atleast 8 characters"
        return false;
    }
   
}

function validateLoginForm() {
    var name = document.getElementById("logName").value;
    var password = document.getElementById("logPassword").value;

    if (name == "" || password == "") {
        document.getElementById("errorMsg").innerHTML = "Please fill the required fields"
        return false;
    }

    else if (password.length < 8) {
        document.getElementById("errorMsg").innerHTML = "Your password must include atleast 8 characters"
        return false;
    }
   
} 

function suggestionForm(){
    const sugName = document.getElementById("fname").value;
var lastname = document.getElementById("lname").value;
var subject = document.getElementById("subject").value;

if (sugName == "" || lastname == "" || subject == "") {
   alert('Please fill empty spaces');
    return false;
    }
}




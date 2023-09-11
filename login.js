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
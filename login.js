function validateForm() {
    var un = document.loginform.uname.value;
    var pw = document.loginform.password.value;
    var username = "admin";
    var password = "admin@123";
    if ((un == username) && (pw == password)) {
        window.location = "navbar/nav.php";
        return true;
    } else {
        alert("Login was unsuccessful, please check your username and password");
        return false;
    }
}

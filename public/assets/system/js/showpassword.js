function showPassword() {
    var y = document.getElementById("password");
    if (y.type === "password") {
        y.type = "text"
    } else if (y.type === "text") {
        y.type = "password"
    }
}
let loginButton = document.getElementById("loginButton")
let regButton = document.getElementById("regButton")

let regForm = document.getElementsByClassName("regForm")[0]
let loginForm = document.getElementsByClassName("loginForm")[0]

loginButton.onclick = function() {
    regForm.style.display = "none"
    loginForm.style.display = "flex"
}

regButton.onclick = function() {
    regForm.style.display = "flex"
    loginForm.style.display = "none"
}
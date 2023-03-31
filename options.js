// Options
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.querySelector("#optionsBtn").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.querySelector("#optionsBtn").style.display = "block";
}

document.querySelector("#optionsBtn img").addEventListener("click", openNav);
document.querySelector(".closebtn").addEventListener("click", closeNav);
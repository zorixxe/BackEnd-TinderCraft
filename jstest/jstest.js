let n = 1;

//Dessa tre uppdateras varje gång next() körs.
let container = document.querySelector(`div#n${n}`);
let containerNext = document.querySelector(`div#n${n + 1}`);
let containerID = document.querySelector(`div#n${n} .container`).getAttribute('id');

document.querySelectorAll(".n").forEach((elem) => {
    elem.style.display = "none";
    container.style.display = "block";
});

const likesColor = () => {
    document.querySelectorAll(".likeAmount").forEach((elem) => {
        let str = elem.innerHTML.match(/-?\d+/g);
        if (str > 0) elem.style.color = "rgb(0, 255, 60)";
        else if (str < 0) elem.style.color = "rgb(255, 0, 60)";
        else elem.style.color = "#FAF9F6";
    });
    console.log("likesColor()");
}

likesColor();


const updateLikes = (id, str) => {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(`div#n${n} .likeAmount`).innerHTML = this.responseText;
            likesColor();
        }
    };
    xmlhttp.open("GET", "likes.php?id=" + id + "&like=" + str, true);
    xmlhttp.send();
}

const next = () => {
    container.style.display = "none";
    containerNext.style.display = "block";
    n++;
    container = document.querySelector(`div#n${n}`);
    containerNext = document.querySelector(`div#n${n + 1}`);
    containerID = document.querySelector(`div#n${n} .container`).getAttribute('id');
    console.log(n);
}

const like = (evt) => {
    console.log("rightswipe()");
    updateLikes(containerID, "like")
    evt.currentTarget.removeEventListener("click", like);
    evt.currentTarget.style.backgroundColor = "rgb(0, 255, 60)";
    evt.currentTarget.style.pointerEvents = "none";
    document.querySelector(`#dislikelike${n}`).removeEventListener("click", dislike);
    document.querySelector(`#dislikelike${n}`).style.pointerEvents = "none";
    console.log("dislike removed");
}

const dislike = (evt) => {
    console.log("leftswipe()");
    updateLikes(containerID, "dislike")
    evt.currentTarget.removeEventListener("click", dislike);
    evt.currentTarget.style.backgroundColor = "rgb(255, 0, 60)";
    evt.currentTarget.style.pointerEvents = "none";
    document.querySelector(`#like${n}`).removeEventListener("click", like);
    document.querySelector(`#like${n}`).style.pointerEvents = "none";
    console.log("like removed");
}

const reloadCheck = () => {
    if (n >= 5 || containerNext === null) {
        location.reload();
    }
    else return false;
}

document.querySelectorAll(".like").forEach((elem) => {
    elem.addEventListener("click", like);
});


document.querySelectorAll(".dislike").forEach((elem) => {
    elem.addEventListener("click", dislike);
});

document.querySelectorAll(".next").forEach((elem) => {
    elem.addEventListener("click", () => {
        if (reloadCheck() === false) {
            next();
        }
    });
});

document.querySelector("#preference").addEventListener("change", () => {
    window.location = "./jstest.php?preference=" + document.querySelector("#preference").value + "&sort=" + document.querySelector("#sort").value;
});

document.querySelector("#sort").addEventListener("change", () => {
    window.location = "./jstest.php?preference=" + document.querySelector("#preference").value + "&sort=" + document.querySelector("#sort").value;
});
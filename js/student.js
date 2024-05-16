// index.html
document.addEventListener("DOMContentLoaded", () => {
    let trends = JSON.parse(localStorage.getItem("trends"));
    let news = JSON.parse(localStorage.getItem("news"));

    let links = document.querySelectorAll("#trends > .cardList > .card > a");
    links.forEach((link, index) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            localStorage.setItem("business", JSON.stringify(trends[index]));
            window.dispatchEvent(new Event("NewBusinessEvent"));
            document.querySelectorAll("main").forEach((frame) => {
                frame.style.display = "none";
            });
            document.getElementById("Business").style.display = "block";
        });
    });

    links = document.querySelectorAll("#new > .cardList > .card > a");
    links.forEach((link, index) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            localStorage.setItem("business", JSON.stringify(news[index]));
            window.dispatchEvent(new Event("NewBusinessEvent"));
            document.querySelectorAll("main").forEach((frame) => {
                frame.style.display = "none";
            });
            document.getElementById("Business").style.display = "block";
        });
    });
});

// business.html
function postApplySuccess(response) {
    alert(response ? "Richiesta inoltrata con successo" : "Si è verificato un errore, riprova più tardi");
}

function prjSuccess(response) {
    if (response !== false) {
        document.getElementById("projects").innerHTML = "";
        console.log(response);
        response.forEach((project) => {
            let prj = document.createElement("div");
            let prjTitle = document.createElement("span");
            let prjContent = document.createElement("div");
            let prjDesc = document.createElement("a");
            let prjApply = document.createElement("button");

            prj.classList.add("rectangle");
            prjTitle.classList.add("rectangleTitle");
            prjContent.classList.add("rectangleContent");
            prjDesc.classList.add("rectangleDesc");
            prjApply.classList.add("rectangleAction");

            prjTitle.innerText = project.title;
            prjDesc.innerText = project.description;
            prjApply.innerHTML = "<img src='./assets/apply.svg'/>";

            let business = JSON.parse(localStorage.getItem("business"));

            prjApply.addEventListener("click", () => {
                $.ajax({
                    url: "./includes/stdFunc.php",
                    type: "post",
                    data: {
                        postApply: "1",
                        id_business: business.id_business,
                        id_project: project.id_project,
                        id_user: "32182708-0547-11ef-a34e-c62f196bb7a8"
                    },
                    success: postApplySuccess,
                });
            });

            prjContent.appendChild(prjDesc);
            prjContent.appendChild(prjApply);

            prj.appendChild(prjTitle);
            prj.appendChild(prjContent);

            document.getElementById("projects").appendChild(prj);
        });
    }
}

window.addEventListener("NewBusinessEvent", function () {
    let business = JSON.parse(localStorage.getItem("business"));
    document.getElementById("profileName").innerText = business.name;
    $.ajax({
        url: "./includes/stdFunc.php",
        type: "post",
        data: { getProjects: "1", id_business: business.id_business },
        success: prjSuccess,
    });
});

// search.html
function searchSuccess(response) {
    document.getElementById("searchResult").innerHTML = "";
    response.map((obj) => {
        let business = document.createElement("div");
        let link = document.createElement("a");
        let img = document.createElement("img");
        let businessName = document.createElement("h3");
        let businessField = document.createElement("h5");
        let businessHeadQuarter = document.createElement("h5");

        business.classList.add("card");
        link.href = "";
        link.id = obj.id_business;
        img.src = obj.logo;
        businessName.innerText = obj.name;
        businessField.innerText = obj.field;
        businessHeadQuarter.innerText = obj.city;

        link.addEventListener("click", (e) => {
            e.preventDefault();
            localStorage.setItem("business", JSON.stringify(obj));
            window.dispatchEvent(new Event("NewBusinessEvent"));
            document.querySelectorAll("main").forEach((frame) => {
                frame.style.display = "none";
            });
            document.getElementById("Business").style.display = "block";
        });

        link.appendChild(img);
        link.appendChild(businessName);
        link.appendChild(businessField);
        link.appendChild(businessHeadQuarter);

        business.appendChild(link);

        document.getElementById("searchResult").appendChild(business);
    })
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("searchbtn").addEventListener("click", () => {
        let searchtxt = document.getElementById("search_input").value;
        let regione = document.getElementById("regione").value;
        let provincia = document.getElementById("provincia").value;
        $.ajax({
            url: './includes/stdFunc.php',
            type: 'post',
            data: { "searchBusiness": "1", "search": searchtxt, "regione": regione, "provincia": provincia},
            success: searchSuccess
        });
    });
});
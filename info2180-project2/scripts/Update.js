window.onload = function () {
    Home();

}
function OpenIssue(e) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/info2180-project2/scripts/IssueDetails.php?q=" + e, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML =
                this.responseText;
        }
    };
    console.log(e);
}

function ChangeStatus(id, mode) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/info2180-project2/scripts/UpdateIssue.php?q=" + mode + "&i=" + id, true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("Update").innerHTML =
                this.responseText;
        }
    };


}

function Home() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/info2180-project2/scripts/Dashboard.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML =
                this.responseText;

            document.getElementById("all").classList.add("activeButton");
           document.getElementById("open").classList.add("passiveButton");
           document.getElementById("my_tickets").classList.add("passiveButton");
            var xhttp = new XMLHttpRequest();


            xhttp.open("GET", "http://localhost/info2180-project2/scripts/GetIssues.php?q=all", true);
            xhttp.send();

            document.getElementById("all").addEventListener("click", () => {
                xhttp.open("GET", "http://localhost/info2180-project2/scripts/GetIssues.php?q=all", true);
                xhttp.send();
            


            });

            document.getElementById("open").addEventListener("click", () => {
                xhttp.open("GET", "http://localhost/info2180-project2/scripts/GetIssues.php?q=open", true);
                xhttp.send();

            });

            document.getElementById("my_tickets").addEventListener("click", () => {
                xhttp.open("GET", "http://localhost/info2180-project2/scripts/GetIssues.php?q=my_tickets", true);
                xhttp.send();

            });
        






            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("table").innerHTML =
                        this.responseText;



                }
            }
        }
    };

}

function addUser(user) {
    if (user != "1") {
        return;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/info2180-project2/scripts/AddNewUser.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML =
                this.responseText;

        }
    };






}

function addIssue() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "http://localhost/info2180-project2/scripts/CreateIssue.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML =
                this.responseText;

        }
    };



}

function logout() {
    

}

function submitIssue() {
    var data = new FormData();
    data.append("Title", document.getElementsByName("Title")[0].value);
    data.append("Description", document.getElementsByName("Description")[0].value);
    data.append("Type", document.getElementsByName("Type")[0].value);
    data.append("Priority", document.getElementsByName("Priority")[0].value);
    data.append("Assigned", document.getElementsByName("Assigned")[0].value);

    // (B) AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "SaveIssue.php");
    // What to do when server responds
    xhr.onload = function () {
        document.getElementById("data").innerHTML = this.responseText;
        
    };
    xhr.send(data);

    // (C) PREVENT HTML FORM SUBMIT
    return false;
}

function submitLogIn() {
    var data = new FormData();
    data.append("firstname", document.getElementsByName("firstname")[0].value);
    data.append("lastname", document.getElementsByName("lastname")[0].value);
    data.append("password", document.getElementsByName("password")[0].value);
    data.append("email", document.getElementsByName("email")[0].value);


    // (B) AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./newuservalidation.php");
    // What to do when server responds
    xhr.onload = function () {
        
        if(this.responseText == "New user has been successfully added."){
            addUser("1");
         }
        alert(this.response);
    };
    xhr.send(data);

    // (C) PREVENT HTML FORM SUBMIT
    return false;



}

function setActive(button){
    
    var btn = document.getElementsByClassName("activeButton")[0];
    btn.classList.remove("activeButton");
    btn.classList.add("passiveButton");
    document.getElementById(button).classList.remove("passiveButton");
    document.getElementById(button).classList.add("activeButton");
    
   
    
    
    
   }

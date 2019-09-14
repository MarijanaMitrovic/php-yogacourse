$(document).ready(function () {
    $("#btnSubmit").click(function (evt) {
    evt.preventDefault();
    console.log("Contact form button works");
    var arrayOk = [];
    var arrayNotOk = [];
    var flag = true;
    var firstName = document.querySelector("#tbName").value;
    var reFirstLastName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    if (!reFirstLastName.test(firstName)) {
    document.querySelector("#tbName").style.border = "1px solid red";
    arrayNotOk.push("First name is not ok");
    flag = false;
    } 
    else if (firstName===""){
        document.querySelector("#tbName").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbName").style.border = "1px solid #ccc";
    }

    var email = document.querySelector("#tbMail").value;
    var reEmail = /^[A-Za-z-_.]{2,15}@[A-Za-z._-]{2,10}\.[a-z]{2,5}$/;
    if (!reEmail.test(email)) {
    document.querySelector("#tbMail").style.border = "1px solid red";
    arrayNotOk.push("Email is not ok");
    flag = false;
    } 
    else if (email===""){
        document.querySelector("#tbMail").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbMail").style.border = "1px solid #ccc";
    }

    var subject = document.querySelector("#tbSubject").value;
    var reSubject = /^[A-Za-z0-9\s]{2,50}$/;
    if (!reSubject.test(subject)) {
    document.querySelector("#tbSubject").style.border = "1px solid red";
    arrayNotOk.push("Subject is not ok");
    flag = false;
    } 
    else if (subject===""){
        document.querySelector("#tbSubject").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbSubject").style.border = "1px solid #ccc";
    }

    var message = document.querySelector("#tbMessage").value;
    var reMessage = /^[A-Za-z0-9\s\.,?!]{2,}$/;
    if (!reMessage.test(message)) {
    document.querySelector("#tbMessage").style.border = "1px solid red";
    arrayNotOk.push("Message is not ok");
    flag = false;
    } 
    else if (message===""){
        document.querySelector("#tbMessage").style.border = "1px solid red";
    }
    else {
    document.querySelector("#tbMessage").style.border = "1px solid #ccc";
    }
    if (!flag) {
    return flag;
    }
    

     


    $.ajax({
    method: "POST",
    url: "php/validation.php",
    data: {
    btnSubmit: true,
    tbName: firstName,
    tbMail: email,
    tbSubject: subject,
    tbMessage: message
    },
    success: function (podaci) {
    if (podaci) {
    
    alert("Message send successfully!");
    }
    },
    error: function (xhr, statusTxt, error) {
    var status = xhr.status;
    switch (status) {
    case 500:
    alert("Server error");
    break;
    case 404:
    alert("Page not found");
    break;
    default:
    alert("Error: " + status + " - " + statusTxt);
    break;
    }
    }
    });
  
    });
    });
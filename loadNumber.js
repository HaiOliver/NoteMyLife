// $(function () {
//     // call loadNote.php
//     var result;
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyDtate == 4 && this.status == 200) {
//             result = this.responseText;
//             callBack(result)
//         }
//     }
//     xhttp.open("POST", "GrabRowDB.php", true);
//     xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhttp.send()

// });

// function callBack(data) {
//     console.log("in callBack" + data);
//     return data;
// }



$(function giveUp() {
    
    $.ajax({
        url: "GrabRowDB.php",
        success: function (data, status, xhr) {
            console.log("retrieve quote from DB: " + data)
             return callBack(data);
            alert("retrieve quote from DB: " + data);
            // $("#noteSection").html(data);

        },
        error: function () {
            alert("success fail from ajax call in loadNote.php->myNote.js");
        }
    })

});

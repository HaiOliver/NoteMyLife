$(function giveUp() {

    $.ajax({
        url: "GrabRowDB.php",
        success: function (data, status, xhr) {
            // console.log("retrieve quote from DB: " + data)
            return callBack(data);
            // alert("retrieve quote from DB: " + data);
            // $("#noteSection").html(data);

        },
        error: function () {
            alert("success fail from ajax call in loadNote.php->myNote.js");
        }
    })

});

$(function () {
    $.ajax({

        url: "loadNote.php",
        success: function (data, status, xhr) {
            alert("server response to loadNote.php " + status);
            $("#noteSection").html(data);
        },
        error: function () {
            alert("fetch note id from DB fail ");
        }
    });















});

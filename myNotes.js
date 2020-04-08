$(function () {
    // call loadNote.php
    $.ajax({
        url: "loadNote.php",
        success: function (data, status, xhr) {
            alert("server response from loadNote.php->myNote.js->afterLogIn.php " + status);
            $("#noteSection").html(data);
        },
        error: function () {
            alert("success fail from ajax call in loadNote.php->myNote.js");
        }
    });

    // call loadQuote.php
    $.ajax({
        url: "loadQuote.php",
        success: function (data, status, xhr) {
            alert("server response from loadQuote.php->myNote.js->afterLogIn.php " + status);
            $("#blockQuote").html(data);

        },
        error: function () {
            alert("success fail from ajax call in loadQuote.php->myNote.js");
        }
    })

    // call loadUrl.php
    $.ajax({
        url: "loadUrl.php",
        success: function (data, status, xhr) {
            alert("server response from loadUrl.php->myNote.js->afterLogIn.php " + status);
            $("#blockVideo").html(data);
        },
        error: function () {
            alert("loadUrl.php->myNote.js->afterLogIn.php fail !!")
        }
    })

    // call loadImages
    $.ajax({
        url: "loadImage.php",
        success: function (data, status, xhr) {
            alert("server response from loadImage.php->myNote.js->afterLogIn.php " + data);
            $("#blockImage").html(data);
        },
        error: function () {
            alert("loadImage.php->myNote.js->afterLogIn.php fail !!")
        }
    })


















});

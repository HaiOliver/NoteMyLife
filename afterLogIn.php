<?php
session_start();

if(isset($_SESSION['logIn'])){
    $email = $_SESSION['email'];

}else{
    $email = "user does not exist";
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Bellota:400,700,700i&display=swap" rel="stylesheet">
    </link>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <title>Hello, world!</title>
    <script>
        numberNote = 0
        numberQuote = 0

        function saveNote(numberNote) {
            var value = document.getElementById("note" + numberNote).value
            document.getElementById("note1").innerHTML = value
            createNoteSection(numberNote)


        }

        function deleteNote(localNumber) {

            console.log("Local number ", localNumber, "in deleteNote call")
            var del = document.getElementById("note" + localNumber)
            var savebtn = document.getElementById("saveButton" + localNumber)
            var delbtn = document.getElementById("deleteButton" + localNumber)
            // set action
            document.getElementById("noteSection").removeChild(del)
            document.getElementById("noteSection").removeChild(savebtn)
            document.getElementById("noteSection").removeChild(delbtn)
            window.alert("Note " + localNumber + " is deleted")

        }


        function createNoteSection() {



            numberNote = numberNote + 1
            var localNumber = numberNote

            let i = document.createElement("textarea")
            i.id = "note" + numberNote
            i.cols = "40"
            i.style.opacity = "0.7"
            i.style.marginTop = "30px"
            i.rows = "7"

            console.log(i.id, "is created")

            document.getElementById("noteSection").appendChild(i)
            // break line
            let br = document.createElement("br")
            document.getElementById("noteSection").appendChild(br)
            //Save Button
            let saveBtn = document.createElement("button")
            //Add Save to button
            var addSave = document.createTextNode("Save")
            // Add Save word into button  
            saveBtn.appendChild(addSave)

            // saveBtn.id = "saveButton" + numberNote
            saveBtn.id = "saveButton" + localNumber
            saveBtn.style.height = "50px"
            saveBtn.style.width = "100px"
            saveBtn.style.marginLeft = "30px"

            saveBtn.className = "btn btn-success center-block"
            document.getElementById("noteSection").appendChild(saveBtn)

            console.log("saveButton number ", saveBtn.id)

            //Set onlick event
            saveBtn.onclick = function () {
                saveNote(localNumber)
            }


            // ******Delete Button***********
            let deleteBtn = document.createElement("button")
            let addDelete = document.createTextNode("Delete")
            deleteBtn.appendChild(addDelete)
            deleteBtn.style.marginLeft = "10px"
            deleteBtn.style.height = "50px"
            deleteBtn.style.width = "100px"
            // deleteBtn.id = "deleteButton" + numberNote

            deleteBtn.id = "deleteButton" + localNumber

            console.log("deleteButton number ", deleteBtn.id)

            deleteBtn.className = "btn btn-warning center-block"

            document.getElementById("noteSection").appendChild(deleteBtn)
            deleteBtn.onclick = function () {
                deleteNote(localNumber)
            }


            // break line
            let br2 = document.createElement("br")
            document.getElementById("noteSection").appendChild(br2)

        }


        function createBlockQuote(quote, author) {
            numberQuote += 1
            // create BlockQuote
            createQuote = document.createElement("blockquote")
            createQuote.className = "blockquote text-center"

            // Create p tag
            createPtag = document.createElement("p")
            createPtag.className = "mb-0"
            // Create content for p tag
            createContent = document.createTextNode(
                quote)
            // Add content to p tag
            createPtag.appendChild(createContent)
            // Add p tag into blockQuote
            createQuote.appendChild(createPtag)

            // create Footer & property
            createFooter = document.createElement("footer")
            createFooter.className = "blockquote-footer"
            // content footer
            contentFooter = document.createTextNode(author)
            createFooter.appendChild(contentFooter)

            // add footer to createQuote
            createQuote.appendChild(createFooter)

            document.getElementById("blockQuote").appendChild(createQuote)




        }

        function addNewQuote() {
            var contentNewQuote = document.getElementById("newQuote").value
            var newAuthor = document.getElementById("newAuthor").value

            createBlockQuote(contentNewQuote,newAuthor)
            numberQuote+=1

        }

        function createImage(url){
            
            var newImage = document.createElement("img")
            newImage.src= url
            newImage.style.height ="300px"
            newImage.style.width= "300px"
            newImage.style.marginTop ="20px"
            document.getElementById("imageSection").appendChild(newImage)
        }

        function addNewImage(){
            var newUrl = document.getElementById("newImage").value
            createImage(newUrl)
        }

       
        onload = function () {
            createNoteSection();
            var listQuote = [
                "I think being in love with life is a key to eternal youth.",
                "You’re only here for a short visit. Don’t hurry, don’t worry. And be sure to smell the flowers along the way.",
                "A man who dares to waste one hour of time has not discovered the value of life.",
                "If life were predictable it would cease to be life, and be without flavor.",
                "All life is an experiment. The more experiments you make the better.",
                "All of life is peaks and valleys. Don’t let the peaks get too high and the valleys too low.",
                "Find ecstasy in life; the mere sense of living is joy enough."


            ]
            var listAuthor = ["Doug Hutchison", "Walter Hagen", "Charles Darwin", "Eleanor Roosevelt",
                "Ralph Waldo Emerson", "John Wooden", "Emily Dickinson"

            ]
            for (var i = 0; i < listQuote.length; i++) {
                numberQuote+=1
                createBlockQuote(listQuote[i], listAuthor[i])
            }
            
            var listImages = [
                "personalImage/0.jpg",
                "personalImage/1.jpg",
                "personalImage/2.jpg",
                "personalImage/3.jpg",
                "personalImage/4.jpg",
                "personalImage/5.jpg",
                "personalImage/6.jpg",

            ]
            for(var i =0; i< listImages.length;i++){
                createImage(listImages[i])
            }


        }

    </script>
</head>

<body>

    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="row">
                <a class="navbar-brand" href="#">Oliver Note Taking</a>
            </div>
            <div class="row">
                <a class="navbar-brand float-right" href="#">Log in as <?php 
                echo $email;
                
                ?></a>
                <!-- <a class="navbar-brand float-right" href="logOut.php">Log out</a> -->
                <a class="navbar-brand float-right" >Log out</a>
            </div>
        </div>
        

        
        
    </nav>


    <!-- note start here -->
    <div class="container-fluid">
        <div class="row">
            <!-- List to do -->
            <div class="col-sm-3 ">
                <p class="display-1"> Must do</p>
                <div id="noteSection">
                </div>
            </div>
            <div class="col-sm-3 ">
                <p class="display-1"> Galleries </p>
                <div id="imageSection"></div>
                <textarea id="newImage" rows="2" cols="30" placeholder ="paste url here"></textarea>
                <br>
                <button id="addNewImage" onclick="addNewImage()" type="button" class="btn btn-info center-block">Add Image</button>

            </div>
            <!-- video section -->
            <div class="col-sm-3 ">
                <p class="display-1"> Video </p>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tS09NpmwBfw"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wnHW6o8WMas"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LvHVPgR69EA"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/26U_seo0a1g"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/g-jwWYX7Jlo"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dOkNkcZ_THA"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v7KQsS2kLM4"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/4gi9y3sTrXE"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cTKOwp0UfyM"  allowfullscreen></iframe>
                </div>

                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qFaDVPauxAU"  allowfullscreen></iframe>
                </div>

            </div>
            <!-- list Quote -->
            <div class="col-sm-3 ">
                <p class="display-1"> Quotes</p>
                <div id="blockQuote"></div>
                <div class="d-flex flex-column">
                <textarea id = "newQuote" rows="1" cols="30" placeholder="add quote here"></textarea>
                <br>
                <textarea id="newAuthor" rows="1" cols="20" placeholder ="add author here"></textarea>
                <br>
                <button id="addNewQuote" onclick="addNewQuote()" type="button" class="btn btn-info center-block">Add new quote</button>

                </div>

            </div>

        </div>


    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
// }else{
//     header("location:index.php");
// }

?>
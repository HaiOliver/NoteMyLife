<?php
session_start();
include('connection.php') ;
// testing
$_SESSION['logIn'] = 1;
$_SESSION['email'] = "test";

// test

// user exist on Database
if(isset($_SESSION['logIn'])){
    $email = $_SESSION['email'];
    $user_id = $_SESSION['logIn'];
    if(isset($_SESSION['signUp'])){
        $numberNote = 0;
    }else{
        $numberNote = $_SESSION['numberNote'];
    }
    
    

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="myNotes.js"></script>

    <script type="text/Javascript">
        // set numberNote respond to Database
        numberNote = <?php echo $numberNote ?>;
        numberQuote = 0

        function saveNote(numberNote) {
            
            var value = document.getElementById("note" + numberNote).value;
            document.getElementById("note1").innerHTML = value;
            console.log("node value : "+ value)
            var data = {'noteContent': value} ;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    console.log("response : "+this.responseText);
                    }
            };
            xhttp.open("POST", "saveNoteOnDB.php" , true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhttp.send("noteContent="+value);

            // Automatically create new note
            createNoteSection(numberNote);

        
        }

        function deleteNoteOnDB(currentNote){

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    console.log("response in delete() called: "+this.responseText);
                    }
            };
            xhttp.open("POST", "deleteNoteOnDB.php" , true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhttp.send("node_id="+currentNote);

            //
            window.alert("Note " + currentNote + " is deleted from deleteNoteOnBD()")

        }

        function deleteNote(localNumber) {

            console.log("Local number in deleteNote call: note"+ localNumber)
            var del = document.getElementById("note" + localNumber)
            console.log("del value : "+ del);
            var savebtn = document.getElementById("saveButton" + localNumber)
            var delbtn = document.getElementById("deleteButton" + localNumber)
            // set action
            document.getElementById("noteSection").removeChild(del)
            document.getElementById("noteSection").removeChild(savebtn)
            document.getElementById("noteSection").removeChild(delbtn)

            // AJAX call
            deleteNoteOnDB(localNumber);
            
        }


        function createNoteSection() {

            numberNote = numberNote + 1;
            var localNumber = numberNote;

            let i = document.createElement("textarea");
            i.id = "note" + numberNote ;
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

            console.log("saveButton id :  ", saveBtn.id)

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

            //Carefull
            
            deleteBtn.onclick = function () {
                deleteNote(localNumber)
            }
            // break line
            let br2 = document.createElement("br")
            document.getElementById("noteSection").appendChild(br2)

        }


       
        onload = function () {
             createNoteSection();

            $(function(){
                for(let i = 1; i<=<?php echo $numberNote ?>;i++ ){
                    $("#deleteButton"+i).on("click",function(){
                        console.log("note in Ajax called: "+i);
                        $("#note"+i).remove();
                        $("#saveButton"+i).remove();
                        $("#deleteButton"+i).remove();
                        // Delete Note From DB
                        deleteNoteOnDB(i);
                })
                    
            }} )
        

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
                <!-- <div id="noteFromDB"></div> -->
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
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script> -->
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
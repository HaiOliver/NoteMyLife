<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     
    <script src='loadNumber.js'>
        var testAjax = giveUp();
        alert("test AJAX"+testAjax)
        console.log("result in afterLogIn.php: "+ testAjax)

       
    </script> 
     <!-- IMPORTANT Load myNotes.js -->
    <script src='myNotes.js'></script>

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
    <!-- <script src="myNotes.js"></script> -->

    <?php

    // user exist on Database
    // session_start();
    $message = "session_start after ajax";
echo "<script type='text/javascript'>alert('$message');</script>";
if(isset($_SESSION['logIn'])){
    $email = $_SESSION['email'];
    $user_id = $_SESSION['logIn'];
    if(isset($_SESSION['signUp'])){
        $numberNote = 0;
        $numberQuote = 0;
        $numberVideo = 0;
        $numberImage = 0;
    }
    // else{
    //     //  if sign up and they dont create any notes yet 
    //     if(isset($_SESSION['numberNote'])){
    //         $numberNote = $_SESSION['numberNote'];
            
    //     }else{
    //         $numberNote = 0; 
    //     }

    //     // if(isset($_SESSION['numberQuote'])){
    //     //     $numberQuote = $_SESSION['numberQuote'];
    //     //     echo "<script>alert(". $numberQuote .")</script>";
            
    //     // }else{
    //     //     $numberQuote = 0; 
    //     //     echo "<script>alert(". $numberQuote ." in else)</script>";
    //     // }

    //     if(!isset($_SESSION['numberQuote'])){
    //         $_SESSION['numberQuote'] = 0 ;
    //     }
        
    //     if(isset($_SESSION['numberVideo'])){
    //         $numberVideo = $_SESSION['numberVideo'];
    //     }else{
    //         $numberVideo =0 ;
    //     }
    //     if(isset($_SESSION['numberImage'])){
    //         $numberImage = $_SESSION['numberImage'];
    //     }else{
    //         $numberImage =0;
    //     }

    //     // Tesitng =================
        
        
    // }
    
    

}else{
    $email = "user does not exist";
}

?>
    <script type="text/Javascript">
        // set numberNote respond to Database
        numberNote = <?php echo $numberNote ?>;
        // var numberQuote =  echo $numberQuote ;


        var numberQuote = <?php echo $_SESSION['numberQuote'] ?>;
       
        
        numberVideo = <?php echo $numberVideo ?>;
        numberImage = <?php echo $numberImage ?>;


    // Testin =======================================================
    // Grab from data base
        function callBack(data) {
            
            convertObject = JSON.parse(data)
            numberNote = convertObject[0];
            numberQuote = convertObject[1];
            numberVideo = convertObject[2];
            numberImage = convertObject[3];

            console.log("callBack note: "+numberNote);
            console.log("callBack quote: "+numberQuote);
            console.log("callBack video: "+numberVideo);
            console.log("callBack Image: "+numberImage);
            
}

        // Image section===============================
        function createImage(pathImage,currentNumberImage){
            createImageTag = document.createElement("img");
            createImageTag.id = "image"+currentNumberImage;
            createImageTag.style.height="250px"
            createImageTag.style.width="300px"
            createImageTag.style.marginTop="10px"
            createImageTag.src= pathImage;
            
            document.getElementById("blockImage").appendChild(createImageTag);

        }

        function addNewImage(){
            
            var currentNumberImage = numberImage + 1
            var nameImage = document.getElementById("fileToUpload").value
            // filter Name
            pathImage = nameImage.replace(/^.*[\\\/]/, '')
            
            fullPathImage = "uploads/"+pathImage
            console.log("fullpathImage : "+ fullPathImage)

        
            // Save url in Database
            
            var xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function(){
                if(this.readyDtate == 4 && this.status == 200){
                    pathImage = this.responseText 
                    alert("pathImage return server: "+ pathImage)
                }
            }
            xhttp.open("POST", "saveImageOnDB.php", true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send("file="+fullPathImage)

            
            
            createImage(fullPathImage,currentNumberImage)
            
            numberImage+=1

        }

        
        //==========================================================================
        
        // motivational video

        function createMotivationalVideo(url, currentNumberVideo){
            createIframe = document.createElement("iframe")
            createIframe.id = "video"+currentNumberVideo
            createIframe.className = "embed-responsive-item"
            
            createIframe.src  = url
            
            // create div tag outside Iframe
            createDiv = document.createElement("div")
            createDiv.className = "embed-responsive embed-responsive-4by3"

            createDiv.id = "divVideo"+currentNumberVideo



            // appendChild
            createDiv.appendChild(createIframe)
            document.getElementById('blockVideo').appendChild(createDiv);
            

        }

        function addNewVideo(){
            
            var currentNumberVideo = numberVideo + 1
            var url = document.getElementById("url").value
           
            // Save url in Database
            
            var xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function(){
                if(this.readyDtate == 4 && this.status == 200){
                    console.log("response in addNewVideo(): "+this.responseText);
                }
            }
            xhttp.open("POST", "saveUrlOnDB.php", true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send("link="+url);
            
            createMotivationalVideo(url,currentNumberVideo)
            
            numberVideo+=1

        }

        // =================================================================

        // Quote section===============================================================
        function createBlockQuote(quote, author, currentNumberQuote) {
            // numberQuote += 1
            // create BlockQuote
            createQuote = document.createElement("blockquote")
            createQuote.className = "blockquote text-center"
            // add id
            createQuote.id = "createQuote"+currentNumberQuote
            // Create p tag
            createPtag = document.createElement("p")
            // add id for quote content
            createPtag.id = "quoteContent"+currentNumberQuote
            createPtag.className = "mb-0"
            // Create content for p tag
            createContent = document.createTextNode(quote);

           
            // createStrongTag = document.createElement("bold")
            
            // createStrongTag.appendChild(createContent)
            // Add content to p tag
            createPtag.appendChild(createContent)
            // Add p tag into blockQuote
            createQuote.appendChild(createPtag)

            // create Footer & property
            createFooter = document.createElement("footer")
            // add id
            createFooter.id = "author" + currentNumberQuote
            createFooter.className = "blockquote-footer"
            // content footer
            contentFooter = document.createTextNode(author)
            createFooter.appendChild(contentFooter)

            // add footer to createQuote
            createQuote.appendChild(createFooter)

            console.log("ATTENTION !!! should create new quote: "+currentNumberQuote)
            document.getElementById("blockQuote").appendChild(createQuote)


        }

        function addNewQuote() { 
            var currentNumberQuote = numberQuote + 1   
            var contentNewQuote = document.getElementById("newQuote").value
            var newAuthor = document.getElementById("newAuthor").value
            createBlockQuote(contentNewQuote,newAuthor,currentNumberQuote)
            // append to page
            

            // Save quote in Database
            
            var xhttp = new XMLHttpRequest();
            
            xhttp.onreadystatechange = function(){
                if(this.readyDtate == 4 && this.status == 200){
                    console.log("response in addNewQuote(): "+this.responseText);
                }
            }
            xhttp.open("POST", "saveQuoteOnDB.php", true);
            xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhttp.send("quote_id="+currentNumberQuote+"&quote_text="+contentNewQuote+"&author="+newAuthor);
            
            //createBlockQuote(contentNewQuote,newAuthor,currentNumberQuote)
            
            formatQuote(currentNumberQuote)
            
            
            
            //numberQuote +=1
            ///// Tesing ==============================
            numberQuote = currentNumberQuote


            console.log("global update END FUNCTION be: "+ numberQuote)
            

        }

        function formatQuote(currentNumberQuote){
             // add color && style
            document.getElementById("createQuote"+currentNumberQuote ).style.color = "orange";
            document.getElementById("createQuote"+currentNumberQuote ).style.fontWeight = "900";
            document.getElementById("createQuote"+currentNumberQuote).style.fontSize = "xx-larger";

            document.getElementById("author"+currentNumberQuote ).style.color = "yellow";
            document.getElementById("author"+currentNumberQuote ).style.fontWeight = "400";
            document.getElementById("author"+currentNumberQuote).style.fontSize = "larger";
            
        }
        //=========================================================================
        //=====================================================================================
        
        
        
        // Note section =========================================================

        function saveNote(numberNote) {
            
            var value = document.getElementById("note" + numberNote).value;
           
            console.log("node value in saveNote : "+ value)
            var data = {'noteContent': value} ;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    console.log("response  in saveNote(): "+this.responseText);
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


        // ==================================================================================
        
       //Main function call everything
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
                <a class="navbar-brand float-right" href="logOut.php">Log out</a>
                <!-- <a class="navbar-brand float-right" >Log out</a> -->
            </div>
        </div>
        

        
        
    </nav>


    <!-- note start here -->
    <div class="container-fluid">
        <div class="alert alert-danger center-block">Welcome <?php
        if(isset($_SESSION['signUp'])){
            echo"new user. Start create your own notes. Have fun !!";
        }else{
            echo "back! ".$email;
        } 

?> </div>
        <div class="row">
            <!-- List to do -->
            <div class="col-sm-3 ">
                <p class="display-1"> Now</p>
                <!-- <div id="noteFromDB"></div> -->
                <div id="noteSection">
                </div>
            </div>
            <div class="col-sm-3  ">
                <p class="display-1"> Picture </p>
                <div id="blockImage"></div>
                
                <!-- <form > -->
                <!-- <form method="post" action="upload.php" enctype="multipart/form-data"> -->
                <form enctype="multipart/form-data">
                    <input type="file" name="file" id="fileToUpload">
                    <input onclick="addNewImage()"   class="btn btn-dark btn-sm center-block" style="width:120px;" value="Upload Image" name="submit">
                    <!-- <input id="addImageButton" onclick="addNewImage()"  class="btn btn-dark" type="submit" value="Upload Image" name="submit"> -->
                </form>
            </div>
            <!-- video section -->
            <div class="col-sm-3 ">
                <p class="display-1"> Video </p>
                <div id='blockVideo' ></div>
                <textarea name="url" id="url" rows="4" cols="35" placeholder ="add URL youtube here && Remember add embed tag && remove watch "></textarea>
                <br>
                <button id="addNewVideo" onclick="addNewVideo()" type="button" class="btn btn-info center-block">Add new Video</button>
            </div>
            <!-- list Quote -->
            <div class="col-sm-3 ">
                <p class="display-1"> Quotes</p>
                <div id="blockQuote"></div>

                <div class="d-flex flex-column">
                
                <textarea name="quoteContent" id = "newQuote" rows="1" cols="30" placeholder="add quote here"></textarea>
                <br>
                <textarea name="authorName" id="newAuthor" rows="1" cols="20" placeholder ="add author here"></textarea>
                <br>
                <button id="addNewQuote" onclick="window.addNewQuote();" type="button" class="btn btn-info center-block">Add new quote</button>

                </div>

            </div>

        </div>


    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>

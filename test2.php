<script>
var p1 = "write something new";
</script>

<?php
$test = "<script>document.writeln(p1)</script>";
echo $test;
?>

<form method="post" enctype="multipart/form-data">
    <input  name="file" type="file" >
    <button type="submit" name ="button">Test</button>
</form>

<?php
$test = $_POST['file'];
echo "test: ".$test;
$button = $_POST['button'];
echo "button: ".$button;


if(isset($button)){
    // $filepath = "uploads/" . $_FILES["file"]["name"];

//     if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
// {
//     echo "path: ".$filepath;
//     echo "<img src=".$filepath." height=200 width=300 />";
// } 
// else 
// {
//     echo "Error !!";
// }

}else{
    echo "Post method wrong";
}



?>


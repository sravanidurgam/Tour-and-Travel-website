<?php
$target_dir="uploads/";
$target_path=$target_dir.$_FILES['file']['name'];
$extension=strtolower(pathinfo($target_path,PATHINFO_EXTENSION));
$upload=1;
if(file_exists($target_path)){
    echo "sorry! The recommended book is already existed.Upload any other book.<br>";
    $upload=0;
}
if( $extension!='png'){
    echo "sorry!only image files are allowed<br>";
    $upload=0;
}
if($upload==0){
    echo "Sorry!Can't upload your file <br> Visit again...";
}
else{
    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path)){
        echo "Thank you!<br> your file is sucessfully uploaded<br>Visit Again..";
    }
    else{
        echo "Sorry! There something wrong while uploading.Try Again...";
    }
}
?>

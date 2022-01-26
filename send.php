<?php
if(isset($_POST['name']) &&
isset($_POST['message'])){
    include 'db_conn.php';
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $message = validate($_POST['message']);

    if(empty($message)|| empty($name)){
        header("Location: Contacts.html");
    }else{
        $sql = "INSERT INTO test(name, message) VALUES('$name','$message')";
        $res = msqli_query($conn,$sql);
        if($res){
            echo "Your message was sent successfully!";
        }else{
            echo "Your message could not be sent!";
        }
    }

}else{
    header("Location: Contacts.html");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    .error{
        color:#ff0000;
    }
    </style>
    <title>Document</title>
</head>
<body>
    <?php
        $firstnameerr = $lastnameerr = $emailerr = $doberr = $gendererr = "";
        $firstname = $lastname = $email = $dob = $gender = $comment = "";
        $flag = 1;
        if(isset($_POST["submit"])){
            if(empty($_POST["first_name"])){
                $firstnameerr = "First name is required";
                $flag = 0;
            }else{
                $firstname = test_input($_POST["first_name"]);
            }
            if(empty($_POST["last_name"])){
                $lastnameerr = "Last name is required";
                $flag = 0;
            }else{
                $lastname = test_input($_POST["last_name"]);
            }
            if(empty($_POST["email"])){
                $emailerr = "E-mail is required";
                $flag = 0;
            }else{
                $email = test_input($_POST["email"]);
            }
            if(empty($_POST["dob"])){
                $doberr = "DOB is required";
                $flag = 0;
            }else{
                $dob = test_input($_POST["dob"]);
            }
            if(empty($_POST["gender"])){
                $gendererr = "Gender is required";
                $flag = 0;
            }else{
                $gender = test_input($_POST["gender"]);
            }
            $comment = test_input($_POST["comment"]);
        }
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <fieldset>
            <legend>Details form</legend>
                <span class="error">* required fields</span><br><br>
                First name : <input type="text" name="first_name" placeholder = "Aman">
                <span class="error">*<?php echo $firstnameerr;?></span><br>
                Last name  : <input type="text" name="last_name" placeholder = "kori">
                <span class="error">*<?php echo $lastnameerr;?></span><br>
                E-mail     : <input type="email" name="email" placeholder = "abx@xyz.com">
                <span class="error">*<?php echo $emailerr;?></span><br>
                DOB        : <input type="date" name="dob">
                <span class="error">*<?php echo $doberr;?></span><br>
                Gender     :
                <label >Male:<input type="radio" name="gender" value = "Male"></label>
                <label >Female:<input type="radio" name="gender" value = "Female"></label>
                <label >Other:<input type="radio" name="gender" value = "Other"></label>
                <span class="error">*<?php echo $gendererr;?></span><br>
                Comment    : <br><textarea name="comment" id="" cols="30" rows="10" placeholder = "Write a comment here...."></textarea><br> 
                <input type="submit" name = "submit" value = "Submit">
            </fieldset>
    </form>

    <?php
        if($flag){
            echo "<h2>Input data :-</h2>";
            echo $firstname."<br>";
            echo $lastname."<br>";
            echo $email."<br>";
            echo $dob."<br>";
            echo $gender."<br>";
            echo $comment."<br>";
        }
    ?>
</body>
</html>
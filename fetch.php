<?php

$connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

if(isset($_POST['limit']))
{
    $query = "
        SELECT * FROM tbl_post
        ORDER BY id DESC 
        LIMIT ".$_POST['limit']."
    ";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $output = '';
    foreach ($result as $row)
    {
            $output .= '
            <div class="row">
                <div class="col-md-4">
                <img src="./img/'.$row["post_image"].'" alt="" class="img-thumbnail">
            </div>
              <div class="col-md-8">
              <h2><a href="'.$row["post_url"].'">'.$row["post_title"].'</a></h2>
             <br />
             <p></p>
              </div>
            </div>
            <hr />
            ';
    }
    echo $output;
}

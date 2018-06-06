<?php
include '../includes/db_connection.php';
$recipe_id = htmlspecialchars($_GET["recipe-id"]);

$sql4 = "SELECT * FROM recipemain WHERE `recipe_id` = {$recipe_id}";
$result4 = mysqli_query($connection, $sql4);
$row4 = mysqli_fetch_assoc($result4);

$sql2 = "SELECT * FROM recipesteps WHERE `recipe_id` = {$recipe_id}";
$result2 = mysqli_query($connection, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM recipeingredients WHERE `recipe_id` = {$recipe_id}";
$result3 = mysqli_query($connection, $sql3);
$row3 = mysqli_fetch_assoc($result3);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <title>
    <?php 
 
        echo $row4['recipe_title']; 
        ?>
 
     </title>
</head>

<body>
<header>
    <div class="backButton">
        <a href="../index.php"><i class="fas fa-caret-left"></i></a>
    


    </div>
            <div class="logo"> 
            <a href="../index.php">EZCook <i class="far fa-dot-circle"></i></a> 
            </div>
            
</header>
<div class="wrapper">
<div class="search">
            <form action="../includes/searchResult.php" name="searchButton" id="myForm">
                    <div>
                        <input type="text" name="search" id="search" placeholder="Search Recipes" required>
                        <input type="submit" id="btnSubmit" value="Submit">
                    </div>
                    
                    
            </form>
            
    </div>

      
       <div class="recipeInfo" id="recipeSection">
            <div class="column">
                <div class="recipeHeader">
                    
                        <div class="title"> <?php echo $row4['recipe_title']; ?></div>
                        <div class="description"> <?php echo $row4['recipe_sub_title']; ?></div>
                </div>
               
                <div class="infoWrapper">
                    <div class="icon">
                        <i class="far fa-clock"></i>
                        <span class="label">Time</span>
                        <span class="data"><?php echo $row4['time_level'];?></span>
                    </div> 
                    <div class="icon">
                            <i class="fas fa-utensils"></i>
                            <span class="label">Difficulty</span>
                            <span class="data"><?php echo $row4['difficulty_level'];?></span>
                        </div> 
                            
                            <div class="icon" id="spiceLevel">        
                                <i class="fab fa-hotjar"></i>
                                <span class="label">Spice</span>
                                <span class="data"><?php echo $row4['spicy_level'];?></span>
                            </div> 
</div>
                
                
                
                <?php 
        while($row2 = mysqli_fetch_assoc($result2)) {
           
    ?> 
            
                <div class="recipeText">
                    <?php echo $row2['step_text']; ?>
                    </div>
                
                <?php  } ?>
                
                
            </div>
            <div class="column">
                <img class="recipeImg" src="../images/<?php echo $row4['img_folder']; echo '/' . $row4['recipe_thumb'];?>.jpg" alt="A picture of the food"/>
                <div class="ingredientSection">
                    <img src="../images/<?php echo $row4['img_folder']; echo '/' . $row4['ingredients_img'];?>.png" alt="picture of the ingredients" />
                    <div class="ingredients">
                        <ul>

                            
                                <?php 
                                while($row3 = mysqli_fetch_assoc($result3)) {
                                    echo "<li>{$row3['ingredient_text']}</li></br>";
                                }
                                ?>
                        
                            
                        </ul>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>   
             
     
<footer>
        Copyright 2018
               
    </footer>   
     
</body>
</html>
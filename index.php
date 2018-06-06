
<?php include 'includes/db_connection.php';?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">


    <title>EZ Cook</title>
</head>

<body> 
    <header>
        <div class="logo"> 
           <a href="index.php">EZCook <i class="far fa-dot-circle"></i>

</a> 
        </div>
        
    </header>
    <div class="wrapper">
    <div class="search">
            <form action="includes/searchResult.php" name="searchButton" id="myForm">
                    <div>
                        <input type="text" name="search" id="search" placeholder="Search Recipes" required>
                        <input type="submit" id="btnSubmit" value="Submit">
                    </div>
                    
                    
            </form>
            
    </div>
       
        <div class="recipes">
             
            <?php
                $sql = "SELECT * FROM recipemain";
                $result = mysqli_query($connection, $sql);
                
                while($row = mysqli_fetch_assoc($result)) {
            ?>
                <a class="recipeLink" href= <?php echo "templates/recipe.php?recipe-id={$row['recipe_id']}" ?> >
                <div class="recipeIcn" id="recipe-<?php echo $row['recipe_id']?>">

                <div class="recipeName"><?php echo $row['recipe_title']?> </div>
                </div>
                </a>
                <style>
                    #recipe-<?php echo $row['recipe_id']?> {
                        background: url('images/<?php echo $row['img_folder'] . "/" . $row['recipe_thumb'] . ".jpg" ?>');
                        background-size: cover;
                    }

                </style>

                    <?php
                }
                ?>
            
        </div>
            
                
            

       
   
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
<script src="main.js" type="text/javascript"></script>
<footer>
        Copyright 2018 
    </footer>
    <?php   mysqli_close($connection); ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit client | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"  href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">  
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php require("../partials/adminsidebar.php")?>
<div id="add-body">
<div class="container">
    <div class="row">
      <form action="" class="row">
        <div class="col-5">
        <label for="search">client id : </label>
            <input type="text" name="search">
           
           
        </div>
        <div class="col-5">
        <label for="search1">client phone : </label>
        <input type="text" name="search1">
           
        </div>
        <div class="col-1">
            <input type="submit" value="Search" id="add-btn">
        </div>
       
        
      </form>
      <hr>
        <form action="" class="row">
        
        <div class="col-lg-4 col-md-12" >
            <label for="name">Name : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="name">phone : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="name">Email : </label>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <br>
        <div class="col-lg-4 col-md-12">
            <label for="name">National id  : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="name">Age : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="name"> Weight : </label>
            <input type="text" name="name" id="name">
        </div>
        <br>
        <br>

        <div class="col-lg-4 col-md-12">
            <label for="name"> Height : </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="name"> Address : </label>
            <textarea name="name" id="" cols="80" rows="1"></textarea>
            
        </div>
        <div class="col-lg-9 col-md-12">
        <input type="submit" value="Edit" id="add-btn">
            
        </div>
       
        </form>
</body>
</html>
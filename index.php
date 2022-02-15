<?php include 'pagination.php';?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pagination</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Students</h1>

    <!-- Names and Emails list -->
    <div class="titles">
      <h3>ID</h3>
      <h3>NAME</h3>
      <h3>EMAIL</h3>
    </div>
    
    <ul><?php
    foreach ($users as $u) { ?>
      <div class="values">
      <p><?php 
      printf("%u",$u["id"]);
      ?></p>
      <p><?php 
      printf("%s",$u["name"]);
      ?></p>
      <p><?php 
      printf("%s",$u["email"]);
      ?></p>
      </div>
      
      <?php
    }
    ?>
    </ul>
    
    

    <!-- PAGINATION -->
    <div class="pagination" id="pagination"><?php
    for ($i=1; $i<=$pageTotal; $i++) {
      printf("<a %shref='index.php?page=%u'>%u</a>",
        $i==$pageNow ? "class='current' " : "", $i, $i
      );
    }
    ?></div>
  </body>
</html>

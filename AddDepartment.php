<?php
//include "navbar.php";
?>
<!doctype html>
<html lang="en" style="color-scheme:light !important">  
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" herf="CSS/main.css">
    <title>Exam</title>
  </head>
  <body>
    <div class="depart1">
      <div class="depart2">
        <form action="Scripts/Add_Some.php?q=depart" method="post">
          <div class="depart3">
            <h4 style="letter-spacing:8px;">ADD DEPARTMENT</h4>
            <div id=line2 style="margin-top:8px;"></div>
          </div>
          <div class="depart4">
            <label for="inp1" class="label3">Enter Department ID</label>
            <input type="text" name="departid" class="depart5" id="inp1">
          </div>
          <div class="depart4">
            <label for="inp2" class="label3">Enter Department Name</label>
            <input type="text" name="departname" class="depart5" id="inp2">
          </div>
          <div class="depart3">
          <input type="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
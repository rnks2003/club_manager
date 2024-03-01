<html>
  <head>
    <title></title>
    <link rel="styleSheet" href="../style/login.css" />
  </head>
  <?php
  $pID = $_POST['pID'];
  $pName = $_POST['pName'];
  ?>
  <body>
    <label id="prompt">Progress Report : </label><br /><br />
    <div id="form">
      <br />
      <form method="post" action="../php/updateProgress.php" style="width:100%;">
        <?php
        echo "<input type='hidden' name='pID' value='$pID'><input type='hidden' name='pName' value='$pName'>";
        ?>
        <label for="progress">Current Progress : </label>
        <input class="read" type="number" id="progress" name="progress" />
        <input
          id="reset"
          type="reset"
          value="Cancel"
          onclick="window.open(
            '../php/showProjects.php',
            '_self'
          );"
        />
        <input id="submit" type="submit" value="Submit" />
      </form>
    </div>
  </body>
</html>

<?php
    require './app/DataSaver.php';
    $dataSaver = new DataSaver();
    $dataSaver->type = "NO";
    $dataSaver->file = "C:\Users\yanni\PhpstormProjects\seclog\seclog\assets\data.json"; #Only configured by the professor
    $dataSaverSer = serialize($dataSaver);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visualiseur de notes</title>
</head>
<body>
<h1 style="text-align: center">Visualiseur de notes !</h1>
  <form method="get" action="app/Student.php">
    <label> Nom de l'étudiant
      <input name="stud"/>
    </label>
      <input style="display: none" name="dt" value="<?php echo htmlspecialchars($dataSaverSer) ?>"/>
    <button type="submit">Envoyer</button>
  </form>
</body>
</html>
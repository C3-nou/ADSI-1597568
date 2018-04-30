<!DOCTYPE>
<html>
  <head>
    <title>Calulator in PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="recuadro">
      <center>
        <br>
        <h1>Calculator</h1>
        <form action="calc.php" method="get" >
          <input type="number" name="first" class="number1">
          <br>
          <select name="operations" class="operator">
            <option value="">Select the operation</option>
            <option value="1">Sum</option>
            <option value="2">Rest</option>
            <option value="3">Multi</option>
            <option value="4">Division</option>
            <option value="5">Módulo Div</option>
            <option value="6">A over B</option>
            <option value="7">Pow</option>
            <option value="8">Logaritmation</option>
            <option value="9">Sqrt</option>
            <option value="10">SqrtInv</option>
          </select>
          <br>
          <input type="number" name="second" class="number2">
          <br>
          <button type="submit" class="result">Operation</button>
        </form>
      </center>  
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
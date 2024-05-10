<?php include ('./includes/config.inc.php'); ?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <style>
    body {
      background-color: #e6f2ff !important;
    }

    form {
      margin-bottom: 20px;
    }

    fieldset {
      border: 2px solid #333;
      padding: 20px;
      width: 300px;
      margin: 0 auto;
    }

    legend {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: calc(100% - 40px);
      padding: 10px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #333;
      color: #fff;
      border: none;
      cursor: pointer;
      }

    input[type="submit"]:hover {
      background-color: #555;/
    }
  </style>
</head>

<body>
  <form action="./belep" method="post">
    <fieldset>
      <legend>Bejelentkezés</legend>
      <br>
      <input type="text" name="felhasznalo" placeholder="felhasználó" required><br><br>
      <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
      <input type="submit" name="belepes" value="Belépés">
      <br>&nbsp;
    </fieldset>
  </form>
  <h3>Regisztrálja magát, ha még nem felhasználó!</h2>
    <form action="./regisztral" method="post">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
        <input type="text" name="utonev" placeholder="utónév" required><br><br>
        <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
    </form>

</body>

</html>
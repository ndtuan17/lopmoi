<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VN GIA SU</title>
</head>

<body onload="redirect()">
  <script>
    function redirect() {
      setTimeout(() => {
        window.open('<?= $_SERVER['REQUEST_URI'] ?>', '_self');
      }, 1000);
    }
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập biên tập viên</title>
</head>

<body>
  <form action="/bientap/login" method="POST" id="form">
    <?= _csrf() ?>
    <input type="email" placeholder="Địa chỉ email" id="email" name="email">
    <input type="password" placeholder="Mật khẩu" id="password" name="password">
    <button type="submit" id="submit">Đăng nhập</button>
  </form>

  <?php
  // token()->newPayload['flashes'] = ['error' => 'Test thoi'];
  echo 'currentPayload: ';
  var_dump(token()->currentPayload());
  echo '<br>';
  echo 'newPayload: ';
  var_dump(token()->newPayload());
  echo '<br>';
  ?>


  <script src="/assets/js/lopmoi.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php $this->write('title') ?></title>
</head>

<body>
  <header>
    <nav>
      <a href="/">Trang chủ</a>
      <a href="/danh-sach-lop"></a>
      <a href="/danh-sach-cac-trung-tam"></a>
      <a href="/tao-cv-gia-su"></a>
      <a href="/dien-dan-gia-su"></a>
      <div class="dropdown">
        <button class="dropbtn">Cộng đồng</button>
        <div class="dropdown-content">
          <a href="facebook.com">Nhóm facebook GIA SƯ HÀ NỘI</a>
          <a href="facebook.com">Trang fanpage Lớp mới</a>
        </div>
      </div>
      <a href="/bai-viet"></a>
      <a href="/gioi-thieu-lopmoi"></a>
      <a href="/dang-nhap"></a>
      <a href="/dang-ky"></a>
    </nav>
  </header>
  
  <?php $this->show('body')?>
</body>

</html>
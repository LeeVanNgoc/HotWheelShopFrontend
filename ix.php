<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple Input Form</title>
</head>
<body>
  <h1>Simple Input Form</h1>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lấy dữ liệu từ form
      $name = htmlspecialchars($_POST['name']); // Sanitize input
      $email = htmlspecialchars($_POST['email']);

      // Kiểm tra dữ liệu
      if (empty($name) || empty($email)) {
          echo "<p style='color:red;'>All fields are required.</p>";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo "<p style='color:red;'>Invalid email format.</p>";
      } else {
          // Hiển thị thông báo thành công
          echo "<p style='color:green;'>Thank you, $name! We have received your email: $email.</p>";
      }
  }
  ?>

  <form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>

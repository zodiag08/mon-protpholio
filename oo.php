<?php
if (isset($_POST['signup'])) {
    // 1. الاتصال بقاعدة البيانات
    $conn = new mysqli("localhost", "root", "", "pizza_family");

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("Echec de connexion: " . $conn->connect_error);
    }

    // 2. الحصول على البيانات من النموذج
    $first_name = $_POST['first_Name'];
    $last_name = $_POST['last_Name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير الباسورد

    // 3. التعامل مع الصورة
    $picture_name = $_FILES['picture']['name'];
    $picture_tmp = $_FILES['picture']['tmp_name'];
    $upload_dir = "uploads/";

    // إنشاء مجلد الصور إذا لم يكن موجود
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // نقل الصورة إلى المجلد
    $picture_path = $upload_dir . basename($picture_name);
    move_uploaded_file($picture_tmp, $picture_path);

    // 4. إدخال البيانات في قاعدة البيانات
    $sql = "INSERT INTO users (first_name, last_name, date_of_birth, email, password, picture) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $first_name, $last_name, $dob, $email, $password, $picture_path);

    if ($stmt->execute()) {
        session_start(); // بدء الجلسة
        $_SESSION['user_name'] = $first_name;
        $_SESSION['email'] = $email;
        $_SESSION['user_image'] = $picture_path; // حفظ الصورة

        header("Location: pizza.php");
        exit();
    } else {
        echo "خطأ: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
</head>
<body>
<div class="j10"> 
    
    <h1>REGISTER</h1>
    <form action="register.php" method="post">
        <div class="input-box">
            <input type="text" placeholder="First Name" required name="first_Name">
            <i id="I" class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="text" placeholder="Last Name" required name="last_Name">
            <i id="I" class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="date" required name="dob" name="date_of_birth">
            <i id="I" class='bx bxs-calendar'></i>
        </div>
        <div class="input-box">
            <input type="email" placeholder="Email" required name="email">
            <i id="I" class='bx bxs-envelope'></i>
        </div>
        <div class="input-box">
            <input type="password" placeholder="Password" minlength="8" required name="password">
            <i id="I" class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="file" required name="picture" accept="picture/*"> </div>
        <button class="btn" type="submit" style="margin-bottom: 30px;" name="signup">  SIGN UP</button>
        <h5>JOIN OUR PIZZA FAMILY 🍕</h5>
    </form>
</div>
</body>
</html>
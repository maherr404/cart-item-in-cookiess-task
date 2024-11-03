<?php
// إعداد مجلد التخزين
$dir = 'upload/';
$errors = [];

// التحقق من إرسال النموذج
if (isset($_POST['submit'])) {
    // التحقق من الصورة والحقول المطلوبة
    if (isset($_FILES['img'])) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_size = $_FILES['img']['size'];
    } else {
        $errors['img'] = 'Please upload an image.';
    }

    // التحقق من الحقول
    foreach (['name', 'price'] as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = 'Please fill in this field.';
        }
    }


    if (empty($img_name)) {
        $errors['img'] = 'Please upload an image.';
    }


    // التحقق من عدم وجود أخطاء
    if (empty($errors)) {
        // تجهيز الكارت
        $cart = isset($_COOKIE["cart"]) ? json_decode($_COOKIE["cart"], true) : [];
        $cart[] = [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'img' => $img_name
        ];

        // تخزين الكارت في الكوكيز
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");

        // رفع الصورة إلى مجلد 'upload/'
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        move_uploaded_file($img_tmp, $dir . $img_name);

        // إعادة توجيه إلى صفحة عرض الكروت
        header("Location: cart.php");
        exit;
    }
}
?>

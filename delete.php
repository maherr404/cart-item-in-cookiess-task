<?php

// if(isset($_POST['delete'])){
//     echo $_POST['del'];
//     $date = json_decode($_COOKIE['cart'],true);
//     $name_col = array_column($date , 'cart');
//     $name_key = array_search($_POST['del'],$name_col);
//     unset($date[$name_key]);
//     setcookie('cart',json_encode(array_values($date)));
//     header("location:cart.php");
//     print_r($date);
    

// }




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['del'])) {
    // الحصول على اسم المنتج الذي سيتم حذفه
    $productToDelete = $_POST['del'];
    
    // الحصول على العناصر من الكوكيز
    if (isset($_COOKIE['cart'])) {
        $cartItems = json_decode($_COOKIE['cart'], true);

        // البحث عن المنتج وحذفه من الكوكيز
        foreach ($cartItems as $index => $item) {
            if ($item['name'] === $productToDelete) {
                unset($cartItems[$index]);
                break;
            }
        }

        // تحديث الكوكيز بعد حذف العنصر
        setcookie('cart', json_encode($cartItems), time() + 3600, '/');
    }
}

// إعادة التوجيه إلى الصفحة الرئيسية لتحديث العرض
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;



?>
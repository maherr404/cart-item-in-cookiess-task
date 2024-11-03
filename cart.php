<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; }
        
        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }
        
        .card { 
            width: 300px; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            text-align: center; 
            margin: 10px;
        }
        
        .card img { width: 100%; height: auto; }
        .card-body { padding: 15px; }
        .card-title { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .card-price { font-size: 20px; font-weight: bold; color: #333; margin-bottom: 15px; }
        
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 10px;
        }

        .add-to-cart, .del { 
            padding: 10px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            color: #fff; 
            text-decoration: none; 
            font-size: 14px; 
        }

        .add-to-cart { background-color: #007bff; }
        .add-to-cart:hover { background-color: #0056b3; }
        
        .del { background-color: #dc3545; }
        .del:hover { background-color: #c82333; }

        .main-title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        .btn{
            display: inline-block; 
            padding: 5px 12px; 
            margin: 5px 0; 
            background-color: blue; 
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            transition: background-color 0.3s; 
        }
    </style>
</head>
<body>
<h1 class="main-title">My Products</h1>
<a href="form.php" ?  class="btn">back</a> <br>
<a href="clear.php" ?  class="btn" >clear</a>

<div class="product-container">

    <?php if (isset($_COOKIE['cart'])): ?>
        <?php 
            $cart_items = json_decode($_COOKIE['cart'], true);
            foreach ($cart_items as $item): 
                $img = htmlspecialchars($item['img']);
                $name = htmlspecialchars($item['name']);
                $price = htmlspecialchars($item['price']);
        ?>     
            <div class="card">
                <img src="upload/<?= $img ?>" alt="<?= $name ?>">
                <div class="card-body">
                    <h3 class="card-title"><?= $name ?></h3>
                    <div class="card-price">$ <?= $price ?></div>
                    <div class="button-group">
                        <button class="add-to-cart" onclick="addToCart()">Add to Cart</button>
                        <form action="delete.php" method="POST" style="display: inline;">
                            <input type="hidden" name="del" value="<?= $name ?>">
                            <button class="del" type="submit" name="delete">Delete</button>
                        </form>
                        
                    </div>
                    
                </div>
                
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No items in the cart.</p>
    <?php endif; ?>
</div>

<script>
    function addToCart() {
        alert("Product has been added to your cart!");
    }
</script>
</body>
</html>


<!-- <a href='delete.php' class='del'>delete</a> -->

<!-- <a href="" class="del">Delete</a> -->
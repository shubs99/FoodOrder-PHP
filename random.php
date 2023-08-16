<!-- <!DOCTYPE html>
<html>
<head>
    <title>Food Order</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        // JavaScript function to handle quantity increment and decrement
        function updateQuantity(item_id, operation) {
            var quantityInput = document.getElementById("quantity_" + item_id);
            var quantity = parseInt(quantityInput.value);

            if (operation === 'plus') {
                quantity += 1;
            } else if (operation === 'minus' && quantity > 0) {
                quantity -= 1;
            }

            quantityInput.value = quantity;
        }
    </script>
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar">
     <div class="logo">
            <img src="images/logo.jpg" alt="Logo">
        </div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="#">FoodCart</a></li>
        </ul>
    </nav>

    <div class="cart">
   
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orders";
        // Include the database connection file
        require_once 'db_connect.php';

        $conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

        // Query to fetch items from the "items" table
        $query = "SELECT * FROM items";
        $result = mysqli_query($connection, $query);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Check if there are any items in the database
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['item_id'];
                $item_name = $row['item_name'];
                $price = $row['price'];
                $image_url = "images/" . $row["image"];

                // Display the item information in a cart format
                echo '<div class="item">';
                echo '<div class="item-image">';
                echo '<img class="item-image" src="' . $image_url . '" alt="' . $item_name . '">';
                echo '</div>';
                echo '<div class="item-details">';
                echo '<h3>' . $item_name . '</h3>';
                echo '<p>Price: $' . $price . '</p>';
                echo '<div class="quantity-control">';
                echo '<button onclick="updateQuantity(' . $item_id . ', \'minus\')">-</button>';
                echo '<input type="number" id="quantity_' . $item_id . '" value="0" min="0">';
                echo '<button onclick="updateQuantity(' . $item_id . ', \'plus\')">+</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No items available in the menu.</p>';
        }

        // Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize the submitted data (assuming you have inputs like item_id and quantity in the form)
    $item_id = $_POST["item_id"];
    $quantity = $_POST["quantity"];

    // You should perform further data validation, sanitization, and insert data into the "ordered_items" table
    // For example:
    $sql_insert = "INSERT INTO ordered_items (item_name, quantity, price, subtotal) SELECT item_name, $quantity, price, price * $quantity FROM items WHERE item_id = '$item_id'";
    if (mysqli_query($conn, $sql_insert)) {
        // Redirect the user to the submit_order.php page after successful submission
        header("Location: submit_order.php");
        exit;
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
    }
}

        // Close the database connection
        mysqli_close($connection);
        ?>
    </div>

   <!-- Display the list of items available for order in a form -->
    <form method="post">
        <?php foreach ($items as $item) { ?>
            <div>
                <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                <label><?php echo $item['item_name']; ?> - Price: Rs <?php echo $item['price']; ?></label>
                <input type="number" name="quantity" value="1" min="1" max="10"> <!-- Assuming you want users to select quantity -->
            </div>
        <?php } ?>
        <button type="submit">Submit Order</button>
    </form>
    <script src="script.js"></script>
</body>
</html> -->

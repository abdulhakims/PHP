<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Activity - Product Purchase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="mb-4 text-center">🛒 Product Purchase</h2>

        <!-- FORM -->
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" required min="1" value="<?php echo isset($_POST['quantity']) ? $_POST['quantity'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Price per Item</label>
                <input type="number" class="form-control" name="price" required min="1" value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Optional Add-ons</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="addons[]" value="Gift Wrap" <?php if(isset($_POST['addons']) && in_array("Gift Wrap", $_POST['addons'])) echo "checked"; ?>>
                    <label class="form-check-label">Gift Wrap (+₱50)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="addons[]" value="Express Shipping" <?php if(isset($_POST['addons']) && in_array("Express Shipping", $_POST['addons'])) echo "checked"; ?>>
                    <label class="form-check-label">Express Shipping (+₱100)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="addons[]" value="Warranty" <?php if(isset($_POST['addons']) && in_array("Warranty", $_POST['addons'])) echo "checked"; ?>>
                    <label class="form-check-label">Warranty (+₱200)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Compute Total</button>
        </form>

        <!-- PURCHASE SUMMARY -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $quantity = (int) $_POST['quantity'];
            $price = (float) $_POST['price'];
            $addons = isset($_POST['addons']) ? $_POST['addons'] : [];

            // Compute subtotal
            $subtotal = $quantity * $price;

            // Compute add-ons total (fixed prices)
            $addonTotal = 0;
            if (in_array("Gift Wrap", $addons)) $addonTotal += 50;
            if (in_array("Express Shipping", $addons)) $addonTotal += 100;
            if (in_array("Warranty", $addons)) $addonTotal += 200;

            // Final total
            $finalTotal = $subtotal + $addonTotal;
        ?>
        <div class="card mt-4 p-3 bg-light">
            <h4>💡 Purchase Summary</h4>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
            <p><strong>Quantity:</strong> <?php echo $quantity; ?></p>
            <p><strong>Price per Item:</strong> ₱<?php echo number_format($price, 2); ?></p>
            <p><strong>Subtotal:</strong> ₱<?php echo number_format($subtotal, 2); ?></p>
            <p><strong>Add-ons:</strong> ₱<?php echo number_format($addonTotal, 2); ?></p>
            <h5 class="text-success"><strong>Final Total: ₱<?php echo number_format($finalTotal, 2); ?></strong></h5>
        </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
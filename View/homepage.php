<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form method="post" action="">
        <label for="product">Choose a product:</label>
            <select name="product" id="product">
                <option value="">Select Product</option>
                <?php
                /** @var Product[] $products trick by Koen */
                $products = $products->getAllProducts();
                foreach ($products as $product) {
                    $id = $product->getId();
                    $name = ucfirst($product->getName());
                    $price = number_format($product->getPrice() / 100, 2) ;
                    echo "<option value='{$id}'>{$name}={$price} &euro;</option>";
                }
                ?>
            </select>

        <label for="customer">Choose a customer:</label>
            <select name="customer" id="customer">
                <option value="">Select Customer</option>
                <?php
                /** @var Customer[] $customers trick by Koen */
                $customers = $customers->getCustomers();
                foreach ($customers as $customer) {
                    $id = $customer->getId();
                    $firstname = $customer->getFirstname();
                    $lastname =$customer->getLastname() ;
                    echo "<option value='{$id}'>{$firstname}{$lastname}</option>";
                }
                ?>
            </select>

        <button type="submit" name="submit">submit</button>
    </form>

</section>

<?php require 'includes/footer.php'?>
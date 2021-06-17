<?php require 'includes/header.php' ?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form method="post">
        <label for="product">Choose a product:</label>

        <select name="product" id="product">
            <?php foreach ($products as $product) {
                echo '<option value="' . $product->getId() . '">' . $product->getName() . ' - ' . $product->getPrice()/100 . ' cents' . '</option>';
            }
            ?>
        </select>

        <label for="customer">Choose a customer:</label>
        <select name="customer" id="customer">
            <?php foreach ($customers as $customer) {
                echo '<option value="' . $customer->getId() . '">' . $customer->fullName() . '</option>';
            }
            ?>
        </select>

        <input id="submit" type="submit" name="submit" value="Calculate the price" />

    </form>

</section>

            <?php 
        echo $selectFinalPrice;
        echo '<br>';
        echo $selectIdCostumer;
        echo '<br>';
        echo $selectCustomerFixed;
        echo '<br>';
        echo $selectBestVarDisc;

        ?>
        
<section>

</section>

<?php require 'includes/footer.php' ?>
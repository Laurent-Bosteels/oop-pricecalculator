<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form method="post" action="">
        <label for="product">Choose a product:</label>
            <select name="product" id="product">
            <?php foreach ($products as $product) {
                echo '<option value="'.$product->getId().'">'.$product->getName().' '.$product->getPrice().' cents'.'</option>';}
            ?>
            </select>

        <label for="customer">Choose a customer:</label>
            <select name="customer" id="customer">
            <?php foreach ($customers as $customer) {
                echo '<option value="'.$customer->getId().'">'.$customer->getFirstName().' '.$customer->getLastName().'</option>';}
            ?>
            </select>

            <label for="discount">Choose a discount group:</label>
            <select name="discount" id="discount">
            <?php foreach ($allCustomerGroups as $group) {
                echo '<option value="'.$group->getId().'">'.$group->getName().' '.$group->getFixedDiscount().' '.$group->getVariableDiscount().'</option>';}
            ?>
            </select>

        <button type="submit" name="submit">submit</button>
    </form>

</section>

<?php require 'includes/footer.php'?>
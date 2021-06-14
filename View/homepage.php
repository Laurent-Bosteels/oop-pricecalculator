<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <form method="post" action="">
        <label for="product">Choose a product:</label>
            <select name="product" id="product">
                <option value="">Select Product</option>
            </select>

        <label for="customer">Choose a customer:</label>
            <select name="customer" id="customer">
                <option value="">Select Customer</option>
            </select>

        <button type="submit" name="submit">submit</button>
    </form>

</section>

<?php require 'includes/footer.php'?>
<?php require 'includes/header.php' ?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->

<section class="section">
    <div class="container">
        <div class="columns is-multiline">
            <div class="column">


                <!-- product field -->

                <div class="field">
                    <form method="post">
                        <label for="product" class="label">Choose a product:</label>
                        <div class="control">
                            <div class="select is-dark">
                                <select class="select" name="product" id="product">
                                    <?php foreach ($products as $product) {
                                        echo '<option value="' . $product->getId() . '">' . $product->getName() . ' - ' . $product->getPrice() / 100 . ' €' . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                </div>

                <!-- customer field -->

                <div class="field">
                    <label for="customer" class="label">Choose a customer:</label>
                    <div class="control">
                        <div class="select is-dark">
                            <select class="select" name="customer" id="customer">
                                <?php foreach ($customers as $customer) {
                                    echo '<option value="' . $customer->getId() . '">' . $customer->getFullName() . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- calculate button  -->

                <input class="button is-primary" id="submit" type="submit" name="submit" value="Calculate" />

                </form>
            </div>
        </div>
    </div>
</section>
<!-- cards  -->

<section class="section">
    <div class="container">
        <h3 class="title has-text-centered is-size-4">Calculation details for <?php echo $customerName ?></h3>
        <div class="columns mt-8 is-8 is-multiline is-centered">
            <div class="column is-6-tablet is-3-desktop">
                <div class="card">
                    <div class="card-image has-text-centered pt-3 px-6">
                        <img src="https://image.flaticon.com/icons/png/512/1524/1524711.png" alt="product">
                    </div>
                    <div class="card-content has-text-centered">
                        <p><?php echo $productName ?> </p>
                        <p class="title is-size-5">Product Name</p>
                    </div>
                </div>
            </div>

            <div class="column is-6-tablet is-3-desktop">
                <div class="card">
                    <div class="card-image has-text-centered pt-3 px-6">
                        <img src="https://image.flaticon.com/icons/png/512/4866/4866004.png" alt="product">
                    </div>
                    <div class="card-content has-text-centered">
                        <p><?php echo $selectCustomerFixed; ?> €</p>
                        <p class="title is-size-5">Fixed Discount</p>
                    </div>
                </div>
            </div>

            <div class="column is-6-tablet is-3-desktop">
                <div class="card">
                    <div class="card-image has-text-centered pt-3 px-6">
                        <img src="https://image.flaticon.com/icons/png/512/3126/3126544.png" alt="product">
                    </div>
                    <div class="card-content has-text-centered">
                        <p><?php echo $selectBestVarDisc; ?>%</p>
                        <p class="title is-size-5">Best Variable Discount</p>
                    </div>
                </div>
            </div>

            <div class="column is-6-tablet is-3-desktop">
                <div class="card">
                    <div class="card-image has-text-centered pt-3 px-6">
                        <img src="https://image.flaticon.com/icons/png/512/1/1437.png" alt="product">
                    </div>
                    <div class="card-content has-text-centered">
                        <p><?php echo $selectFinalPrice; ?> €</p>
                        <p class="title is-size-5">Final Price</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

    <?php require 'includes/footer.php' ?>
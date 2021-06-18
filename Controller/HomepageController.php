<?php
declare(strict_types=1);

class HomepageController

{

    // RENDER FUNCTION / both $_GET and $_POST variables available (if needed)
    public function render(array $GET, array $POST)

    {

        // GETTING ALL THE PRODUCTS 
        $loader = new ProductLoader();
        $products = $loader->getAllProducts();

         // GETTING ALL THE CUSTOMERS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomer = new CustomerLoader();
        $customers = $loaderCustomer->getAllCustomers();

        // SETTING DEFAULT VALUES IN ORDER TO AVOID ERRORS WHEN LOADING THE PAGE
        $selectFinalPrice = "0";
        $selectIdCostumer = "0";
        $selectCustomerFixed= "0";
        $selectBestVarDisc = "0";
        $customerName = "...";
        $productName = "Select a product";

        
        if (isset($_POST['customer'])&&isset($_POST['product'])) {

            $customer = $loaderCustomer->getCustomerById((int)$_POST["customer"]);
            $customerName = $customer->getFullName();

            $product = $loader->getProductById((int)$_POST["product"]);
            $productName = $product->getName();
            
            $calculate = new Calculator((int)$_POST["customer"], (int)$_POST["product"]);
            $calculate->calculatorFunc();
            $selectFinalPrice = $calculate->getFinalPrice();
            $selectIdCostumer = $calculate->getIdCustomer();
            $selectCustomerFixed= $calculate->getCustomerFixed();
            $selectBestVarDisc = $calculate->getBestVarDisc();
            
        }

        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}


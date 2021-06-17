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

         // GETTING ALL THE CUSTOMER GROUPS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomerGroup = new CustomerGroupLoader();
        $allCustomerGroups = $loaderCustomerGroup->getAllCustomerGroups();

        if (isset($_POST['submit'])) {

            $calculate = new Calculator((int)$_POST["customer"], (int)$_POST["product"]);
            $calculate->calculatorFunc();
            
        }

        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}


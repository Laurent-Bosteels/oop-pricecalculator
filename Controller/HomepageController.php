<?php
declare(strict_types=1);

class HomepageController
{
    // RENDER FUNCTION / both $_GET and $_POST variables available (if needed)
    public function render(array $GET, array $POST)

    {
        //this is just example code, you can remove the line below

        // GETTING ALL THE PRODUCTS 
        $loader = new ProductLoader();
        $products = $loader->getAllProducts();

         // GETTING ALL THE CUSTOMERS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomer = new CustomerLoader();
        $customers = $loaderCustomer->getAllCustomers();

         // GETTING ALL THE CUSTOMER GROUPS (NEEDS A NEW LOADER VARIABLE)
        $loaderCustomerGroup = new CustomerGroupLoader();
        $allCustomerGroups = $loaderCustomerGroup->getAllCustomerGroups();

        if (isset($_POST['submit'])){
            $productsSelected = $loader->getProductById((int)$_POST['product']);
            var_dump($productsSelected);
        }

        if (isset($_POST['submit'])){
            $customerSelected = $loaderCustomer->getCustomerById((int)$_POST['customer']);
            var_dump($customerSelected);
        }


        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}


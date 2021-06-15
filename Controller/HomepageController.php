<?php
declare(strict_types=1);

class HomepageController
{
    // RENDER FUNCTION / both $_GET and $_POST variables available (if needed)
    public function render(array $GET, array $POST)

    {
        //this is just example code, you can remove the line below
        $loader = new ProductLoader();
        $products = $loader->getAllProducts();

        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}


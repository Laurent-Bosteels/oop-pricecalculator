<?php
declare(strict_types=1);

class HomepageController
{
    // RENDER FUNCTION / both $_GET and $_POST variables available (if needed)
    public function render(array $GET, array $POST)

    {
        //this is just example code, you can remove the line below
        $con = Database::connect();
        $handle = $con->prepare('SELECT * FROM customer WHERE id=:id');
        $handle->bindValue(':id', 1);
        $handle->execute();
        $selectedUser = $handle->fetchAll();
        $firstname = $selectedUser[0]["firstname"];
        $lastname = $selectedUser[0]["lastname"];
        $user = new User($firstname . " " . $lastname);
        
        var_dump($user);
        whatIsHappening();

        // NO ECHOING IN THE CONTROLLER! ONLY DECLARE THE VARIABLES
        // VIEW WILL DISPLAY THE DATA

        //load the view
        require 'View/homepage.php';
    }
}


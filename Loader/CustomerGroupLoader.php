<?php
declare(strict_types=1);

class CustomerGroupLoader extends Database
{
    private array $customerGroups;

    public function __construct()
    {
        $con = Database::connect();
        $handle = $con->prepare('SELECT * FROM customer_group');
        $handle->execute();
        $selectedCustomerGroups = $handle->fetchAll();

        foreach ($selectedCustomerGroups as $group) {
            $this->customerGroups[] = new CustomerGroup((int)$group['id'], $group['name'], (int)$group['parent_id'], (int)$group['fixed_discount'], (int)$group['variable_discount']);
        }
    }

    public function getAllCustomerGroups(): array
    {
        return $this->customerGroups;
    }
}

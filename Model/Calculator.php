<?php

declare(strict_types=1);

class Calculator
{

    // DECLARING THE PROPERTIES

    // PRODUCT
    private int $idProduct;
    private float $price;

    // CUSTOMER
    private int $idCustomer;
    private int $customerFixed;
    private int $customerVariable;

    // GROUP
    private int $sumFixedGroupDisc;
    private array $groupVariable;
    private array $groupFixed;
    private int $maxVarGroupDisc;
    private string $bestGroupDisc;

    public function __construct(int $idCustomer, int $idProduct)
    {
        $this->idCustomer = $idCustomer;
        $this->idProduct = $idProduct;
    }

    // METHODS

    public function getDisc()
    {
        if (isset($this->idCustomer)) {

            // LOADING CUSTOMER DATA
            $loaderCustomer = new CustomerLoader();
            $allCustomers = $loaderCustomer->getAllCustomers();

            // WE NEED CUSTOMER ID IN ORDER TO AVOID DOUBLE NAMES (COULD GIVE US WRONG RESULTS)
            $customer = $loaderCustomer->getCustomerById($this->idCustomer);

            // LOADING GROUP DATA
            $loaderCustomerGroup = new CustomerGroupLoader();
            $allCustomerGroups = $loaderCustomerGroup->getAllCustomerGroups();

            // LOADING THE GROUP ID AND ITS DISCOUNTS
            $customerGroup = $customer->getGroupId();
            $this->customerFixed = $customer->getFixedDiscount();
            $this->customerVariable = $customer->getVariableDiscount();

            // LOADING THE CUSTOMER GROUP ID AND ITS DISCOUNTS
            $group = $loaderCustomerGroup->getCustomerGroupById((int)$customerGroup);
            $this->groupFixed = array($group->getFixedDiscount());
            $this->groupVariable = array($group->getVariableDiscount());

            // PARENT ID!!! 
            $parentID = $group->getParentId();

            while ($parentID > 0) {
                $group = $loaderCustomerGroup->getCustomerGroupById((int)$parentID);
                $fixed = $group->getFixedDiscount();
                if (isset($fixed)) {
                    array_push($this->groupFixed, $group->getFixedDiscount());
                }
                $variable = $group->getVariableDiscount();
                if (isset($variable)) {
                    array_push($this->groupVariable, $group->getVariableDiscount());
                }
                $parentID = $group->getParentId();
            }
        }
    }

    public function getPrice()
    {
        $loader = new ProductLoader();
        $allProducts = $loader->getAllProducts();

        if (isset($this->idProduct)) {
            $product = $loader->getProductById((int)$_POST["product"]);
            $this->price = $product->getPrice();
        }
    }

    public function calculatorFunc()
    {
        $this->getDisc();
        $this->getPrice();

        $this->maxVarGroupDisc = max($this->groupVariable);
        $this->sumFixedGroupDisc = array_sum($this->groupFixed);

        if ($this->maxVarGroupDisc > $this->customerVariable) {
            $this->bestVarDisc = $this->maxVarGroupDisc;
        } else {
            $this->bestVarDisc = $this->customerVariable;
        }

        $this->finalPrice = (($this->price - ($this->customerFixed * 100) - ($this->sumFixedGroupDisc * 100)) *  (1 - $this->bestVarDisc / 100)) / 100;
        $this->finalPrice = round($this->finalPrice, 2);

        // THE PRICE CAN NEVER BE NEGATIVE
        // IF FINALPRICE IS SMALLER THAN 0 WE SET IT TO ZERO.

        if($this->finalPrice < 0) {
            $this->finalPrice = 0;
        }
        
    }

    // GETTERS

    public function getIdCustomer(): int
    {
        return $this->idCustomer;
    }

    public function getIdProduct(): int
    {
        return $this->idProduct;
    }

    public function getCustomerFixed(): int
    {
        return $this->customerFixed;
    }

    public function getCustomerVariable(): int
    {
        return $this->customerVariable;
    }

    public function getGroupFixed(): array
    {
        return $this->groupFixed;
    }

    public function getSumFixedGroupDisc(): int
    {
        return $this->sumFixedGroupDisc;
    }

    public function getGroupVariable(): array
    {
        return $this->groupVariable;
    }

    public function getmaxVarGroupDisc(): int
    {
        return $this->maxVarGroupDisc;
    }

    public function getPrice2(): float
    {
        return $this->price;
    }

    public function getBestGroupDisc(): string
    {
        return $this->bestGroupDisc;
    }

    public function getBestVarDisc(): int
    {
        return $this->bestVarDisc;
    }

    public function getFinalPrice(): float
    {
        return $this->finalPrice;
    }
}

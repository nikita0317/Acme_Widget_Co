<?php

class Basket {
  private $productsLists;
  private $Bucket;

  public function __construct($productCatalogue) {
    $this->productsLists = $productCatalogue;
    $this->Bucket = array();
  }

  public function add($productCode) {
    if (array_key_exists($productCode, $this->productsLists)) {
      $this->Bucket[] = $productCode;
    } else {
      echo "There is not $productCode on Product lists";
    }
  }

  public function total() {
    $totalCost = 0;
    foreach ($this->Bucket as $item)    $totalCost += $this->productsLists[$item];

    $totalCost -= $this->OfferDiscount($this->Bucket);
    $totalCost += $this->DeliveryCost($totalCost);

    return $totalCost;
  }

  private function DeliveryCost($totalCost) {
    if ($totalCost < 50) return 4.95;
    elseif ($totalCost < 90) return 2.95;
    else return 0;
  }

  private function OfferDiscount($items) {
    $redCnt = 0;
    foreach ($items as $item) if ($item === 'R01')  $redCnt++;
    return $this->productsLists['R01'] * floor($redCnt / 2) * 0.5;
  }
}


$products = array(
  'R01' => 32.95,
  'G01' => 24.95,
  'B01' => 7.95
);

$basket = new Basket($products);

$basket->add('B01');
$basket->add('B01');
$basket->add('R01');
$basket->add('R01');
$basket->add('R01');

echo "Total cost: $" . number_format($basket->total(), 2);

?>
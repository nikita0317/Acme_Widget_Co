

Acme Widget Co is a new sales system.

To incentivise customers to spend more, delivery costs are reduced based on the amount  spent. Orders under $50 cost $4.95. For orders under $90, delivery costs $2.95. Orders of  $90 or more have free delivery.  
They are also experimenting with special offers. The initial offer will be “buy one red widget,  get the second half price”.  

You can create a Object by using

$basket = new Basket($products);

The parameter $products is products lists that are on sales system.
Here is a sample.

$products = array(
  'R01' => 32.95,
  'G01' => 24.95,
  'B01' => 7.95
);

The customer can add product by using add() function.
The parameter have to be an product name.

$basket->add('B01');

Then total() function respond as total cost for these products that customer added.

$basket->total()

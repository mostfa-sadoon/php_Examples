<!-- this example with out dependency injection -->
<?php
class product {
    public $product_name;
    public $product_price;
    public $product_quantity;
    public $total_price;
    public function __construct($name,$price,$quantity)
    {
         $this->product_name=$name;
         $this->product_price=$price;
         $this->product_quantity=$quantity;
    }
    public function sumprice($tax)
    {
         $this->total_price=$this->product_price*$this->product_quantity*$tax;
    }
}
class order
{
    public  $ordernumber;
    public  $product;
    public  $customPrice;
    public function __construct($ordernumber,$name,$price,$quantity){
          $this->ordernumber=$ordernumber;
          $this->product=new product($name,$price,$quantity);
    }
  
    public function custom_price($tax,$quality_tax)
    {
         $this->customPrice=$this->product->product_price*$this->product->product_quantity*$tax*$quality_tax;
    }
}
$product=new product('apple',20,150);
$product->sumprice(0.8);
var_dump($product);
echo "</br>";
echo "product quantity =". $product->product_quantity;
echo "</br>";
echo "total price =". $product->total_price;
echo "</br>";
echo "product_price =". $product->product_price;
$order=new order(2,$product->product_name,$product->product_price,$product->product_quantity);
echo "</br>";
$order->product->sumprice(0.2);
echo "order product price =".  $order->product->total_price;
echo "</br>";
var_dump($order->product);
echo "</br>";
$order->custom_price(0.2,1.01); 
echo "</br>";
echo "order custom price =". $order->customPrice;
?>
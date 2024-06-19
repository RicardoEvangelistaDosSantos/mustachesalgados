<?php

require 'Product.php';
require 'Cart.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

//var_dump($productsInCart);

if (isset($_GET['remove'])) {
  $id = strip_tags($_GET['remove']);
  $cart->remove($id);
  header('Location: mycart.php');
}

if (isset($_GET['update'])) {
  $id = strip_tags($_GET['update']);
  $qty = strip_tags($_GET['qty']);
  $cart->updateQty($id, $qty);
  header('Location: mycart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mycart.css">
  <title>Carrinho</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="mustache">
                <a href="#inicio">
                  <img src="img/logo.png" alt="Logo da Loja">
                </a>
            </div>
            <a href="index.html">Início</a>
            <a href="index.php">Produtos</a>
            <a href="index.html #section-sobre">Sobre</a>
            <div style="float:right">
              <a class="cart" href="mycart.php">
                <img src="img/cart.png" alt="Ícone do Carrinho">
              </a>
            </div>
        </nav>
    </header>
  <main>
    <div class="cart-geral">
        <ul>
          <?php if (count($productsInCart) <= 0) : ?>
            <div class="no-product">
              <h1>Nenhum produto adicionado no carrinho</h1>
            </div>
          <?php endif; ?>

          <?php foreach ($productsInCart as $product) : ?>
            <li>
              <?php echo $product->getName(); ?>
              <form action="">
                <input type="hidden" name="update" value="<?php echo $product->getId(); ?>">
                <input type="text" name="qty" value="<?php echo $product->getQuantity() ?>">
              </form>
              Preço: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
              Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
              <a href="?remove=<?php echo $product->getId(); ?>">Remover</a>
            </li>
          </ul>
          <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
          <?php endforeach; ?>
    </div>

  </main>
  <footer>
    <div class="footer-container">
        <div class="footer-section1">
            <h2>Contato</h2>
            <p>Email: contato@mustachesalgados.com</p>
            <p>  Telefone: (99) 9999-9999</p>
            <p>Endereço: QSE 9, lt. 9, lj. 9, Brasília, DF, 12345-678  </p>
        </div>
        <div class="footer-section2">
            <h2>Redes Sociais</h2>
            <div class="imgicons">
                <img src="imgicons/instagram.png" alt="icon">
                <img src="imgicons/facebook.png" alt="icon">
                <img src="imgicons/whatsapp.png" alt="icon">
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        © 2024 | Criado por Ricardo Evangelista
    </div>
  </footer>

</body>

</html>
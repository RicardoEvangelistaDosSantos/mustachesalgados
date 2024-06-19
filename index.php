<?php

require 'Cart.php';
require 'Product.php';

session_start();

// session_destroy();
// die();

$products = [
  1 => ['id' => 1, 'name' => 'Coxinha de Frango', 'price' => 70, 'quantity' => 1],
  2 => ['id' => 2, 'name' => 'Bolinha de Milho', 'price' => 70, 'quantity' => 1],
  3 => ['id' => 3, 'name' => 'Enroladinho de Salsicha', 'price' => 60, 'quantity' => 1],
  4 => ['id' => 4, 'name' => 'Bolinha de Presunto', 'price' => 65, 'quantity' => 1],
  5 => ['id' => 5, 'name' => 'Quibe', 'price' => 75, 'quantity' => 1],
  6 => ['id' => 6, 'name' => 'Bolinha de Queijo', 'price' => 65, 'quantity' => 1],
];


if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $productInfo = $products[$id];
  $product = new Product;
  $product->setId($productInfo['id']);
  $product->setName($productInfo['name']);
  $product->setPrice($productInfo['price']);
  $product->setQuantity($productInfo['quantity']);

  $cart = new Cart;
  $cart->add($product);
}

//var_dump($_SESSION['cart'] ?? []);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="produto.css">
  <title>Produtos</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="mustache">
                <a href="index.html">
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
        <div class="cards">
            <div class="card">
                <img src="img/coxinha1.jpg">
                <div class="texto">
                    <h1>Coxinha de Frango</h1>
                    <h2>R$ 70,00 o cento</h2>
                <a href="?id=1">
                    <button>Adicionar</button>
                </a>
                </div>        
            </div>
            <div class="card">
                <img src="img/milho1.jpg">
                <div class="texto">
                    <h1>Bolinha Milho</h1>
                    <h2>R$ 70,00</h2>
                    <a href="?id=2">
                        <button>Adicionar</button>
                    </a>
                </div>        
            </div>
            <div class="card">
                <img src="img/salsicha1.jpg">
                <div class="texto">
                    <h1>Enroladinho de Salsicha</h1>
                    <h2>R$ 60,00</h2>
                    <a href="?id=3">
                        <button>Adicionar</button>
                    </a>
                </div>        
            </div>
            <div class="card">
                <img src="img/presunto1.jpg">
                <div class="texto">
                    <h1>Bolinha de presunto</h1>
                    <h2>R$ 65,00</h2>
                    <a href="?id=4">
                        <button>Adicionar</button>
                    </a>
                </div>        
            </div>
            <div class="card">
                <img src="img/quibe1.jpg">
                <div class="texto">
                    <h1>Quibe</h1>
                    <h2>R$ 75,00</h2>
                    <a href="?id=5">
                        <button>Adicionar</button>
                    </a>
                </div>        
            </div>
            <div class="card">
                <img src="img/queijo1.jpg">
                <div class="texto">
                    <h1>Bolinha de Queijo</h1>
                    <h2>R$ 65,00</h2>
                    <a href="?id=6">
                        <button>Adicionar</button>
                    </a>
                </div>        
            </div>
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
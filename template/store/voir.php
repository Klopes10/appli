<?php

$product = $response['data'];
?>
<p>
    <a href="?ctrl=store">&larr; Retour à la liste des produits</a>
</p>
<article>
    <h1><?= $product->getName() ?></h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, sint aspernatur eius eum at dolorum veritatis numquam doloribus tenetur accusantium consequuntur aperiam explicabo dicta esse harum quia porro eaque. Adipisci!</p>
    <p>
        <?= $product->getPrice(true)?>
    </p>
    <p>
        <a href=""> Ajouter au panier </a>
    </p>

</article>
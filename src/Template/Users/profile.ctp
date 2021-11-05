<h2>Hello <?= h($result->user->name) ?></h2>
Email: <?= h($result->user->email) ?><br>
Cart: <a href="./cart" class="text-decoration-none"><?= h($result->cart->items) ?> items</a><br>
Addresses:<br>
<?php foreach($result->addresses as $address): ?>
<?= h($address->address) ?><br>
<?php endforeach; ?>
<?= debug($product) ?>
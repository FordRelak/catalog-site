<? if (isset($Products['Category'])): ?>
    <div class="center">
        <h3>Категория</h3>
        <div>
            <p>Название категории: <span><? echo $Products['Category']['categoryName'] ?></span></p>
            <p>Краткое описание категории: <span><? echo $Products['Category']['categoryDescSh'] ?></span></p>
            <p>Полное описание категории: <span><? echo $Products['Category']['categoryDescFl'] ?></span></p>
        </div>
    </div>
<? endif; ?>

<div class="productList">

	<? foreach ($Products['Data'] as $product) : ?>
        <div class="product">
            <p>Название товара: <span> <? echo $product['productName'] ?> </span></p>
            <p>Описание товара: <span> <? echo $product['productDescSh'] ?> </span></p>
            <p>В наличие: <span
                        class="<? echo $product['isStock'] == 1 ? 'greenText' : 'redText' ?>"> <? echo $product['isStock'] == 1 ? 'Yes' : 'NO' ?> </span>
            </p>
            <p>Активность товара: <span> <? echo $product['activityCount'] ?> </span></p>
            <p>Возможность заказать: <span> <? echo $product['isOrdering'] == 1 ? 'Yes' : 'No' ?> </span></p>
            <a href="/product/<? echo $product['productId'] ?>">
                <button <? echo $product['isOrdering'] == 1 ? '' : 'disabled=\'disabled\'' ?>">Посмотреть</button>
            </a>
        </div>
	<? endforeach; ?>
</div>


<?php if ($Products['Page'] > 1) : ?>
    <ul class="pagination">
		<? for ($i = 0; $i < $Products['Page']; $i++): ?>

            <li>
                <a class="<? echo $this->activeProductPage == $i ? "active" : '' ?>"
                   href="<? echo $this->paginationUrl ?>/goods/page/<? echo $i ?>"><? echo $i ?></a>
            </li>

		<? endfor; ?>
    </ul>
<?php endif; ?>


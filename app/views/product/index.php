<h2>Товар</h2>
<div class="center">
    <div>
        <p>Название товара <span><? echo $Product['productName'] ?></span></p>
        <p>Краткое описание <span><? echo $Product['productDescSh'] ?></span></p>
        <p>Полное описание <span><? echo $Product['productDescFl'] ?></span></p>
        <p>Активность <span><? echo $Product['activityCount'] ?></span></p>
        <p>Наличие <span><? echo $Product['isStock'] ?></span></p>
        <p>Заказ <span><? echo $Product['isOrdering'] ?></span></p>
    </div>
</div>

<h2>Категории</h2>
<div class="center">
    <div>
        <? foreach ($Categories as $category): ?>
            <div class="category">
                <a href="/category/<? echo $category['categoryName'] ?>/goods/page/0"><?echo $category['categoryName']?></a>
            </div>
        <? endforeach;?>
    </div>
</div>
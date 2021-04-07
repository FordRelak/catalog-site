<h1>Добавить товар</h1>
<form action="/admin/product" method="post">
    <label>
        <p>Название продукта</p>
        <input type="text" name="productName" value="">
    </label>

    <label>
        <p>Краткое описание</p>
        <input type="text" name="descSh" value="">
    </label>

    <p>Полное описание</p>
    <label>
        <textarea name="descFull"></textarea>
    </label>

    <label style="display: block">
        Выберите категорию (можно выбрать несколько)
        <select name="categories[]" multiple style="display: block">
			<? if (isset($Categories)) {
				foreach ($Categories as $category): ?>

                    <option value="<? echo $category['categoryId'] ?>"><? echo $category['categoryName'] ?></option>

				<? endforeach;
			} ?>
        </select>
    </label>

    <input style="display: block" type="submit" value="Добавить">
</form>

<? if (isset($Products)): ?>
    <h2>Товары</h2>
    <div class="productList">
        <div>
			<? foreach ($Products['Data'] as $product): ?>
                <div class="product">
                    <a href="/admin/product/<? echo $product['productId'] ?>">
                        <span><? echo $product['productName'] ?></span>
                    </a>

                    <form action="/admin/product/delete" method="post">
                        <input type="text" name="id" hidden value="<? echo $product['productId'] ?>">
                        <input type="submit" class="red" value="Удалить">
                    </form>
                </div>
			<? endforeach; ?>
        </div>
    </div>
<? endif; ?>

<h1>Добавление категории</h1>
<div>
    <form action="/admin/category" method="post">

        <label>
            <p>Название категории</p>
            <input type="text" name="categoryName" value="">
        </label>

        <label>
            <p>Краткое описание</p>
            <input type="text" name="descSh" value="">
        </label>

        <p>Полное описание</p>
        <label>
            <textarea name="descFull"></textarea>
        </label>
        <input style="display: block" type="submit" value="Добавить">
    </form>
</div>

<? if (isset($Categories)): ?>
    <h1>Категории</h1>
    <div class="categoryList">
        <div>
			<? foreach ($Categories['Data'] as $category): ?>
                <div class="category">
                    <a href="/admin/category/<? echo $category['categoryId']?>">
                        <span><? echo $category['categoryName'] ?></span>
                    </a>
					<? if ($category['isActivity'] == 1): ?>
                        <form action="/admin/category/off" method="post">
                            <input type="text" name="id" hidden value="<? echo $category['categoryId'] ?>">
                            <input type="submit" class="yellow" value="Отключить">
                        </form>
					<? else: ?>
                        <form action="/admin/category/on" method="post">
                            <input type="text" name="id" hidden value="<? echo $category['categoryId'] ?>">
                            <input type="submit" class="yellow" value="Включить">
                        </form>
					<? endif; ?>
                    <form action="/admin/category/delete" method="post">
                        <input type="text" name="id" hidden value="<? echo $category['categoryId'] ?>">
                        <input type="submit" class="red" value="Удалить">
                    </form>
                </div>
			<? endforeach; ?>
        </div>
    </div>
<? endif; ?>





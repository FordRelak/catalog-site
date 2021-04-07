<? if (isset($Product)): ?>
    <h1>Обновление категории</h1>
    <div>
        <form action="" method="post" name="postInfo">

            <input type="text" hidden value="<?echo $Product['productId']?>">

            <label>
                <input type="text" hidden name="productId" value="<? echo $Product['productId'] ?>">
            </label>

            <label>
                <p>Название категории</p>
                <input type="text" name="productName" value="<? echo $Product['productName'] ?>">
            </label>

            <label>
                <p>Краткое описание</p>
                <input type="text" name="descSh" value="<? echo $Product['productDescSh'] ?>">
            </label>

            <p>Полное описание</p>
            <label>
                <textarea name="descFull"><? echo $Product['productDescFl'] ?></textarea>
            </label>

            <p>В наличии?</p>
            <label>
                <span>Да</span>
                <input type="radio" name="isStock" value="Yes" <? echo $Product['isStock'] == 1 ? 'checked' : '' ?>>
            </label>
            <label>
                <span>Нет</span>
                <input type="radio" name="isStock" value="No"  <? echo $Product['isStock'] != 1 ? 'checked' : '' ?>>
            </label>

            <label>
                <p>Категории</p>
                <select name="categories[]" multiple style="display: block">
                    <? foreach ($Categories as $category):?>
                        <option value="<? echo $category['categoryId']?>" <?echo array_key_exists($category['categoryName'], $ProductCategory) ? 'selected' : ''?> ><? echo $category['categoryName']?></option>
                    <? endforeach;?>
                </select>
            </label>
            <input style="display: block" type="submit" value="Изменить">
        </form>
    </div>
<? endif; ?>
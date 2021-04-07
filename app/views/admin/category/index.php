<? if (isset($Category)): ?>
    <h1>Обновление категории</h1>
    <div>
        <form action="" method="post" name="postInfo">

            <input type="text" hidden value="<?echo $Category['categoryId']?>">

            <label>
                <input type="text" hidden name="categoryId" value="<? echo $Category['categoryId'] ?>">
            </label>

            <label>
                <p>Название категории</p>
                <input type="text" name="categoryName" value="<? echo $Category['categoryName'] ?>">
            </label>

            <label>
                <p>Краткое описание</p>
                <input type="text" name="descSh" value="<? echo $Category['categoryDescSh'] ?>">
            </label>

            <p>Полное описание</p>
            <label>
                <textarea name="descFull"><? echo $Category['categoryDescFl'] ?></textarea>
            </label>
            <input style="display: block" type="submit" value="Изменить">
        </form>
    </div>
<? endif; ?>

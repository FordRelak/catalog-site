<div class="categoryList">
	<? foreach ($Category['Data'] as $category) : ?>
        <div class="category">
            <a href="/category/<? echo $category['categoryName'] ?>/goods/page/0"
                class="<? echo $category['isActivity']==1 ? '': 'disabled'?>"><? echo $category['categoryName'] ?></a>
        </div>
	<? endforeach; ?>
</div>

<?php if ($Category['Page'] > 1) : ?>
    <ul class="pagination">
		<? for ($i = 0; $i < $Category['Page']; $i++): ?>

            <li>
                <a class="<? echo $this->activeCategoryPage == $i ? "active" : '' ?>"
                   href="/category/page/<? echo $i ?>"><? echo $i ?></a>
            </li>

		<? endfor; ?>
    </ul>
<?php endif; ?>
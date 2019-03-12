<div class="catalog-item col-4">
	<div class="catalog-img" style="margin-top:50px;">
		<a href="/gallery/{{ item.id }}"><img src="{{ item.filepath }}" alt="{{ item.name }}" style="max-width: 100px;" class="product-img"></a>
	</div>
	<div>Название: {{ item.name }}<br>
	Просмотров: {{ item.views }}
	</div>
</div>

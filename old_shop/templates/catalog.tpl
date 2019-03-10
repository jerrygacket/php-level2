<section class="pt-0">
	<div class="container">
        {% if items|length > 0 %}
			<div id="catalog" class="catalog-row row">
				{% for item in items %}
					{{ include('catalog.row.tpl') }}
				{% endfor %}
				<div id="lastIndex" style="display:none">3</div>
			</div>
			<button class="btn btn-rounded btn-primary" onclick="ajax_get('getMoreGoods','1','3',getGoodsResponse)">Ещё</button>
        {% endif %}
        {% if oneItem|length > 0 %}
			{{ include('product.tpl') }}
		{% endif %}
    </div>
</section>

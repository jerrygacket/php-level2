<section class="pt-0">
	<div class="container">
        {#
        {% if form %}
			{{ include('gallery.form.tpl') }}
        {% endif %}
        #}
        <div class="catalog-row row">
			{% if items|length > 0 %}
				{% for item in items %}
					{{ include('gallery.row.tpl') }}
				{% endfor %}
			{% endif %}
        </div>
        {% if oneItem|length > 0 %}
			{{ include('gallery.item.tpl') }}
		{% endif %}
    </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-6">
			<img src="{{ oneItem.filepath }}" alt="{{ oneItem.name }}">
		</div>
		<div class="col-6">
			<h2>{{ oneItem.name }}</h2>
			<p>Просмотров: {{ oneItem.views }}</p>
			<p>Размер файла: {{ oneItem.filesize }}</p>
			<div class="info-block">
				<p>{{ oneItem.description }}</p>
			</div>
		</div>
	</div>
</div>

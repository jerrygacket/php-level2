<section id="about">  
  <div class="container">
   <div class="row align-items-center">
   <div class="col-lg-5">
	   <a href="{{oneItem.img}}" target="_blank"><img src="{{oneItem.img}}" alt="{{oneItem.name}}" class="product-img"></a>
   </div>
		 <div class="col-lg-6 ml-auto">
			 <h2 class="h1">
				 {{ oneItem.name }}
			 </h2>
			 <div class="u-h-4 u-w-50 bg-primary rounded mt-4 mb-5"></div>
			 <p class="my-3">
				{{ oneItem.intro }}
			 </p>
			 <p class="my-3">
				Просмотров: {{ oneItem.views }}
			 </p>
			 <ul class="list-unstyled u-fw-600 u-lh-2 mt-4 mb-5">
				 <li><i class="fa fa-check text-primary mr-2"></i>Размер: {{oneItem.size}} </li>
				 <li><i class="fa fa-check text-primary mr-2"></i>Ткань: {{oneItem.fabric}} </li>
				 <li><i class="fa fa-check text-primary mr-2"></i>Краска: {{oneItem.paint}} </li>
			 </ul>
			 <button class="btn btn-rounded btn-primary" onclick="ajax_get('add','{{oneItem.id}}','1',getCartResponse)">
						Купить
					</button>
		 </div>  <!-- END col-lg-6-->
	 </div><!--END row-->
  </div> <!-- END container-->
</section>

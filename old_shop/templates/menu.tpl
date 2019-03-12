<header class="header header-shrink header-inverse fixed-top">
  <div class="container">
		<nav class="navbar navbar-expand-lg px-md-0">
			<a class="navbar-brand" href="{{ site.root }}">
				<span class="logo-default">
					<img src="assets/img/logo-default.png" alt="">
				</span>
				<span class="logo-inverse">
					<img src="assets/img/logo-inverse.png" alt="">
				</span>
			</a>

			<button class="navbar-toggler p-0" data-toggle="collapse" data-target="#navbarNav">
              <div class="hamburger hamburger--spin js-hamburger">
                    <div class="hamburger-box">
                      <div class="hamburger-inner"></div>
                    </div>
                </div>
			</button>

			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="{{ site.root }}">
							Главная
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/gallery">
							Галерея
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/catalog">
							Каталог
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/contacts">
							Контакты
						</a>
					</li>
					{% if login.userpage|length > 0 %}
						<li class="nav-item">
							<a class="nav-link" href="/cabinet">
								Кабинет
							</a>
						</li>					
						<li class="nav-item">
							<a class="nav-link" href="/cart">
								Корзина
							</a>
						</li>
					{% endif %}
					<li class="nav-item">
						<a class="nav-link" href="/{{ login.link }}">
							{{ login.text }}
						</a>
					</li>
				</ul>
			</div>
		</nav>
  </div> <!-- END container-->
</header>

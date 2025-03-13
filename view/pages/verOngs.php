<?php require_once './../components/head.php'; ?>
<body>
  <?php require_once './../components/navbar.php'; ?>
  <div class="carousel-ver-ongs">
    <div class="carousel-wrapper-ver-ongs">
      <div class="carousel-track-ver-ongs">
        <?php for ($i = 0; $i < 5; $i++): ?>
          <div class="carousel-item-ver-ongs">
            <div class="card-ver-ongs">
              <div class="ong-ver-ongs">
                <h3>Nome da Ong</h3>
              </div>
              <div class="imagem-ver-ongs">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9w9esuiNKFyR18nOe8A-1DzT9ewLn8C5k0A&s" alt="Foto da ONG" />
              </div>
              <a href="">
                <div class="overlay-ver-ongs">
                  <div class="ong-overlay-ver-ongs">
                    <h3>Nome da Ong</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  </div>
                  <button class="favorito-ver-ongs">
                    <label class="ui-like-ver-ongs">
                      <input type="checkbox" />
                      <div class="like-ver-ongs">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="">
                          <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                          <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path d="M20.808,11.079C19.829,16.132,12,20.5,12,20.5s-7.829-4.368-8.808-9.421C2.227,6.1,5.066,3.5,8,3.5a4.444,4.444,0,0,1,4,2,4.444,4.444,0,0,1,4-2C18.934,3.5,21.773,6.1,20.808,11.079Z"></path>
                          </g>
                        </svg>
                      </div>
                    </label>
                  </button>
                </div>
              </a>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <button class="carousel-btn-ver-ongs prev">‹</button>
    <button class="carousel-btn-ver-ongs next">›</button>
  </div>
  <?php require_once './../components/footer.php'; ?>
</body>
</html>

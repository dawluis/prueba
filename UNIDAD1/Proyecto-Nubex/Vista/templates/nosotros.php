<?php ob_start() ?>
<img class="img-nosotros" src="img/portada.jpg" alt="">
<h3>¿Quienes somos?</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam ea consectetur nemo dolores corporis quidem dignissimos in vero. Commodi libero laudantium rerum necessitatibus ducimus fuga ipsa expedita eos id delectus?</p>
<h3>Nuestra historia</h3>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus dolor ullam harum commodi autem, est similique modi ea laborum corporis accusantium molestias eos earum, beatae odit, nesciunt cumque. Praesentium, mollitia!</p>

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?> 
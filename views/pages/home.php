<?php include '../views/partials/header.php' ?>

<h1>Home</h1>

<form action="#" method="post">
        <input type="text" name="movie" placeholder="Movie" value="<?= $movie ?>">
        <input type="submit">
    </form>
  <div>
  <?php 
  for ($i=0; $i < count($result->results); $i++) :
    $title = $result->results[$i]->title
  ?>
  <div class='title'><?= $title ?></div>
  <?php endfor;?>
  </div>
  <?php
  for ($e=0; $e < count($result->results); $e++): 
    $path = $result->results[$e]->poster_path;
    $url_image = "http://image.tmdb.org/t/p/w300/$path";      
  ?><img src=<?=$url_image?> alt="what"><?php endfor;?>
<article>
    <h3>Article 1</h3>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae laudantium cupiditate veritatis explicabo aliquid ratione cumque, tempora itaque laboriosam repellendus ad, quidem ipsam, voluptate vel? Explicabo laborum eos quisquam aliquid.</p>
    <a href="article/1">Read more</a>
</article>

<article>
    <h3>Article 2</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde, nam necessitatibus deserunt obcaecati similique tempore impedit, provident tenetur quos laboriosam, distinctio adipisci. Architecto repudiandae inventore hic pariatur tenetur veritatis delectus.</p>
    <a href="article/2">Read more</a>
</article>

<article>
    <h3>Article 3</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis corrupti officiis esse doloremque necessitatibus ut voluptate, ea, pariatur atque adipisci iure quia iusto aspernatur et asperiores quo veniam quasi libero!</p>
    <a href="article/3">Read more</a>
</article>

<?php include '../views/partials/footer.php' ?>
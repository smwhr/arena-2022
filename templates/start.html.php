<div class="columns is-centered is-vcentered has-text-centered">
  <div class="column">
    <h1 class="title">Partie initialisée</h1>
    <section class="section">
      <?php 
        $game = $_SESSION['game'];
        foreach($game -> getRobotStats() as $robot) {
          echo '<p>' . $robot[0] . ' est en train de jouer avec ' . $robot[1] . ' points de vie</p>';
        }
      ?>
    </section>
    <form action="/next">
      <button class="button is-info">C'est parti</button>
    </form>
  </div>
</div>
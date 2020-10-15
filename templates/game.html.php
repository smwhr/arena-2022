//todo
<ul>
  <li>Afficher l'arêne</li>
  <li>Afficher les positions des joueurs</li>
  <li>Afficher les vies des joueurs</li>
  <li>Afficher ce qui vient de se passer</li>
</ul>

<form action="/next">
  <button>Next</button>
</form>
<?php
$rapport = [
  "player 1 a avancer",
  "player 1 a reculer",
  "player 1 a bouger a gauche",
  "player 1 a bouger a droite",
  "player 1 a attaquer",
  "player 2 a avancer",
  "player 2 a reculer",
  "player 2 a bouger a gauche",
  "player 2 a bouger a droite",
  "player 2 a attaquer",
];
foreach ($rapport as $rapport ) {
   echo '<li>' . $rapport . '</li>';
}
?>
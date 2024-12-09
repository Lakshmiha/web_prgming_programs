<?php
// Store the names of Indian cricket players in an array
$indianCricketPlayers = array(
  '1'=> ['name' => 'Virat Kohli'],
  '2'=> ['name' => 'Rohit Sharma'],
  '3'=> ['name' => 'Jasprit Bumrah'],
  '4'=> ['name' => 'Ravindra Jadeja'],
  '5'=> ['name' => 'MS Dhoni'],
  '6'=> ['name' => 'Sachin Tendulkar'],
  '7'=> ['name' => 'Sanju Samson'],
  '8'=> ['name' => 'Rahul'],
  '9'=> ['name' => 'Hardik Pandya']
);

// Display the array data in an HTML table
?>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Number</th>
        <th>Player Name</th>
    </tr>

    <?php 
	foreach ($indianCricketPlayers as $player) { ?>
        <tr>
            <td><?= array_search($player, $indianCricketPlayers) + 0; ?></td>
            <td><?= $player['name']; ?></td>
        </tr>
    <?php } ?>
</table>
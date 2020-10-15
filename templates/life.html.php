<table>
    <tr>
        <?php 

        foreach ($game->getRobotStats() as $stat) { ?>
        <td><?php echo $stat[0];?></td>
        <td><?php echo $stat[1];?></td>
        <?php } ?>
    </tr>
</table>


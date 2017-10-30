<table class="table">
    <tr>
        <?php
            foreach ($aListItems[0] as $key => $value){
                echo "<th>$key</th>";
            }
        ?>
    </tr>
    <?php
        foreach($aListItems as $key => $value){
            echo "<tr>";
            foreach ($value as $k => $v){
                echo "<td>$v</td>";
            }
            echo "</tr>";
        }
    ?>
</table>
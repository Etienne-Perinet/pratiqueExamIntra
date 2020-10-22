<table class="table">
    <tr>
        <th>Nom</th>
        <th>Résultat</th>
        <th></th>
    </tr>
<?php
   //Question 3

    foreach($results as $result){
        echo '<tr id="results'.$result->get_id().'">';
        echo '<td>';
        echo ('<p>'.  htmlspecialchars($result->get_name()) .'</p>');
        echo '</td>';
        echo '<td>';
        echo ('<p>'. htmlspecialchars($result->get_score()) .'</p>');
        echo '</td>';
        echo '<td>';
        echo ('<p>'. htmlspecialchars($result->get_id()) .'</p>');
        echo '</td>'; 
        echo '</tr>';
    }
?>
</table>
<table class="table">

<?php

foreach ($scholen as $school)
{
    echo "<tr>
               <td scope='col'>" . $school->schoolnaam . "</td>
               <td scope='col'>" . anchor('Facturen/getSchool/' . $school->id, '<i class="fas fa-angle-right"></i>'). "</td>
                
          </tr>";
}

echo '</table>';

?>
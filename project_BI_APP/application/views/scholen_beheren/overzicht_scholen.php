<table class="table">

<?php

echo smallDivAnchor("Home/index", "Terug", "class='btn btn-secondary'") . "<br>";

foreach ($scholen as $school)
{
    echo "<tr>
               <td scope='col'>" . $school->schoolnaam . "</td>
               <td scope='col'>" . anchor('Scholen/toonSchool/' . $school->id, '<i class="fas fa-angle-right"></i>'). "</td>
                
          </tr>";
}

echo '</table>';

?>
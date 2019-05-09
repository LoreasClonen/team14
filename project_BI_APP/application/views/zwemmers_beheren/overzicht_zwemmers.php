<script>
    function haalZwemmerOp(id) {
        console.log('startajax');

        $.ajax({
            type: "get",
            url: site_url + '/zwemmer/haalAjaxOp_zwemmerVerwijderen',
            data: {id: id},
            success: function (result) {
                $('#resultaat').html(result);
                $('#mijnDialoogscherm').modal('show')
            },
            error: function (xhr, status, error) {
                alert("Fout in AJAX-request \n\n" + xhr.responseText)
            }
        })
    }

    $(document).ready(function () {

        $(".verwijderen").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            haalZwemmerOp(id);
            console.log(id);
        });

    });

</script>

<div class="container">
    <?php echo '<div class="row"><div class="col-4">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>';
        echo '<div class="col-8 text-right">' . anchor("Zwemlessen/keuze", "Zwemmer toevoegen", "class='btn btn-primary'") . '</div></div><br>';?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">Niveau</th>
            <th scope="col">Zwemgroep</th>
            <th scope="col" class="text-center">[Acties]</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($zwemmers as $zwemmer) {
            $naam = "<i class=\"fas fa-user\"></i> " . $zwemmer->voornaam . " " . $zwemmer->achternaam;
            $leeftijd = (int)date("Y m d") - (int)$zwemmer->geboortedatum;
            ?>
            <tr>
                <td>
                    <?php echo anchor('Zwemmer/zwemmerOphalen/' . $zwemmer->id, $naam); ?>
                </td>
                <td>
                    <?php
                        if ($leeftijd == date("Y")) {
                            echo " / ";
                        } else {
                            echo $leeftijd . " jaar";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $zwemmer->zwemniveau->niveauNaam; ?>
                </td>
                <td><?php
                        if ($zwemmer->heeftLesgroep) {
                            echo $zwemmer->lesgroep->groepsnaam;
                        } else {
                            echo 'Geen lesgroep';
                        }
                    ?>
                </td>
                <td class="text-center"><?php
                        echo anchor('Zwemmer/zwemmerOphalen/' . $zwemmer->id, "<i class='fas fa-edit'></i>") . " ";
                        echo anchor('', "<i class='fas fa-trash-alt'></i>", array('class' => 'verwijderen', 'data-id' => $zwemmer->id));
                    ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<!-- Dialoogvenster -->
<div class="modal fade" id="mijnDialoogscherm" role="dialog">
    <div class="modal-dialog">

        <!-- Inhoud dialoogvenster-->
        <div class="modal-content" id="resultaat">

        </div>

    </div>
</div>


<div class="container">
    <p><?php echo anchor("Scholen/klasToevoegenPagina/" . $school->id, "Klas toevoegen", "class='btn btn-primary'"); ?>
        <?php echo anchor("Scholen/klassenOpslaan/" . $school->id, "Wijzigingen opslaan", "class='btn btn-primary'"); ?></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Gesubsidieerd</th>
            <th scope="col" class="text-center">Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($klassen as $klas) { ?>
            <tr>
                <td contenteditable="true">
                    <?php echo $klas->klasnaam; ?>
                </td>
                <td>
                    <?php
                        $inhoudGesubsidieerd = array('1' => 'Ja', '0' => 'Neen');
                        $dataGesubsidieerd = array(
                            'id' => 'isGesubsidieerd',
                            'name' => 'isGesubsidieerd',
                            'class' => 'form-control',
                            'required' => 'required');
                        echo form_dropdown($dataGesubsidieerd, $inhoudGesubsidieerd, $klas->isGesubsidieerd); ?>
                </td>
                <td class="text-center"><?php
                        echo anchor('Scholen/klasVerwijderen/' . $klas->id, "<i class='fas fa-trash-alt'></i>"); ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


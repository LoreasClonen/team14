<div class="container">
    <p><?php echo anchor("Scholen/klasToevoegenPagina/" . $school->id, "Klas toevoegen", "class='btn btn-primary'"); ?></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col" class="text-center">[Acties]</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($klassen as $klas) { ?>
            <tr>
                <td>
                    <?php echo $klas->klasnaam; ?>
                </td>
                <td class="text-center"><?php
                        echo anchor('Scholen/klasAanpassen/' . $klas->id, "<i class='fas fa-edit'></i>") . " ";
                        echo anchor('Scholen/klasVerwijderen/' . $klas->id, "<i class='fas fa-trash-alt'></i>"); ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


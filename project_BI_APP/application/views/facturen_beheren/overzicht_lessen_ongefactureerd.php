<?php
/**
 * Created by PhpStorm.
 * User: poire
 * Date: 5/9/2019
 * Time: 1:06 PM
 */

$attributes = array('name' => 'overzicht_lessen_ongefactureerd', 'id' => 'factuurOpstellenFormulier', 'role' => 'form');
echo form_open('Facturen/toonFactuurOverzicht', $attributes);

foreach ($klassen as $klas) {?>
    <h4><?php echo $klas->klasnaam;?></h4>
    <div class="klas form-group" data-klasId="<?php echo $klas->id;?>">
        <table data-toggle="table">
            <thead>
            <tr>
                <th data-sortable="true">Datum</th>
                <th data-sortable="true">Aantal Leerlingen</th>
                <th data-sortable="true">Factuur</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($klas->lessen as $les) {?>
                <tr>
                    <td><?php echo $les->datumLes; ?></td>
                    <td><?php echo $les->leerlingenAantal; ?></td>
                    <td>
                        <?php
                        $dataLes = array(
                            'id' => 'les' . $les->id,
                            'name' => 'lessen[]' . $les->id,
                            'data-lesId' => $les->id,
                            'value' => $les->id
                        );
                        echo form_checkbox($dataLes);
                        ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
}

echo form_submit(array("value" => "Genereer", "class" => "btn btn-primary", "id" => "genereerFactuur"));
echo form_close();
?>
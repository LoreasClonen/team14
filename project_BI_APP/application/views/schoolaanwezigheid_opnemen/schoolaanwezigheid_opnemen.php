<script>

</script>
<div class="container">
    <div class="col-12 mt-3">
        <?php


            $attributes = array('name' => 'schoolaanwezigheid_opnemen', 'id' => 'schoolaanwezigheidformulier', 'role' => 'form');
            echo form_open('Scholen/aanwezighedenBevestigen', $attributes);


            echo "<hr />";

            // Toont de scholen in een dropdown
            $options = array();
            foreach($scholen as $option){
                $options[$option->id] = $option->schoolnaam;
            }
            echo form_label("Schoolnaam");
            echo form_dropdown('schoolnaam', $options, 'class="form-control dropdown"');

            // Laadt de datum van vandaag in een hidden field
            $datumVanVandaag = date("Y/m/d");
            echo form_hidden($datumVanVandaag, 'datumVanVandaag');


//
//            echo form_label("Aantal zwemmers");
//            $dataAantal = array('id' => 'leerlingenAantal',
//                'name' => 'leerlingenAantal',
//                'class' => 'form-control',
//                'placeholder' => 'aantal zwemmers',
//                'required' => 'required',
//                'size' => '30');
//            echo form_input($dataAantal);
//
//            $leerjaren = array();
//            foreach ($klassen as $klas) {
//                $leerjaren[$klas->id] = $klas->klasnaam;
//
//            }
//            echo form_label("Klas");
//            echo form_dropdown('klasnaam', $leerjaren, '--kies hier het leerjaar--', 'class="form-control dropdown"');
//
//

            echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "schoolaanwezigheid_opslaan"));

            echo form_close();
        ?>
    </div>
</div>




<div class="container">
    <div class="col-12 mt-3">
        <?php
            //Datum op vandaag zetten
            $month = date('m');
            $day = date('d');
            $year = date('y');

            $today = $year . '-' . $month . '-' . $day;

            $attributes = array('name' => 'schoolaanwezigheid_opnemen', 'id' => 'schoolaanwezigheidformulier', 'role' => 'form');
            echo form_open('Scholen/getSchoolWithKlasnaam', $attributes);


            echo "<hr />";


            $options = array();
            foreach($scholen as $option){
                $options[$option->id] = $option->schoolnaam;
            }
            echo form_label("Schoolnaam");
            echo form_dropdown('schoolnaam', $options, '--kies hier de school--', 'class="form-control dropdown"');

            echo form_label("Datum van vandaag");
            $dataDatum = array('id' => 'datumLes',
                'name' => 'datumLes',
                'class', 'form-control',
                'value' => $today);
            echo form_input($dataDatum);

            echo form_label("Aantal zwemmers");
            $dataAantal = array('id' => 'leerlingenAantal',
                'name' => 'leerlingenAantal',
                'class' => 'form-control',
                'placeholder' => 'aantal zwemmers',
                'required' => 'required',
                'size' => '30');
            echo form_input($dataAantal);

            $leerjaren = array();
            foreach ($klassen as $klas) {
                $leerjaren[$klas->id] = $klas->klasnaam;

            }
            echo form_label("Klas");
            echo form_dropdown('klasnaam', $leerjaren, '--kies hier het leerjaar--', 'class="form-control dropdown"');



            echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "schoolaanwezigheid_opslaan"));

            echo form_close();
        ?>
    </div>
</div>



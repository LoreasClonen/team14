
<div class="container">
        <div class="col-12 mt-3">
            <?php
                $attributes = array('name' => 'inschrijven', 'id' => 'inschrijfformulier', 'role' => 'form');
                echo form_open('Zwemlessen/addKlant', $attributes);


                echo "<hr />";


                echo form_label('voornaam', 'voornaam');
                $dataVoornaam = array('id' => 'voornaam',
                    'name' => 'voornaam',
                    'class' => 'form-control',
                    'placeholder' => 'voornaam',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataVoornaam);

                echo form_label('achternaam', 'achternaam');
                $dataAchternaam = array('id' => 'achternaam',
                    'name' => 'achternaam',
                    'class' => 'form-control',
                    'placeholder' => 'achternaam',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataAchternaam);

                echo form_label('email', 'email');
                $dataEmail = array('id' => 'email',
                    'name' => 'email',
                    'class' => 'form-control',
                    'placeholder' => 'e-mail',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataEmail);

                echo form_label('geboortedatum', 'geboortedatum');
                    $dataGeboortedatum = array('id' => 'geboortedatum',
                    'name' => 'geboortedatum',
                    'class' => 'form-control',
                    'placeholder' => 'dag/maand/jaar',
                    'required' => 'required',
                    'size' => '30',
                    'type' => 'date');
                echo form_input($dataGeboortedatum);
                $options = array();
                foreach($zwemniveaus as $option){
                    array_push($options, $option->niveauNaam);
                }
                echo form_label("zwemniveau");
                echo form_dropdown('zwemniveau', $options, '1', 'class="form-control dropdown"');


                echo form_submit(array("value" => "Inschrijven", "class" => "btn btn-primary my-3", "id" => "schrijfIn"));

                echo form_close();
            ?>
        </div>
    </div>




<div class="container">
        <div class="col-12 mt-3">
            <?php
                echo $error;
                $attributes = array('name' => 'inschrijven', 'id' => 'inschrijfformulier', 'role' => 'form');
                echo form_open('Zwemlessen/addKlant', $attributes);


                echo "<hr />";
                echo form_label('Naam voogd', 'voogd');
                $dataVoogd = array('id' => 'voogd',
                    'name' => 'voogd',
                    'class' => 'form-control',
                    'placeholder' => 'Naam voogd',
                    'required' => 'required',
                    'size' => '30');
                echo form_input($dataVoogd);

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
            //in 1 rij zetten
            ?> <div class="row">
                <div class="col-9">
                    <?php
                    echo form_label('straatnaam', 'straatnaam');
                    $dataStraatnaam = array('id' => 'straatnaam',
                        'name' => 'straatnaam',
                        'class' => 'form-control',
                        'placeholder' => 'Straatnaam',
                        'required' => 'required',
                        'size' => '30');
                    echo form_input($dataStraatnaam);
                    ?> </div>
                <div class="col-3">
                    <?php
                    echo form_label('Huisnummer', 'huisnummer');
                    $dataHuisnummer = array('id' => 'huisnummer',
                        'name' => 'huisnummer',
                        'class' => 'form-control',
                        'placeholder' => 'huisnummer',
                        'required' => 'required',
                        'size' => '30');
                    echo form_input($dataHuisnummer);
                    ?> </div>
                 </div> <?php
            echo form_label('postcode', 'postcode');
            $dataPostcode = array('id' => 'postcode',
                'name' => 'postcode',
                'class' => 'form-control',
                'placeholder' => 'postcode',
                'required' => 'required',
                'size' => '30');
            echo form_input($dataPostcode);

            echo form_label("zwemniveau");
            $inhoudZwemniveau = array();
            foreach($zwemniveaus as $zwemniveau){
                $inhoudZwemniveau[$zwemniveau->id] = $zwemniveau->niveauNaam;
            }
            $dataZwemniveau = array(
                'id' => 'zwemniveau',
                'name' => 'zwemniveau',
                'class' => 'form-control',
                'required' => 'required');
            echo form_dropdown($dataZwemniveau, $inhoudZwemniveau, '1');


            echo form_submit(array("value" => "Inschrijven", "class" => "btn btn-primary my-3", "id" => "schrijfIn"));

                echo form_close();
            ?>
        </div>
    </div>



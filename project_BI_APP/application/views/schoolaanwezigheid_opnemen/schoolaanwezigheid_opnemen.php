
<div class="container">
    <div class="col-12 mt-3">
        <?php
            $attributes = array('name' => 'schoolaanwezigheid_opnemen', 'id' => 'schoolaanwezigheidformulier', 'role' => 'form');
            echo form_open('Scholen/getScholen', $attributes);


            echo "<hr />";


            $options = array();
            foreach($scholen as $option){
                $options[$option->id] = $option->schoolnaam;
            }
            echo form_label("Schoolnaam");
            echo form_dropdown('schoolnaam', $options, 'class="form-control dropdown"');


            echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "schoolaanwezigheid_opslaan"));

            echo form_close();
        ?>
    </div>
</div>



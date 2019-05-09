<?php echo '<div class="row"><div class="col-12">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>'; ?>

<div class="container">
    <div class="col-12 mt-3">
        <?php


            $attributes = array('name' => 'schoolaanwezigheid_opnemen', 'id' => 'schoolaanwezigheidformulier', 'role' => 'form');
            echo form_open('Scholen/aanwezighedenBevestigen', $attributes);


            echo "<hr />";

            // Toont de scholen in een dropdown
            echo form_label("Schoolnaam", 'schoolnaam');
            $options = array();
            $options[0] = "--Selecteer een school--";
            foreach($scholen as $option){
                $options[$option->id] = $option->schoolnaam;
            }
            $dataScholen = array(
                    'id' => 'schoolnaam',
                    'name' => 'schoolnaam',
                    'class' => 'form-control');
            echo form_dropdown($dataScholen, $options);




            echo '<div id="klassen"></div>';

            echo form_submit(array("value" => "Opslaan", "class" => "btn btn-primary my-3", "id" => "schoolaanwezigheid_opslaan"));

            echo form_close();
        ?>
    </div>
</div>

<script>
    function haalKlassenOp(schoolId) {
        $.ajax({
            type: "GET",
            url: site_url + "/Scholen/haalAjaxOp_Klassen",
            data: {schoolId: schoolId},
            success: function (result) {
                $("#klassen").html(result);
            }
        })
    }

    $(document).ready(function () {
        $("#schoolnaam").change(function () {

            var schoolId = $(this).val();

            haalKlassenOp(schoolId);
        });

    });
</script>


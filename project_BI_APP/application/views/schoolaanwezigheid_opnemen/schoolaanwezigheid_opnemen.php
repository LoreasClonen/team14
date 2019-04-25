
<div class="container">
    <div class="col-12 mt-3">
        <?php


            $attributes = array('name' => 'schoolaanwezigheid_opnemen', 'id' => 'schoolaanwezigheidformulier', 'role' => 'form');
            echo form_open('Scholen/aanwezighedenBevestigen', $attributes);


            echo "<hr />";

            // Toont de scholen in een dropdown
            echo form_label("Schoolnaam");
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

            // Laadt de datum van vandaag in een hidden field
            $datumLes = date("Y/m/d");
            echo form_hidden($datumLes, 'datumLes');


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


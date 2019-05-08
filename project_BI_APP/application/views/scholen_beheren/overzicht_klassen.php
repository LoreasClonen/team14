<script>
    function haalklasOp(id) {
        console.log('startajax');

        $.ajax({
            type: "get",
            url: site_url + '/scholen/haalAjaxOp_klas/' + id,
            data: {id: id},
            success: function (result) {
                $('#resultaat').html(result);
                $('#mijnDialoogscherm').modal('show')
            },
            error: function (xhr, status, error) {
                alert("Fout in AJAX-request \n\n" + xhr.responseText)
            }
        })
    }

    $(document).ready(function () {

        $(".verwijderen").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            haalklasOp(id);
            console.log(id);
        });

    });

</script>

<div class="container">
    <p><?php echo anchor("Scholen/klasToevoegenPagina", "Klas toevoegen", "class='btn btn-primary'"); ?></p>
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
                <td>
                    <?php echo $klas->klasnaam; ?>
                </td>
                <td><?php
                        if ($klas->isGesubsidieerd == 0) {
                            echo "Neen";
                        } else {
                            echo "Ja";
                        } ?>
                </td>
                <td class="text-center"><?php
                        echo "<button class='btn btn-danger verwijderen' data-id='$klas->id'><i class='fas fa-trash-alt'></i> Verwijderen</button>"; ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<!-- Dialoogvenster -->
<div class="modal fade" id="mijnDialoogscherm" role="dialog">
    <div class="modal-dialog">

        <!-- Inhoud dialoogvenster-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Biertje</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="resultaat"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Sluit</button>
            </div>
        </div>

    </div>
</div>



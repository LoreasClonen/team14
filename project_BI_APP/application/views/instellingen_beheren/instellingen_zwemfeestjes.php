<script>
    function haalmaaltijdOp(id) {
        console.log('startajax');

        $.ajax({
            type: "get",
            url: site_url + '/zwemfeestjes/haalAjaxOp_maaltijd',
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
            haalmaaltijdOp(id);
            console.log(id);
        });

    });

</script>

<div class="container">
    <p><?php echo anchor("Zwemfeestjes/maaltijdToevoegenPagina", "Maaltijd toevoegen", "class='btn btn-primary'"); ?></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Maaltijd</th>
            <th scope="col">Prijs</th>
            <th scope="col" class="text-center">Verwijderen</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($maaltijden

                       as $maaltijd) { ?>
            <tr>
                <td>
                    <?php echo $maaltijd->naam; ?>
                </td>
                <td><?php echo "€" . number_format($maaltijd->prijs, 2); ?>
                </td>
                <td class="text-center"><?php
                        echo anchor('', "<i class='fas fa-trash-alt'></i>", array('class' => 'verwijderen', 'data-id' => $maaltijd->id)); ?>
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
        <div class="modal-content" id="resultaat">

        </div>

    </div>
</div>



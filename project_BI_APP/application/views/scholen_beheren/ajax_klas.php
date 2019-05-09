<div class="modal-header">
    <h4 class="modal-title">Klas verwijderen</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div><?php echo "<p>Weet u zeker dat u de klas " . $klas->klasnaam . " wilt verwijderen?</p>"; ?></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Annuleren</button>
    <?php echo anchor("Scholen/klasVerwijderen/" . $klas->id, "Verwijderen", "class='btn btn-primary'") ?>
</div>

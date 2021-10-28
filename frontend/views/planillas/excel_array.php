<?php

use \yii\widgets\ActiveForm;
use yii\helpers\Html;


?>

<?php ActiveForm::begin(['action' => ['planillas/confirmarimportacion'], 'method' => 'POST', 'id' => 'formulario']) ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group ">
                <label for="linea">Linea:</label>
                <input name="linea" id="linea" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <label for="rubro">Rubro:</label>
                <input name="rubro" id="rubro" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <label for="marca">Marca:</label>
                <input name="marca" id="marca" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <label for="iva">Porcentaje de IVA:</label>
                <input name="iva" id="iva" class="form-control">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <label for="iva">Descripcion:</label>
                <select name="descripcion_row" class="form-control">
                    <?= Html::renderSelectOptions('0', $excelpage[1]); ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group">
                <label for="iva">Costo Sin Impuesto:</label>
                <select name="costo_s_impuesto_row" class="form-control">
                    <?= Html::renderSelectOptions('1', $excelpage[1]); ?>
                </select>
            </div>
        </div>
    </div>
    <input type="hidden" name="idHoja" value="<?= $excelpage['sheetID'] ?>">
    <input type="hidden" name="idArchivo" value="<?= $fileID ?>">

    <h1>Hoja: <?= $excelpage['sheetName'] ?></h1>
    <table class="table">
        <?php
        $row = 0;
        foreach ($excelpage as $column) {
            if (!isset($column)) continue;
            if ($row > 0) {
                if ($row == 1) echo "<thead>"; ?>
                <tr>
                    <?php if ($row > 1) echo "<td><input type='checkbox' name='activos[]' value='$row'/></td>";
                    foreach ($column as $cell) {
                        ?>
                        <td><?= $cell ?></td>
                    <?php } ?>
                </tr>
                <?php
                if ($row == 1) echo "</thead>";
            }
            $row += 1;
        } ?>
    </table>
    <button>Submit</button>

<?php ActiveForm::end();
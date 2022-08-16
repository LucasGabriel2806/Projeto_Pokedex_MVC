<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro da Descricao</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
		
        <legend>Cadastro da Descricao</legend>
		
		<form method="post" action="/descricao/save">
		
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="tipo1">Tipo 1:</label>
            <input id="tipo1" name="tipo'" value="<?= $model->tipo1 ?>" type="text" />

            <label for="tipo2">Tipo 2:</label>
            <input id="tipo2" name="tipo2" value="<?= $model->tipo2 ?>" type="text" />

            <label for="id_no">id no:</label>
            <input id="id_no" name="id_no" value="<?= $model->id_no ?>" type="number" />

            <label for="ot">ot:</label>
            <input id="ot" name="ot" value="<?= $model->ot ?>" type="text" />

            <button type="submit">Capturar</button>
		</form>
    </fieldset>    
</body>
</html>
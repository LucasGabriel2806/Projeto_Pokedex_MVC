<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Poderes</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
		
        <legend>Cadastro de Poderes</legend>
		
		<form method="post" action="/poderes/save">
		
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="poder1">Poder 1:</label>
            <input id="poder1" name="poder1" value="<?= $model->poder2 ?>" type="text" />

            <label for="poder2">Poder 2:</label>
            <input id="poder2" name="poder2" value="<?= $model->poder2 ?>" type="text" />

            <label for="poder3">Poder 3:</label>
            <input id="poder3" name="poder3" value="<?= $model->poder3 ?>" type="text" />

            <label for="poder4">Poder 4:</label>
            <input id="poder4" name="poder4" value="<?= $model->poder4 ?>" type="text" />

            <button type="submit">Capturar</button>
		</form>
    </fieldset>    
</body>
</html>
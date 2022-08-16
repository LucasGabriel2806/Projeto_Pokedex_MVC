<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Habilidades</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
		
        <legend>Cadastro de Habilidades</legend>
		
		<form method="post" action="/habilidades/save">
		
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="ataque">Ataque:</label>
            <input id="ataque" name="ataque" value="<?= $model->ataque ?>" type="number" />

            <label for="defesa">Defesa:</label>
            <input id="defesa" name="defesa" value="<?= $model->defesa ?>" type="number" />

            <label for="velocidade">Velocidade:</label>
            <input id="velocidade" name="velocidade" value="<?= $model->velocidade ?>" type="number" />

            <label for="especial">Especial:</label>
            <input id="especial" name="especial" value="<?= $model->especial ?>" type="number" />

            
            <button type="submit">Capturar</button>
		</form>
    </fieldset>    
</body>
</html>
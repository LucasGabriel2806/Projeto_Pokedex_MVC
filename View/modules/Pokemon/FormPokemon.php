<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pokemon</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <fieldset>
		
        <legend>Cadastro de Pokemon</legend>
		
		<form method="post" action="/pokemon/save">
		
			<input type="hidden" value="<?= $model->id ?>" name="id" />
			
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" value="<?= $model->nome ?>" type="text" />

            <label for="numero">Número:</label>
            <input id="numero" name="numero" value="<?= $model->numero ?>" type="number" />

            <label for="lv">Lv:</label>
            <input id="lv" name="lv" value="<?= $model->lv ?>" type="number" />

            <label for="hp">Hp:</label>
            <input id="hp" name="hp" value="<?= $model->hp ?>" type="number" />

            <label for="estado">Estado:</label>
            <input id="estado" name="estado" value="<?= $model->estado ?>" type="text" />

            <button type="submit">Capturar</button>
		</form>
    </fieldset>    
</body>
</html>
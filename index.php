<!--
		Copyright © 2020 - 2024 Todos Direitos Resevados S.N.G
		
		        Powered by: SYSTEM NETWORK GROUP.
		
		Contato-
			E-mail: systemnetworkgroup@gmail.com
			
			Whats: +55 (87) 9 8840-0801
        ->    
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>ATIVA NET | LOGIN</title>
	
	<link rel="stylesheet" href="assets/css/estilo.css">
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
    <style>
		.msg.erro
		{
			color: #FF0000;
		}
		.msg.sucesso
		{
			color: #38d39f;
		}
    </style>
</head>
<body>
	
	<!-- Barra de download no topo -->
    <div class="download-bar" id="downloadBar">
	
        <span class="tsxt">Baixe nosso app para uma experiência melhor!</span> 
		<a href="#" id="downloadButton" >Baixar</a>
		
        <div> 
            <button class="close-btn" id="closeBar">X</button>
        </div>
    </div>

    <div class="container">
	
        <div class="logo">
            <img src="assets/img/logo.png" alt="Logo da empresa">
        </div>
		
        <h2>Login</h2>
		
		<h2 class="msg" style="font-size: 16px;"></h2>
		
        <form id="login" method="post">
		
            <div class="input-container">
                <input type="text" name="uname" id="uname" placeholder=" " autocomplete="off" required>
                <label for="email">Usuário</label>
            </div>
			
            <div class="input-container">
				<input type="password" name="password" id="password" placeholder=" " autocomplete="off" required>
                <label for="password">Senha</label>
            </div>
			
			<!-- Adicionando o reCAPTCHA
            <div style="align-items: center;" class="g-recaptcha" data-sitekey="6LezaFYqAAAAALoJcci3t_4nuNttzuhuE25yFNKg"></div> -->
			
            <button type="submit" class="btn">Entrar</button>
        </form>
		
        <div class="forgot-password">
            <a href="#">Esqueceu sua senha?</a>
        </div>
		
    </div>
	
	<script>
        // Função para fechar a barra de download
        document.getElementById('closeBar').addEventListener('click', function() 
		{
            var bar = document.getElementById('downloadBar');
            bar.style.display = 'none'; // Esconde a barra
        });
    </script>
	
	<script>
	
		document.getElementById("login").addEventListener("submit", function(event)
		{	
			// Impede o envio do formulário padrão
			event.preventDefault(); 
			
			// Obtém os dados do formulário
			var formData = new FormData(this);
			
			// Envia os dados usando AJAX
			var xhr = new XMLHttpRequest();
			xhr.open("POST", "assets/end/logar.php", true);

			xhr.onload = function()
			{
				if (xhr.status == 200)
				{
					// Lógica para lidar com a resposta do servidor
					var response = JSON.parse(xhr.responseText);

					if (response.successMessage)
					{
						// Exibe mensagem de sucesso
						document.querySelector('.msg').classList.add('sucesso');
						document.querySelector('.msg').classList.remove('erro');
						document.querySelector('.msg').innerText = response.successMessage;
					
						// Redireciona após 3 segundos
						setTimeout(function()
						{
							window.location.href = "p/index.php";
						}, 3000);
					} 
					else 
					{
						// Exibe mensagens de erro
						document.querySelector('.msg').classList.add('erro');
						document.querySelector('.msg').classList.remove('sucesso');
						document.querySelector('.msg').innerText = response.errorMessage;
					}
				}
			};
			xhr.send(formData);
		});
		
	</script>
	
	 <script>
        document.getElementById('downloadButton').addEventListener('click', function() {
            // URL do arquivo APK no servidor
            const apkUrl = 'd/ativa-net.apk'; // Substitua pelo caminho real do seu APK
            
            fetch(apkUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erro ao baixar o arquivo.');
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Cria um URL para o blob
                    const url = window.URL.createObjectURL(blob);
                    // Cria um link temporário e clica nele para iniciar o download
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'ativa-net.apk'; // Nome do arquivo a ser salvo
                    document.body.appendChild(a);
                    a.click();
                    // Limpa o URL do blob após o download
                    window.URL.revokeObjectURL(url);
                    document.body.removeChild(a);
                })
                .catch(error => {
                    console.error('Erro ao iniciar o download:', error);
                });
        });

    
    </script>
</body>
</html>

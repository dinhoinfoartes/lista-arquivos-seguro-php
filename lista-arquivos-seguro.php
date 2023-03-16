<?php
// Define o usuário e senha para autenticação
$auth_user = 'admin';
$auth_pass = 'admin';

// Verifica se a autenticação é necessária
$is_local = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
if (!$is_local && (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] != $auth_user || $_SERVER['PHP_AUTH_PW'] != $auth_pass)) {
    header('WWW-Authenticate: Basic realm="Área Restrita"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Autenticação requerida.';
    exit;
}



// Defina o diretório raiz para listar os arquivos
$dir = './';

// Recupera a lista de arquivos e diretórios
$files = scandir($dir);

// Remove os diretórios "." e ".." da lista
$files = array_diff($files, array('..', '.'));

// Define a lista de extensões de arquivos que são imagens
$imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg'];

// Define a lista de extensões de arquivos compactados
$compressedExtensions = ['7z', 'zip', 'rar', 'tar', 'gz', 'bz2'];

// Define um array com os ícones para cada extensão
$icons = [
    'jpg' => 'fas fa-file-image',
    'jpeg' => 'fas fa-file-image',
    'gif' => 'fas fa-file-image',
    'png' => 'fas fa-file-image',
    'svg' => 'fas fa-file-image',
    'php' => 'fab fa-php',
    'js' => 'fab fa-js',
    'css' => 'fab fa-css3-alt',
    'json' => 'fas fa-file-alt',
    '7z' => 'fas fa-file-archive',
    'zip' => 'fas fa-file-archive',
    'rar' => 'fas fa-file-archive',
    'tar' => 'fas fa-file-archive',
    'gz' => 'fas fa-file-archive',
    'bz2' => 'fas fa-file-archive',
];

// Obter o nome do servidor
$serverName = $_SERVER['SERVER_NAME'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arquivos em: <?php echo $serverName ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Arquivos em:<br>
			<?php echo strtoupper($serverName) ?>
		</h1>
        <div class="list-group">
			<?php foreach ($files as $file) :
				$extension = pathinfo($file, PATHINFO_EXTENSION);
				$icon = '';
				$mime_type = mime_content_type($dir . $file);

				if (is_dir($file)) {
					$icon = 'fas fa-folder';
				} elseif (in_array($extension, $imageExtensions)) {
					$icon = 'fas fa-file-image';
				} elseif (in_array($extension, $compressedExtensions)) {
					$icon = 'fas fa-file-archive';
				} else {
					switch ($extension) {
						case 'php':
						case 'js':
						case 'css':
						case 'json':
							$icon = isset($icons[$extension]) ? $icons[$extension] : 'fas fa-file';
							break;
						default:
							$icon = 'fas fa-file';
							break;
					}
				}
			?>
			<a href="<?php echo $dir . $file ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
				<div>
					<i class="<?php echo $icon ?> me-2"></i>
					<?php echo $file ?>
				</div>
				<?php if (!empty($mime_type)): ?>
					<span class="badge bg-secondary"><?php echo strtoupper($mime_type) ?></span>
				<?php endif; ?>
			</a>

			<?php endforeach; ?>
		</div>

	</div>
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
</body>
</html>

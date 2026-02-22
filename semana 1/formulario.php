<?php
// Procesar el formulario cuando se envíe
$nombre = '';
$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $email  = htmlspecialchars(trim($_POST['email'] ?? ''));
    $texto  = htmlspecialchars(trim($_POST['mensaje'] ?? ''));

    if (empty($nombre) || empty($email) || empty($texto)) {
        $error = 'Por favor, completa todos los campos.';
    } else {
        $mensaje = "¡Gracias, <strong>$nombre</strong>! Tu mensaje ha sido recibido correctamente. Te responderemos a <strong>$email</strong> a la brevedad.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulario de contacto - Semana 1 CodeNode">
    <title>Formulario de Contacto | CodeNode Semana 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>CodeNode &mdash; Semana 1</h1>
        <p>Proyecto: Formulario de Contacto con PHP</p>
    </header>

    <main>
        <section class="card" aria-labelledby="form-title">
            <h2 id="form-title">Formulario de Contacto</h2>

            <?php if (!empty($mensaje)): ?>
                <div class="alert alert-success" role="alert">
                    <?= $mensaje ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
                <div class="alert alert-error" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php" novalidate>

                <div class="form-group">
                    <label for="nombre">Nombre completo</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        placeholder="Ej. Rocio Gordo"
                        value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Ej. rocio@ejemplo.com"
                        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea
                        id="mensaje"
                        name="mensaje"
                        placeholder="Escribe tu mensaje aquí..."
                        required
                    ><?= htmlspecialchars($_POST['mensaje'] ?? '') ?></textarea>
                </div>

                <button type="submit">Enviar mensaje</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> CodeNode &mdash; Semana 1.</p>
    </footer>

</body>
</html>

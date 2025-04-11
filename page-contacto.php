<?php
// Página de contacto con formulario simple
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <style>
        /* Estilos básicos opcionales para mejor presentación */
        .contact-form {
            max-width: 500px;
            margin: auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .contact-form label,
        .contact-form input,
        .contact-form textarea {
            display: block;
            width: 100%;
            margin-bottom: 1em;
        }
        .contact-form input[type="submit"] {
            width: auto;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 0.5em 1em;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<main>
    <div class="contact-form">
        <h2>Contacto</h2>
        <form action="enviar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

            <input type="submit" value="Enviar">
        </form>
    </div>
</main>

<?php
// Incluimos el footer
include 'footer.php';
?>

</body>
</html>




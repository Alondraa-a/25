<?php
  $mensaje = '';
  $tipo = ''; // "error" o "success"

  if (isset($_GET['registro']) && $_GET['registro'] == 'ok') {
      $mensaje = "✅ Registro exitoso. Ahora puedes iniciar sesión.";
      $tipo = "success";
  } elseif (isset($_GET['error']) && $_GET['error'] == 1) {
      $mensaje = "⚠️ Contraseña incorrecta.";
      $tipo = "error";
  } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
      $mensaje = "⚠️ Usuario no encontrado.";
      $tipo = "error";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Login</title>
</head>
<body>

<?php if ($mensaje): ?>
    <div id="message-box" class="message-box <?= $tipo ?>">
    <?= $mensaje ?>
  </div>
<?php endif; ?>

<section>
    <div class="form-box">
        <div class="form-value" id="login-form">
            <form action="../PHP/login.php" method="POST">
                <h2>Login</h2>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="contraseña" placeholder="Contraseña" required>
                </div>
                <div class="forget">
                    <label><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>                        
                </div>
                <button type="submit">Log in</button>
                <div class="register">
                    <p>No tienes una cuenta? <a href="registro.php">Registrate</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
  // Oculta el mensaje después de 3 segundos
  window.addEventListener('DOMContentLoaded', () => {
    const messageBox = document.getElementById('message-box');
    if (messageBox) {
      setTimeout(() => {
        messageBox.classList.add('hidden');
      }, 3000); // 3 segundos
    }
  });
</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> 
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>

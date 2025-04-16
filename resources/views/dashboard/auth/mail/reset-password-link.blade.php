<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Reset Your Password</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f9f9fb; font-family: Arial, sans-serif;">

  <div style="max-width: 500px; margin: 40px auto; background-color: #ffffff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); text-align: center;">

    <!-- Logo -->
    <div style="margin-bottom: 20px;">
      <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" width="40" alt="Sneat Logo" />
      <h2 style="color: #5f61e6; margin-top: 10px;">Injaz</h2>
    </div>

    <!-- Title -->
    <h3 style="margin-bottom: 10px; font-size: 22px; color: #333;">Reset Your Password</h3>

    <!-- Message -->
    <p style="color: #666; font-size: 15px; line-height: 1.5; margin-bottom: 30px;">
        Use the following 6-digit code to reset your password. Click the button below to choose a new password.
    </p>

      <!-- Code Box -->
      <div style="letter-spacing: 10px; font-size: 30px; font-weight: bold; color: #4c4cf1; margin-bottom: 30px;">
        {{ $token }}
      </div>

    <!-- Reset Button -->
    <a href="{{ $resetLink }}" target="_blank" style="background-color: #696cff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px;">
      Reset Password
    </a>

    <!-- Footer -->
    <p style="color: #888; font-size: 13px; margin-top: 30px;">
      If you didn’t request a password reset, you can safely ignore this email.
    </p>

  </div>

</body>
</html>

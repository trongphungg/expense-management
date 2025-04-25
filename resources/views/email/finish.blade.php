<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hoàn thành</title>
  <style>
    body {
      background-color: #f0fdf4;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
      margin: 0;
    }

    .container {
      text-align: center;
      animation: fadeIn 1s ease-in-out;
    }

    .checkmark {
      font-size: 80px;
      color: #22c55e;
      animation: pop 0.6s ease-in-out forwards;
    }

    .message {
      font-size: 28px;
      color: #14532d;
      margin-top: 20px;
      opacity: 0;
      animation: fadeInText 1s ease-in-out forwards;
      animation-delay: 0.6s;
    }

    @keyframes pop {
      0% {
        transform: scale(0);
        opacity: 0;
      }
      80% {
        transform: scale(1.2);
        opacity: 1;
      }
      100% {
        transform: scale(1);
      }
    }

    @keyframes fadeInText {
      to {
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="checkmark">✔️</div>
    <div class="message">Hoàn thành!</div>
  </div>

  <script>
    // Optional: Chuyển hướng sau 3 giây
    setTimeout(() => {
      window.location.href = "/dashboard";
    }, 5000);
  </script>
</body>
</html>

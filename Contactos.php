<?php
// Contactos.php (página pública)
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contactos | QuizGame</title>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Inter:wght@300;400;500;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: radial-gradient(circle at top, #0b0f12, #050607);
      color: #eaeaea;
      line-height: 1.6;
      overflow-x: hidden;
    }

    /* HEADER */
    header {
      padding: 20px 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: rgba(10, 15, 20, 0.85);
      border-bottom: 1px solid rgba(0,255,240,0.2);
      backdrop-filter: blur(10px);
      position: sticky;
      top: 0;
      z-index: 2000;
    }

    header h1 {
      font-family: 'Orbitron', sans-serif;
      font-size: 1.8rem;
      color: #00fff0;
      letter-spacing: 2px;
      text-transform: uppercase;
      text-shadow: 0 0 12px rgba(0,255,240,0.6);
    }

    .menu-btn {
      background: transparent;
      color: #00fff0;
      padding: 10px 18px;
      border-radius: 8px;
      border: 1px solid #00fff0;
      font-weight: 500;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .menu-btn:hover {
      background: #00fff0;
      color: #000;
      box-shadow: 0 0 15px rgba(0,255,240,0.6);
    }

    /* SIDEBAR */
    .sidebar {
      position: fixed;
      top: 0;
      right: -320px;
      width: 300px;
      height: 100vh;
      background: rgba(10, 15, 20, 0.97);
      border-left: 1px solid rgba(0,255,240,0.2);
      padding: 50px 30px;
      transition: 0.4s ease;
      z-index: 3000;
      backdrop-filter: blur(12px);
    }

    .sidebar.active { right: 0; }

    .sidebar h2 {
      font-family: 'Orbitron', sans-serif;
      color: #00fff0;
      text-align: center;
      margin-bottom: 35px;
      letter-spacing: 2px;
    }

    .sidebar a {
      display: block;
      padding: 14px 12px;
      margin: 14px 0;
      color: #cfcfcf;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.3s ease;
    }

    .sidebar a:hover {
      background: rgba(0,255,240,0.1);
      color: #00fff0;
      transform: translateX(5px);
    }

    /* CONTACT SECTION */
    section {
      max-width: 650px;
      margin: 120px auto 80px auto;
      padding: 40px;
      background: rgba(15, 20, 25, 0.6);
      border: 1px solid rgba(0,255,240,0.15);
      border-radius: 16px;
      backdrop-filter: blur(15px);
      box-shadow: 0 15px 40px rgba(0,255,240,0.08);
      text-align: center;
      animation: fadeIn 1s ease;
    }

    section h2 {
      font-family: 'Orbitron', sans-serif;
      font-size: 2rem;
      margin-bottom: 35px;
      color: #00fff0;
      text-shadow: 0 0 15px rgba(0,255,240,0.3);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    input, textarea {
      padding: 14px;
      background: #1c232c;
      border: 1px solid rgba(0,255,240,0.15);
      border-radius: 10px;
      color: #eaeaea;
      font-size: 1rem;
      outline: none;
      transition: 0.3s ease;
    }

    input::placeholder,
    textarea::placeholder {
      color: #8c96a3;
    }

    input:focus,
    textarea:focus {
      border-color: #00fff0;
      box-shadow: 0 0 10px rgba(0,255,240,0.3);
      background: #222b36;
    }

    /* BUTTONS */
    .btn {
      padding: 14px;
      border-radius: 10px;
      border: none;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s ease;
      font-size: 1rem;
    }

    .btn-primary {
      background: linear-gradient(135deg, #00fff0, #00bfb2);
      color: #000;
      box-shadow: 0 8px 25px rgba(0,255,240,0.25);
    }

    .btn-primary:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(0,255,240,0.4);
    }

    .btn-secondary {
      background: transparent;
      border: 1px solid #00fff0;
      color: #00fff0;
    }

    .btn-secondary:hover {
      background: #00fff0;
      color: #000;
    }

    /* SPINNER */
    #spinner {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.7);
      justify-content: center;
      align-items: center;
      z-index: 5000;
    }

    #spinner::after {
      content: "";
      width: 70px;
      height: 70px;
      border: 6px solid rgba(0,255,240,0.2);
      border-top-color: #00fff0;
      border-radius: 50%;
      animation: spin 1s linear infinite;
    }

    @keyframes spin { to { transform: rotate(360deg); } }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      section {
        margin: 100px 20px 60px 20px;
        padding: 25px;
      }

      section h2 { font-size: 1.6rem; }
    }

  </style>
</head>

<body>

<div id="spinner"></div>

<header>
  <h1>Contacte-nos</h1>
  <div class="menu-btn" onclick="toggleMenu()">☰ Menu</div>
</header>

<div class="sidebar" id="sidebar">
  <h2>Menu</h2>
  <a href="index.html">Início</a>
  <a href="Play/index.php">Jogar</a>
  <a href="Sobre.html">Sobre</a>
  <a href="Contactos.php">Contactos</a>
  <a href="BackOffice/index.php">BackOffice</a>
</div>

<section>
  <h2>Tem alguma dúvida?</h2>

  <form method="POST" action="BackOffice/gestao_mensagens.php?action=receive" id="contactForm">
    <input type="text" name="nome" placeholder="O seu nome" required>
    <input type="email" name="email" placeholder="O seu email" required>
    <textarea name="mensagem" rows="6" placeholder="Descreva o problema..." required></textarea>

    <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
    <button type="button" class="btn btn-secondary" onclick="window.location.href='index.html'">
      ← Voltar
    </button>
  </form>
</section>

<script>
function toggleMenu() {
  document.getElementById("sidebar").classList.toggle("active");
}

document.addEventListener('click', function(event) {
  const sidebar = document.getElementById('sidebar');
  const menuBtn = document.querySelector('.menu-btn');

  if (sidebar.classList.contains('active') &&
      !sidebar.contains(event.target) &&
      !menuBtn.contains(event.target)) {
    sidebar.classList.remove('active');
  }
});

const spinner = document.getElementById('spinner');
document.getElementById('contactForm').addEventListener('submit', () => {
  spinner.style.display = 'flex';
});
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Siswa Baru</title>
  <style>
    body {
      font-family: sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      background-color: #f4f4f4;
      transition: opacity 1s ease;
      opacity: 0;

    }

    .container {
      margin-top: 1rem;
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: opacity 1s ease;
      opacity: 0;
      width: 60%;
      /* Default width for larger screens */
    }

    @media (max-width: 768px) {

      /* Adjust breakpoint as needed */
      .container {
        width: 90%;
        /* margin: 1rem 5rem; */
        /* Set width to 100% for smaller screens */
      }
    }

    h1 {
      margin-bottom: 20px;
      color: #333;
      transition: opacity 1s ease;
      opacity: 0;
    }

    button {
      background-color: #007bff;
      color: #fff;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: opacity 1s ease;
      opacity: 0;
    }

    button:hover {
      background-color: #0056b3;
    }

    form {
      margin-top: 30px;
      transition: opacity 1s ease;
      opacity: 0;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      transition: opacity 1s ease;
      opacity: 0;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: opacity 1s ease;
      opacity: 0;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Pendaftaran Siswa Baru</h1>
    <button onclick="window.location.href='<?php echo base_url('registrasiBaru')?>'">Daftar Sekarang</button>
  </div>

  <div class="container container2">
    <form action="<?php echo base_url('cekRegistrasi') ?>" method="post">
      <h3>Sudah memiliki nomor pendaftaran? </h3>
      <input name="noreg" id="numberInput" type="text" inputmode="numeric" placeholder="Masukkan Nomor Pendaftaran" required>
      <button type="submit">Cek Status</button>
    </form>
  </div>

  <script>
    window.onload = function() {
      // Make body and container elements visible immediately
      document.body.style.opacity = 1;
      document.querySelector('.container').style.opacity = 1;
      document.querySelector('.container2').style.opacity = 1;

      // Delay visibility of h1, button, and form by 0.5 seconds
      setTimeout(function() {
        document.querySelector('h1').style.opacity = 1;
        document.querySelector('button').style.opacity = 1;
        document.querySelector('form').style.opacity = 1;
        document.querySelector('input[type="text"]').style.opacity = 1;
        document.querySelector('button[type="submit"]').style.opacity = 1;
      }, 1000);
    };

    const numberInput = document.getElementById('numberInput');

numberInput.addEventListener('keypress', (event) => {
  // Allow only numbers and backspace
  if (!/^[0-9\b]+$/.test(event.key)) {
    event.preventDefault();
  }
});
  </script>
</body>

</html>
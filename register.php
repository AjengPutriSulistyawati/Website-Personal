
<!doctype html>
<html lang="en" data-bs-theme="auto">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>RJ Digital Printing - Ahlinya cetak DADAKAN</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">
  </head>
  
    <body class="text-center">
    <main class="form-signin w-100 m-auto">
    <form  class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
        
        <h1 class="h3 mb-3 fw-normal">Daftar Akun Customer Baru</h1>

    <div class="form-floating mb-2">
      <input name="nama" type="text" class="form-control" id="floatingInput" placeholder="nama" required>
      <label for="floatingInput">Nama Customer</label>
      <div class="invalid-feedback">Masukkan nama.</div>
    </div>

    <div class="form-floating mb-2">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
      <label for="floatingInput">Username</label>
      <div class="invalid-feedback">Masukkan username.</div>
    </div>

    <div class="form-floating mb-2">
    <select class="form-select" aria-label="Default select example" name="level" required >
        <option selected hidden value="">Pilih Level User</option>
        <option value="3"> Customer</option> 
        </select>
    <label for="floatingInput">Level User</label>
    <div class="invalid-feedback">Pilih level User.</div>
    </div>

    <div class="form-floating mb-2">
        <input type="number" class="form-control" id="floatingInput" placeholder="08xxxxxxxxxx" name="nohp" required >
        <label for="floatingInput">No HP</label>
    </div>

    <div class="form-floating mb-2">
        <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
        
     </div>

     <div class="form-floating mb-2">
        <textarea class="form-control" id="" style="height:100px" name="alamat" required></textarea>
        <label for="floatingInput">Alamat</label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary w-100 py-2" name="input_user_validate" value="1234">Save changes</button>
    </div>
  </form>
</main>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>

    </body>
</html>

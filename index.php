<?php 
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'salwa' && $password === 'salwa000') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['logged_in'])) { ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Form Login</h2>
        <?php if (isset($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

<?php
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
        }
        .marquee {
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            box-sizing: border-box;
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        h2 {
            text-align: center;
            color: #333;
            margin: 20px 0;
            font-size: 28px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            max-width: 800px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin: 20px;
        }
        .profile-info {
            flex: 1;
            margin-left: 20px;
        }
        .profile-info p {
            font-size: 18px;
            line-height: 1.8;
            margin: 8px 0;
        }
        .profile-section {
            margin-top: 20px;
        }
        .profile-section h3 {
            text-align: center;
            font-size: 22px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .logout-link {
            display: block;
            margin: 20px auto;
            text-align: center;
            font-size: 16px;
            text-decoration: none;
            color: #007bff;
        }
        .logout-link:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                text-align: center;
            }
            .profile-info {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="marquee">
        <marquee>HI, WELCOME TO MY PROFILE PAGE!</marquee>
    </div>

    <h2>ABOUT ME</h2>
    <div class="container">
        <img src="FotoDiri/foto.jpg" alt="Foto Profil" class="profile-img">
        <div class="profile-info">
            <p><strong>Nama:</strong> A. Salwa Aurelya Putri</p>
            <p><strong>Tanggal Lahir:</strong> 17 September 2005</p>
            <p><strong>Jenis Kelamin:</strong> Perempuan</p>
            <p><strong>Alamat:</strong> Indralaya, Sumatera Selatan</p>
        </div>
    </div>

    <div class="container profile-section">
        <h3>Riwayat Pendidikan</h3>
        <ul>
            <li>SMP Negeri 16 Kota Jambi (2017-2020)</li>
            <li>SMA Negeri 4 Kota Jambi (2020-2023)</li>
            <li>Universitas Sriwijaya - Sistem Informasi (2023-sekarang)</li>
        </ul>
    </div>

    <div class="container profile-section">
        <h3>Pengalaman Organisasi</h3>
        <ul>
            <li>Anggota BEM KM Fasilkom Unsri (2024)</li>
            <li>Anggota Himpunan Mahasiswa Jambi Unsri (2023-sekarang)</li>
        </ul>
    </div>

    <a href="?logout=true" class="logout-link">Logout</a>
</body>
</html>
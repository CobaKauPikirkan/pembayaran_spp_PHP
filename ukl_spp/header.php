<!DOCTYPE html>
  <!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/style.css">
        <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <?php echo file_get_contents("img/Untitled-1.svg"); ?>
                </span>

                <div class="text logo-text">
                    <span class="name">SMK Telkom</span>
                    <span class="profession">Malang</span>
                </div>
            </div>

            
        </header>

        <div class="menu-bar">
                <i class='bx bx-chevron-right toggle'></i>
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="datasiswa.php">
                            <i class='bx bx-happy-alt icon'></i>
                            <span class="text nav-text">Siswa</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="datakelas.php">
                            <i class='bx bx-cabinet icon'></i>
                            <span class="text nav-text">Kelas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="petugas.php">
                            <i class='bx bx-buildings icon' ></i>
                            <span class="text nav-text">petugas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="spp.php">
                            <i class='bx bx-money-withdraw icon' ></i>
                            <span class="text nav-text">Spp</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="datatransaksi.php">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">transaksi</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="histori.php">
                            <i class='bx bx-history icon'></i>
                            <span class="text nav-text">History</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="logout.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li id="geser" class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div onclick="darkmode()" class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <script>
        function darkmode(){
            
            body.classList.toggle("dark");
            
            if(body.classList.contains("dark")){
                modeText.innerText = "Light mode";
            }else{
                modeText.innerText = "Dark mode"; 
        }

        }
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector("#geser"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    alert('error');
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});

    </script>


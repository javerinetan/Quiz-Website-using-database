<?php 
require_once('../connection.php');
session_start();
if(!isset($_SESSION['User']))
    {header("location:login.php");} 

$query="select * from account where email='".$_SESSION['User']."'";
$instance = new DatabaseConnection();
$row=$instance->retrieveData($query);

// $query = "select * from account where email='".$_SESSION['User']."'";
// $results=mysqli_query($con,$query);
// $row=$results->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    <?php
        // $query = "SELECT name FROM account WHERE email='" . $_SESSION['User'] . "'";
        // $result = mysqli_query($con, $query);
        // $row = $result->fetch_assoc();
        echo 'Welcome ' . ucfirst($row['name']);
    ?>

    </title>

    <!-- bootstraps -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="userstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

    <link href="../wf/assets/QuizITLogo.png" rel="shortcut icon" type="image/x-icon" />
    <link href="../wf/assets/QuizITLogo.png" rel="apple-touch-icon" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


</head>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <!-- Logo and Search Bar on the left -->
        <img class="navbar-brand" src="../wf/assets/QuizITLogoname.png" href="user_dashboard.php">

        <!-- Toggler Button for small screens -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <form class="d-flex">
            <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        </form>

        <!-- Navbar items at the center -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Dashboard</a>
                </li>
            </ul>
        </div>

        <!-- Profile button and dropdown on the left -->
        <div class="dropdown">
            <button class="btn create " type="submit">Create a Quiz</button>

            <!-- Profile dropdown with image -->
            <button class="btn profile dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../wf/assets/dd.jpg" alt="User Image" class="user-image">
            </button>
            <ul class="profile_drop dropdown-menu" aria-labelledby="profileDropdown">
                <li class="details_user">
                <?php  
                    $query="select * from account where email='".$_SESSION['User']."'";
                    $results=mysqli_query($con,$query);
                    $row=$results->fetch_assoc();
                    echo $row['name'];
                    echo '<br>';
                    echo $row['email'];
                ?>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="user_account.php">Settings</a></li>
                <li><a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>
                <?php 
                    // $query="select * from account where email='".$_SESSION['User']."'";
                    // $results=mysqli_query($con,$query);
                    // $row=$results->fetch_assoc();
                    // echo '<a class="dropdown-item" href="../account/logout.php?logout">Log Out</a>';
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<body class="account">
    <div class="Settings">
        <h1>Settings</h1>
    </div>
    <div class="settings_profile">
        <div class="topbar">
            <i class="fa-regular fa-user" style="color: #86197d;"></i>
                <h2 data-v-186fa257="" class="settings-group-profile-title">Profile</h2>
        </div>
        <button class="details has-chevron">
            <p class="main">Avatar</p>
            <p class="text">Change your avatar</p>
        </button>
        <button class="details has-chevron">
            <p class="main2">Username</p>
            <p class="text">
            <?php  
                
                $u_query = "SELECT CONCAT(name, id, LPAD(DAY(birthdate), 2, '0')) AS username FROM account WHERE email='" . $_SESSION['User'] . "'";
                $u_results=mysqli_query($con,$u_query);
                $u_row=$u_results->fetch_assoc();
                echo $u_row['username'];
                
            ?>
            </p>
        </button>
        <a href="edit.php?name"><button class="details has-chevron">
            <p class="main">Name</p>
            <p class="text">
            <?php  
                echo $row['name'];
            ?>
            </p>
        </button></a>
        <a href="edit.php?birthdate"><button class="details has-chevron">
            <p class="main">Birthdate</p>
            <p class="text">
            <?php  
                echo $row['birthdate'];
            ?>
            </p>
        </button></a>
        <a href="edit.php?email"><button class="details has-chevron">
            <p class="main">Email</p>
            <p class="text">
            <?php  
                echo $row['email'];
            ?>
            </p>
        </button></a>
    </div>

    <div class="settings_update">
        <div class="topbar">
        <i class="fa-regular fa-user" style="color: blue;"></i>
                <h2 data-v-186fa257="" class="settings-group-profile-title">Reset</h2>
        </div>
        <!-- <a href="change_password.php" class="main"><button class="details has-chevron"> -->
        <a href="edit.php?password" class="main"><button class="details has-chevron">
            <p class="main2">Update Password</p>
        </button></a>
        <button class="details has-chevron" onclick="confirmDelete()">
            <p class="main">Delete Account</p>
        </button></a>
        <a class="main" href="../account/logout.php?logout"><button class="details has-chevron">
            <p class="main2">Log Out</p>
        </button></a>
    </div>
    
<?php 
    if(@$_GET['Success']==true)
    {
?>
    <div class="alert-light text-success text-center py-3"><?php echo $_GET['Success'] ?></div>                                
<?php
    }
?>

<script>
    function confirmDelete() {
        var expectedUsername = "<?php echo $row['name'] . $row['id'] . date('d', strtotime($row['birthdate'])); ?>";
        var expectedPassword = "<?php echo $row['password'] ?>";

        var userInput = prompt("Please enter your username and password to confirm deletion (e.g., username/password):");
        if (userInput === null) {
            // User clicked cancel, do nothing
            return;
        }

        var inputParts = userInput.split('/');
        if (inputParts.length !== 2) {
            alert("Invalid input format. Please try again." + expectedPassword + expectedUsername);
            return;
        }

        var enteredUsername = inputParts[0].trim();
        var enteredPassword = inputParts[1].trim();

        if (enteredUsername !== expectedUsername || enteredPassword !== "<?php echo $row['password']; ?>") {
            alert("Incorrect username or password. Please try again." );
            return;
        }

        // Send an AJAX request to the server to delete the account
        // You need to implement the server-side logic to delete the account securely

        // Example using fetch API
        fetch('delete_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username: enteredUsername,
                password: enteredPassword,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Account deletion successful, you can redirect or perform any other action
                alert("Account deleted successfully");
                window.location.href = '../index.php';
            } else {
                // Account deletion failed, show an error message
                alert("Failed to delete account. Please try again later.");
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
</script>



</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>


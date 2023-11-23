<?php 
require_once('../connection.php');
session_start();
if(!isset($_SESSION['User']))
    {header("location:../account/login.php");} 

$query="select * from account where id=".$_SESSION['User']."";
$instance = new DatabaseConnection();
$row=$instance->retrieveData($query);

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</head>
<?php require '../navbar.php'; ?>

<body class="account">
    <div class="Settings">
        <h1>Settings</h1>
    </div>
    <div class="settings_profile">
        <div class="topbar">
            <i class="fa fa-user" style="color: #86197d; padding-left: 10px"></i>
                <h2 data-v-186fa257="" class="settings-group-profile-title">Profile</h2>
        </div>
        <!-- Inside your HTML body section -->
        <button class="details has-chevron" id="uploadAvatarBtn" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <p class="main">Avatar</p>
            <p class="text">Change your avatar</p>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Avatar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="uploadForm">
                            <label for="avatarInput">Avatar URL:</label>
                            <input type="text" id="avatarInput" name="avatar_url" required>
                            <button type="button" class="btn btn-primary" onclick="uploadAvatar()">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function uploadAvatar() {
            var avatarURL = document.getElementById('avatarInput').value;

            fetch('upload_avatar.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'avatar_url=' + encodeURIComponent(avatarURL),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Avatar URL updated successfully");
                    // Redirect to accounts.php after successful update
                    window.location.href = 'user_account.php';
                } else {
                    alert("Failed to update avatar URL. " + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>


        <button class="details has-chevron">
            <p class="main2">Username</p>
            <p class="text2">
            <?php  
                
                $u_query = "SELECT CONCAT(name, id, LPAD(DAY(birthdate), 2, '0')) AS username FROM account WHERE id=" . $_SESSION['User'] . "";
                $u_results=mysqli_query($con,$u_query);
                $u_row=$u_results->fetch_assoc();
                echo $u_row['username'];
                
            ?>
            </p>
        </button>
        <a class="main" href="edit.php?name"><button class="details has-chevron">
            <p class="main">Name</p>
            <p class="text">
            <?php  
                echo $row['name'];
            ?>
            </p>
        </button></a>
        <a class="main" href="edit.php?birthdate"><button class="details has-chevron">
            <p class="main">Birthdate</p>
            <p class="text">
            <?php  
                echo $row['birthdate'];
            ?>
            </p>
        </button></a>
        <a class="main" href="edit.php?email"><button class="details has-chevron">
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
        <i class="fa fa-user" style="color: blue; padding-left: 10px;"></i>
                <h2 data-v-186fa257="" class="settings-group-profile-title">Reset</h2>
        </div>
        <!-- <a href="change_password.php" class="main"><button class="details has-chevron"> -->
        <a href="edit.php?password" class="main"><button class="details has-chevron">
            <p class="main2">Update Password</p>
        </button></a>
        <button class="details has-chevron" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            <p class="main">Delete Account</p>
        </button>

        <!-- Modal for confirmation -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="deleteInput">Please enter your username and password to confirm deletion:</label>
                        <input type="text" id="deleteInput" class="form-control" placeholder="username/password" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete()">Confirm Deletion</button>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="main" href="../account/logout.php?logout"><button class="details has-chevron">
            <p class="main2">Log Out</p>
        </button></a>
    </div>
    
<?php 
    if(@$_GET['EditSuccess']==true)
    {
        echo '<script>alert("'.$_GET['EditSuccess'].' successfully changed!")</script>'; 
?>
<?php
    }
?>

<script>
    function confirmDelete() {
    var expectedUsername = "<?php echo $row['name'] . $row['id'] . date('d', strtotime($row['birthdate'])); ?>";
    var expectedPassword = "<?php echo $row['password'] ?>";

    var userInput = document.getElementById('deleteInput').value.trim();

    var inputParts = userInput.split('/');
    if (inputParts.length !== 2) {
        alert("Invalid input format. Please try again.");
        return;
    }

    var enteredUsername = inputParts[0].trim();
    var enteredPassword = inputParts[1].trim();

    if (enteredUsername !== expectedUsername || enteredPassword !== "<?php echo $row['password']; ?>") {
        alert("Incorrect username or password. Please try again.");
        return;
    } else {
        // Close the modal
        $('#confirmDeleteModal').modal('hide');
        window.location.replace('delete_user.php');
    }
}
</script>





</body>

<footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://proxy-translator.app.crowdin.net/assets/proxy-translator.js"></script>
<script src='../language.js'></script>
</footer>

</html>


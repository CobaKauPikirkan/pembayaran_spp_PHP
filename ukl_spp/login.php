<?php
session_start();
if(isset($_SESSION['username'])){
    header("location: index.php");
}
?>
<center>
    <h1>Silahkan Login</h1>
            <hr />
<form action="proseslogin.php" method="POST">
    <table>
        <tr>
            <td>Username :</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="LOG IN" name="login"></td>
        </tr>
        <tr>
            <td colspan="2"><center>Apakah anda seorang siswa? login 
                                    <a href="login_siswa.php">disini</a>
                            </center>
            </td>
        </tr>
    </table>
</form>
</center>

<?php
    require_once 'model.php';
    require_once 'config.php';

    $username=$_SESSION['username'];
    $query="select d.nume, d.prenume, d.email, d.adresa, d.telefon, u.username, u.password from detalii_membri d, users u where u.id=d.id_users and u.username='$username'";
    $rez=mysql_query($query);
    $row=mysql_fetch_assoc($rez);
?>

<div id="inserts">
    <fieldset>
        <legend>Detalii cont</legend>
        <table>
            <tbody>
            <tr>
                <th>Nume:</th>
                <td><?= $row['nume'] ?></td>
            </tr>
            <tr>
                <th>Prenume:</th>
                <td><?= $row['prenume'] ?></td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td><?= $row['email'] ?></td>
            </tr>
            <tr>
                <th>Adresa:</th>
                <td><?= $row['adresa'] ?></td>
            </tr>
            <tr>
                <th>Telefon:</th>
                <td><?= $row['telefon'] ?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?= $row['username'] ?></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><?= $row['password'] ?></td>
            </tr>
            </tbody>
        </table>
    </fieldset>
</div>

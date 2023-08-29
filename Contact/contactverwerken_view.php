<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <?php require_once('contact_verwerken.php'); ?>
</head>
<body>
<nav class="py-3 bg-white">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="../Homepagina/index.html" class="nav-link link-dark px-2 fs-5" aria-current="page">Jonah</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="../Homepagina/index.html" class="nav-link link-dark px-2 fs-5" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="../Introductie/intro.html" class="nav-link link-dark px-2 fs-5" aria-current="page">Wie ben ik</a></li>
            <li class="nav-item"><a href="../Projecten/projecten.html" class="nav-link link-dark px-2 fs-5" aria-current="page">Projecten</a></li>
            <li class="nav-item"><a href="../Contact/contact.html" class="nav-link link-dark px-2 fs-5 active" aria-current="page">Contact</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1>Admin panel contacten</h1>

    <?php
    $result = $db->query("SELECT * FROM contactgegevens");
    ?>

    <?php if ($result && $result->numColumns() > 0): ?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Naam</th>
                <th scope="col">Adres</th>
                <th scope="col">Telefoonnummer</th>
                <th scope="col">Email</th>
                <th scope="col">Vraag</th>
                <th scope="col">Actie</th>
            </tr>
            </thead>

            <tbody>
            <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['Naam'] ?></td>
                    <td><?= $row['Adres'] ?></td>
                    <td><?= $row['Telefoonnummer'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['Vraag'] ?></td>
                    <td><a class="btn btn-danger" href="contactverwerken_view.php?delete=<?= $row['ID'] ?>">Verwijderen</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <?php $db->close(); ?>

</div>
</body>
</html>

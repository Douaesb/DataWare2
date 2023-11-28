<?php
include "connection.php";
    if (isset($_POST['edit'])) {
        $id = $_POST['id_equipe'];
        $name = $_POST['nom_equipe'];
        $date = $_POST['date_creation'];
        $sql = "UPDATE equipe SET nom_equipe='$name', date_creation='$date' WHERE id_equipe='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result == TRUE) {
            header('Location: dashboards.php');
        }
    }

if (isset($_GET['id_equipe'])) {
    $id = $_GET['id_equipe'];
    $sql = "SELECT * FROM equipe WHERE id_equipe='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_equipe'];
            $name = $row['nom_equipe'];
            $date = $row['date_creation'];
        }
    ?>



<!doctype html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>DataWare</title>
</head>

<body>
    <div>
        <div>
            <div>
                    <h2>Edit equipe record:</h2>
                    
                    <form action="" method="post">
                        <div>
                        <input type="hidden" name="id_equipe" value="<?php echo $id; ?>">
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nom Equipe</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="nom_equipe" value="<?php echo $name; ?>" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="" class="block text-sm font-medium leading-6 text-gray-900">Date de Création</label>
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <input type="text" name="date_creation" value="<?php echo $date; ?>" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                        <button type="submit" name="edit">Save changes</button>
                    </form>
            </div>

            <div class="">
                <a href="dashboards.php">Go back</a>
            </div>
        </div>
    </div>
</body>
</html>


    <?php
    } else{
        header('Location: dashboards.php');
    }
}
?>









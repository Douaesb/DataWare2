<?php
include "connection.php";
if (isset($_POST['editproject'])) {
    $id = $_POST['id_pro'];
    $name = $_POST['nom_pro'];
    $desc = $_POST['descrp_pro'];
    $sql = "UPDATE projet SET nom_pro='$name', descrp_pro='$desc' WHERE id_pro='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result == TRUE) {
        header('Location: dashboardp.php');
    }
}

if (isset($_GET['id_pro'])) {
    $id = $_GET['id_pro'];
    $sql = "SELECT * FROM projet WHERE id_pro='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_pro'];
            $name = $row['nom_pro'];
            $desc = $row['descrp_pro'];
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
                <div class="">
                    <h2>Modifier le projet</h2>
                    <form action="" method="post">
                        <div>
                        <input type="hidden" name="id_pro" value="<?php echo $id; ?>">
                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Nom projet</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="text" name="nom_pro" value="<?php echo $name; ?>" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="" class="block text-sm font-medium leading-6 text-gray-900">Description du projet</label>
                            <div class="relative mt-2 rounded-md shadow-sm">
                                <input type="text" name="descrp_pro" value="<?php echo $desc; ?>" id="" class="block rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <button type="submit" name="editproject">Save changes</button>
                    </form>
                </div>

                <div class="">
                    <a href="dashboardp.php">Go back</a>
                </div>

            </div>
            </div>
        </body>

        </html>


<?php
    } else {
        header('Location: dashboardp.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/dashboard.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>


    <?php include APPPATH . 'Views/navbar.php'; ?>

    <div class="main-wrapper">

        <?php include APPPATH . 'Views/header.php'; ?>

        <div class="card">
            <div class="header">
                <div class="heading">
                    <h2>College / Department</h2>
                </div>
                <div class="add-btn">
                    <a href="colleges/add" class="add-p">
                        Add New
                    </a>
                </div>
            </div>

            <div class="table-wrapper data-table">
                <table>
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>College Code</th>
                            <th style="text-align: left;">College Name</th>
                            <th>Actions</th>

                        </tr>
                    </thead>

                    <tbody>


                        <?php
                        foreach ($colleges as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['college_code'] . "</td>";
                            echo "<td style='text-align:left'>" . $row['college_name'] . "</td>";


                        ?>

                            <td><a href="<?= base_url('colleges/edit/' . $row['id']) ?>" class="material-icons">edit</a>
                                <a href="<?= base_url('colleges/delete/' . $row['id']) ?>" class="material-icons">delete</a>
                            </td>

                            </tr>

                        <?php
                        }
                        ?>




                    </tbody>
                </table>
            </div>

        </div>


    </div>

    </div>

</body>

</html>
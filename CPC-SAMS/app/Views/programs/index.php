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
          <h2>Programs</h2>
        </div>
        <div class="add-btn">
          <a href="programs/add" class="add-p">
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
              <th>Program Name</th>
              <th>Co ordinator</th>
              <th>Duration</th>
              <th>Total Semester</th>
              <th>Type</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

            <?php foreach ($programs as $program) : ?>
              <tr>
                <td><?= esc($program['id']) ?></td>
                <td><?= esc($program['college_code']) ?></td>
                <td><?= esc($program['program_name']) ?></td>
                <td><?= "-" ?></td>
                <td><?= esc($program['program_duration']) ?></td>
                <td><?= esc($program['total_semesters']) ?></td>
                <td><?= $program['program_type'] ? 'Integrated' : 'Masters' ?></td>
                <td>
                  <a href="<?= site_url('programs/edit/' . $program['id']) ?>">Edit</a> |
                  <a href="<?= site_url('programs/delete/' . $program['id']) ?>" onclick="return confirm('Are you sure?')" style="color: red;">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>

    </div>


  </div>

  </div>

</body>

</html>
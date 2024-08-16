<?php
$csvFilePath = 'registrations.csv';

if (!file_exists($csvFilePath)) {
    die('File not found');
}

$file = fopen($csvFilePath, 'r');

$data = [];
while (($row = fgetcsv($file)) !== false) {
    $data[] = $row;
}

fclose($file);

if (empty($data)) {
    echo 'No data available';
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrants List</title>
    <link rel="icon" href="https://phpsandbox.io/assets/img/brand/phpsandbox.png">
    <link rel="stylesheet" href="https://assets.ubuntu.com/v1/vanilla-framework-version-4.15.0.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .p-section--hero {
            padding: 40px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .p-section--hero h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        .p-section--shallow {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1rem;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 0.9rem;
                padding: 10px;
            }

            .p-section--hero h1 {
                font-size: 2rem;
            }

            .p-section--shallow {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<section class="p-section--hero">
  <div class="row--50-50-on-large">
    <div class="col">
      <h1>Registrants List</h1>
    </div>
  </div>
</section>

<section class="p-section--shallow">
    <div class="row--50-50-on-large">
        <div class="col">
            <table aria-label="Registrants Data">
                <thead>
                    <tr>
                        <th>Complete Name</th>
                        <th>Birthday</th>
                        <th>Age</th>
                        <th>Contact Number</th>
                        <th>Sex</th>
                        <th>Program</th>
                        <th>Complete Address</th>
                        <th>Email Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row[0]); ?></td>
                        <td><?php echo htmlspecialchars($row[1]); ?></td>
                        <td><?php echo htmlspecialchars($row[2]); ?></td>
                        <td><?php echo htmlspecialchars($row[3]); ?></td>
                        <td><?php echo htmlspecialchars($row[4]); ?></td>
                        <td><?php echo htmlspecialchars($row[5]); ?></td>
                        <td><?php echo htmlspecialchars($row[6]); ?></td>
                        <td><?php echo htmlspecialchars($row[7]); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

</body>
</html>

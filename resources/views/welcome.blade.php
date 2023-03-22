<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Data</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container" style="padding:0.5rem 5rem;">
        <h1>Vehicle Data</h1>
        <table id="vehicle-data" class="display">
            <thead>
                <tr>
                    <th>Licence Plate</th>
                    <th>Vehicle Type</th>
                    <th>Speed</th>
                    <th>Reported Date</th>
                    <th>X Coordinate</th>
                    <th>Y Coordinate</th>
                    <th>WKID</th>
                    <th>Geometry</th>
                </tr>
            </thead>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vehicle-data').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/webhook",
                "columns": [
                    { "data": "LicPlate" },
                    { "data": "VehicleType" },
                    { "data": "Speed" },
                    { "data": "ReportedDt" },
                    { "data": "XCoord" },
                    { "data": "YCoord" },
                    { "data": "Wkid" },
                    { "data": "Geometry" }
                ]
            });
        });
    </script>
</body>
</html>

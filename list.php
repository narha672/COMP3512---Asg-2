<!DOCTYPE html>
<html>
<head>
    <title>Stock Browser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Our style sheet  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- Top Navigation Menu -->
        <div class="topnav" id="myTopnav">
            <a href="index.php" class="active">Home</a>
            <a href="list.php">Companies</a>
        </div>

    <div style="background-color:#e5e5e5;padding:10px;text-align:center;">
        <h1>Companies</h1>
    </div>

    <div style="background-color:#ffffff;padding:10px;text-align:center;">
        <form id="filter-form">
            <label>Filter:</label>
            <input type="text" name="symbol" id="symbol" placeholder="Enter company symbol.." required>
            <button type="submit">Go</button><button id="btn-clear">Clear</button>
        </form>
    </div>

    <!-- <div id="list-container" style="overflow: none;"> -->
    <!-- style="height: 700px; overflow-y: scroll" -->
        <div id="zoom-div"><img id="zoom-image" src="http://localhost/stock/img/logos/A.svg"></div>
        <div id="loading" style="text-align:center;width:100px;height:100px;"><img style="width:80px;height: 80px;object-fit:cover;text-align:center;" src="img/loading.gif"></div>
        <table id="list-table"  style="height: 720px; overflow-y: scroll;">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Symbol</th>
                    <th colspan="2">Name</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
    <!-- </div> -->

    <script src="js/list.js"></script>
</body>
</html>
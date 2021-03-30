<?php
//all companies list with API 
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <title>companies</title>
    <meta charset=utf-8>
    <link href="css/style.css" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet">
</head>
<body >
    <section>
        <div class="header">
            <a href="#default" class="logo">Logo</a>
            <div class="header-right">
                <a href="#Home">Home</a>
                <a href="#About">About</a>
                <a href="#Companies">Companies</a>
            </div>
        </div>
    </section>
    <main class="ui segment doubling stackable grid container">
        <section class="four wide column">
            <form class="ui form" method="get" >

            <div class="field">
                <label>Company</label>
                <select class="ui fluid dropdown" name="museum">
                    <option value='0'>Select Company</option>  
                    <?php  
                    //put loop here to output the list of comapanies for now

                    ?>
                </select>
            </div>   
            <button class="small ui orange button" type="submit">
                <i class="filter icon"></i> Filter 
            </button>    
            </form>
        </section>
        <section class="twelve wide column">

        </section>  
    </main>
</body>
</html>
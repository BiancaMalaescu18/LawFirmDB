<?php
      $dbServername = "localhost";
    $bdUsername = "root";
    $dbPassword = "";
    $dbName = "colocviu";
    
    $conn = mysqli_connect ($dbServername, $bdUsername,$dbPassword,$dbName);


?>
<html>
    <head>
        <style>
            body {	
            background: linear-gradient(to bottom, #47476b, #666699, #8585ad, #a3a3c2, #d1d1e0 );
            background-size: 100%;
            background-repeat: no-repeat;
            }

            body:before{
            content:'';
            position: fixed;
            top: 0;
            bottom: 0;
            width: 100%;
            z-index: -1;
            background: linear-gradient(to right bottom, #060e30, #212b59 65%);
            }

            html {
            margin: 0;
            font-family: 'Muli', sans-serif;
            font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
            }

            body {
                margin: 0;
                font-size: 1.15rem;
                line-height: 1.4em;
            }
            
            #container {
                background-color: #35383d;
                margin: 20px ;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 3px 26px 0 rgba(0,0,0,0.20);
            }
            
            header{
                box-sizing: border-box;
            }
            
                main,header {
                background-color: #b6bac1;
                padding: 30px;
                border-radius: 10px;
                color: #6b6b6b;
                margin: 10px 0;
            }
            p{
                color:#1f1f2e;
                font-size: 20px;
            }
            h1,h2{
                color:  #29293d;
            }

         </style>
    </head>
    <body>
        <div id="container">
        <header><center><h1>Exercitiul 5b</h1></center></header>
        <header>
            <h3>&nbsp;Să se găsească numele avocaților care au exact un contract de asistență juridică.</h3>
            <br>
            <?php 
             
             $sql = "SELECT p.nume 'nume2'
                FROM Persoana p JOIN Contract_j c1 ON p.id_p = c1.id_avocat
                WHERE c1.id_avocat NOT IN (SELECT id_avocat 
			   FROM contract_j c2 
			   WHERE c1.id_cj != c2.id_cj);";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            echo "<table>  <tr>
            <th>Nume</th>
            ";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nume2"]. "</td><td></tr>";
                }
             echo "</table>";
            } else {
            echo "0 rezultate";
            }
            ?>
            <a  href="?pagina=index" class="btn btn-info" >Acasa</a>
            <br>
            
            
        </header>
        
        </div>
    </body>
</html>

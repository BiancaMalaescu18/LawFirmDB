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
        <header><center><h1>Exercitiul 3a</h1></center></header>
        <header>
            <h3>&nbsp;Să se găsească detaliile pentru contractele de asistență juridică din anul 2019 ce au numărul de pagini cuprins între 10 și 20.</h3>
            <br>
            <?php 
             
             $sql = "
                    SELECT DISTINCT r1.id_cj
                    FROM Rata r1
                    WHERE (SELECT SUM(r2.suma) 
                    FROM Rata r2 
                    WHERE r1.id_cj = r2.id_cj) <
                           (SELECT onorar
                            FROM Contract_j
                            WHERE id_cj = r1.id_cj);";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            echo "<table>  <tr>
            <th>Id_cj</th>
            ";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_cj"]. "</td></tr>";
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

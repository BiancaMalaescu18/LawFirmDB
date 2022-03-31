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
        <header><center><h1>Exercitiul 4b</h1></center></header>
        <header>
            <h3>&nbsp;Să se găsească (id_cj, id_r1, data1, suma1, id_r2, data2, suma2) pentru fiecare id_cj ce are cel puțin o rată achitată, cu condiția id_r1 și id_r2 sunt consecutive (1 cu 2 sau 3 cu 4.. etc.). Pentru număr impar de rate id_r2, data2, suma2 sunt necompletate.</h3>
            <br>
            <?php
                echo'<table>
                <tr>
                    <th>R1.Id_cj</th>
                    <th>R1.Id_r</th>
                    <th>R1.data</th>
                    <th>R1.suma</th>
                    <th>R2.id_r</th>
                    <th>R2.data</th>
                    <th>R2.suma</th>
                </tr>';

                   $result = mysqli_query($conn, "CALL Rata()");
             
                while($row = mysqli_fetch_array($result)) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["i1"]. "</td><td>" . $row["d1"]. "</td><td>" . $row["s1"]. "</td><td>" . $row["i2"]. "</td><td>" . $row["d2"]."</td><td>" . $row["s2"]."</td></tr>";
                }
                echo "</table>";   
             
                ?>
            <br>
            <a  href="?pagina=index" class="btn btn-info" >Acasa</a>
            
        </header>
        
        </div>
    </body>
</html>

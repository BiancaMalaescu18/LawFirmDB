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
        <header><center><h1>Exercitiul 3b</h1></center></header>
        <header>
            <h3>&nbsp;Să se găsească detaliile contractelor de muncă în ordine descrescătoare a salariului de bază pentru contractele de muncă cu comision 40%.</h3>
            <br>
             <form action="?pagina=3b" method="post">
                 <input name="numar"  type="text" required>
            <button type='submit'>Cauta</button>
            </form>
            <?php
            
            if(isset($_POST['numar']))
               {
                $numar =  $_POST['numar'];
               }
            else $numar = 0;
            
            if($numar != NULL)   
             {   
            $sql = "SELECT *FROM Contract_m 
                    WHERE comision='$numar'
                    ORDER BY salar_baza DESC;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            echo "<table>  <tr>
            <th>Id_cm</th>
                    <th>Data</th>
                    <th>Functie</th>
                    <th>Salar_baza</th>
                    <th>Comision</th>
                    <th>Id_cangajat</th>
            ";
           
           
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_cm"]. "</td><td>" . $row["data"]. "</td><td>" . $row["functie"]. "</td><td>" . $row["salar_baza"]. "</td><td>" . $row["comision"]. "</td><td>" . $row["id_angajat"]."</td></tr>";
                }
             echo "</table>";
            } else {
            echo "0 rezultate";
            }
            
             }
             else
            exit();
             
                ?>
            <br>
            <a  href="?pagina=3b" class="btn btn-info" >Revenire</a>
            
        </header>
        
        </div>
    </body>
</html>

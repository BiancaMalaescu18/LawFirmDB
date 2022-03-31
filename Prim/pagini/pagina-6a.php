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
        <header><center><h1>Exercitiul 6a</h1></center></header>
        <header>
            <h3>&nbsp;Să se găsească pentru fiecare nume de avocat valoarea medie a salariului pe anul 2019.</h3>
            <br>
            <?php 

                
                 $sql = "SELECT p.nume 'numele', ROUND(AVG(c1.salar_baza + (c2.onorar + c2.onorar * c1.comision)/100), 2)  'medie'
                FROM Contract_m c1, Contract_j c2, Persoana p
                WHERE c1.data >='2019-01-01' AND c1.data <='2019-12-31'
                AND id_avocat = id_p
                AND functie='Avocat'
                GROUP BY p.nume;";
                $result = $conn->query($sql);
                       echo'<table>
                <tr>
                    <th>Numele</th>
                    <th>Salarul</th>
                    
                </tr>';
             
                while($row = mysqli_fetch_array($result)) {
             
                echo "<tr><td>" . $row['numele']. "</td><td>".$row['medie']. "</td></tr>";
                
                }
                echo "</table>";
            
            
            ?>
            <br>
            <a  href="?pagina=index" class="btn btn-info" >Acasa</a>
            <br>
            
            
        </header>
        
        </div>
    </body>
</html>

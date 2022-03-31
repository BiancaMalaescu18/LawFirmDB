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
            h1{
                color:  #29293d;
            }

         </style>
    </head>
    <body>
        <div id="container">
        <header>
            <center><h1>Baza de date a unui cabinet de avocatura</h1></center><hr>
            <br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Se dau relaţiile:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Persoana(id_p, nume, email, adresa)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contract_j(id_cj, data, obiect, onorar, nr_pagini, id_client, id_avocat)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contract_m(id_cm, data, functie, salar_baza, comision, id_angajat)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rata(id_cj, id_r, data, suma)</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ce reprezintă schema bazei de date pentru un cabinet de avocatură. O persoană poate avea roluri de angajat (Contract_m este contract de muncă) sau client respectiv avocat (Contract_j este contract de asistență juridică). Onorariul aferent unui contract de asistență juridică se achită în rate. Comisionul obținut de avocat din onorariul unui contract de asistență juridică este stipulat procentual în contractul de muncă al avocatului (angajat al cabinetului de avocatură). Salariul unui avocat se calculează prin însumarea salariului de bază cu suma comisioanelor din contractele de asistență juridică din luna respectivă. În tabela Rata, coloana id_r ia valori 1, 2, 3 .. pentru un id_cj anume.</p>
            
           </header>
        </div>
    </body>
</html>
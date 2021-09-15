<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba</title>
    <style>
        body{
          font-family: sans-serif;
        }
        @page {
          margin: 160px 50px;
        }
        header { position: fixed;
          left: 0px;
          top: -160px;
          right: 0px;
          height: 100px;
          background-color: #ddd;
          text-align: center;
        }
        header h1{
          margin: 10px 0;
        }
        header h2{
          margin: 0 0 10px 0;
        }
        footer {
          position: fixed;
          left: 0px;
          bottom: -50px;
          right: 0px;
          height: 40px;
          border-bottom: 2px solid #ddd;
        }
        footer .page:after {
          content: counter(page);
        }
        footer table {
          width: 100%;
        }
        footer p {
          text-align: right;
        }
        footer .izq {
          text-align: left;
        }
      </style>
</head>
<body>
    <h1>Ver PDF</h1>
    <h1>go go go</h1>
    <body>
        <header>
          <h1>Cabecera de mi documento</h1>
          <h2>DesarrolloWeb.com</h2>
        </header>
        <footer>
          <table>
            <tr>
              <td>
                  <p class="izq">
                    Desarrolloweb.com
                  </p>
              </td>
              <td>
                <p class="page">
                  Página
                </p>
              </td>
            </tr>
          </table>
        </footer>
        <div id="content">
          <p>
            Lorem ipsum dolor sit...
          </p><p>
          Vestibulum pharetra fermentum fringilla...
          </p>
          <p style="page-break-before: always;">
          Podemos romper la página en cualquier momento...</p>
          </p><p>
          Praesent pharetra enim sit amet...
          </p>
        </div>
  
    
</body>
</html>


 
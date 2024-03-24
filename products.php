<?php 
include 'librerie/libreria.php';

$currentPage = 'products';


$db = new Database();

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>

  
  <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        dis
        play: block !important;
      }

      table {
          font-size: 20px;
          padding: 13px; 

          .disabled {
          pointer-events: none;
        }

        .opacity-50 {
          opacity: 0.5; 
        }

        .dataTables_wrapper .dt-buttons {
          float:none;  
          text-align:center;
        }
      }
  </style>
<?php librerie() ;?>

 <?php iconeSvg(); ?>

</head>
<body>
    

<?php echo getHeader();?>

<div class="container-fluid">
  <div class="row">
    <?php echo getSideBar($currentPage);?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Inserisci un nuovo prodotto
          <svg class="bi currency-euro .text-secondary-emphasis mb-1" role="img" aria-label="Tools">
            <use xlink:href="icon/bootstrap-icons.svg#plus-circle-fill"/> 
          </svg>
          </h1>
          
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi"><use xlink:href="#calendar3"/></svg>
              This week
            </button>
          </div>
          
        </div>

        <div class="card">
          <div class="card-header">
            Prodotti
          </div>
          <div class="card-body">
            
            <form>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="nome" class="form-control" />
                    <label class="form-label" for="nome">Nome</label>
                  </div>
                </div>
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="fornitore" class="form-control" />
                    <label class="form-label" for="fornitore">Fornitore</label>
                  </div>
                </div>
              </div>
              <!-- Text input -->
              <div class="input-group ">
                <span class="input-group-text" id="basic-addon1">
                  <svg class="bi currency-euro .text-primary" role="img" aria-label="Tools">
                    <use xlink:href="icon/bootstrap-icons.svg#currency-euro"/> 
                  </svg>
                </span>
                <input type="text" class="form-control" id="prezzo" placeholder="inserisci" aria-label="inserisci" aria-describedby="basic-addon1">
              </div>
              <label class="form-label mb-4" for="prezzo">Prezzo</label>
            </form> 
          
          
            <button  class="btn btn-primary" onclick="apriModal()">Inserisci</button>
            
          </div>
        </div>
      
        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
        
        <br><br><br><br>
        
        <br><br>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h2>Prodotti inseriti</h2>
      </div>
        <main id="main-content" class="container-fluid p-1  my-4 ">
            <div class="col">
              <div class="card-wrapper card-space">
                <div class="card card-bg card-big ">
                  <div class="card-header">
                    Elenco prodotti
                  </div>

                  <div class="card-body">
                  <div class="d-flex justify-content-left flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

                      <div class="col-md-2 ">
                          <label class="active" for="tipo">Data inizio</label>
                          <input name="data_inizio" id="data_inizio" type="date" class="form-control input-xs it-date-datepicker" required value="<?php echo $pdata_inizio; ?>">
                      </div>

                      <div class="col-md-2 ms-3">
                          <label class="active" for="tipo">Data fine</label>
                          <input name="data_fine" id="data_fine" type="date" class="form-control input-xs it-date-datepicker" required value="<?php echo $pdata_inizio; ?>">
                      </div>

                      <div class="col-3 ms-4 mt-4"> 
                        <a href="#" class="btn btn-primary" onclick="cerca()">Cerca</a>
                      </div>

                    </div>


                    <div class="table-responsive small">
                      <table id="prodotti" class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Prodotto</th>
                            <th scope="col">Fornitore</th>
                            <th scope="col">Prezzo</th>
                          </tr>
                        </thead>
                        <tbody id="tbodyProdotti">
                          <?php 
                          $result = $db->conn->query("SELECT * FROM prodotti");

                          // Costruisci il formato HTML della tabella
                          
                          while ($row = $result->fetch_assoc()) {
                              echo "<tr>";
                              echo "<td>" . $row['idProdotto'] . "</td>";
                              echo  "<td>" . $row['Nome'] . "</td>";
                              echo  "<td>" . $row['fornitore'] . "</td>";
                              echo  "<td>" . $row['prezzo'] ."€". "</td>";
                              echo  "</tr>";
                          }
                          
                          
                          ?>
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>
        </main> 
        <br><br><br><br>
      </main>
  </div>
</div>



<!-- MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="ciao" aria-labelledby="modal_stampaTitle">
      <div class="modal-dialog  " role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h2 class="modal-title h5 " id="ciao">Attenzione</h2>
        
                  
              </div>
              <div class="modal-body">
      
              <p>Stai per inserire un nuovo prodotto nel tuo sito, vuoi continuare?</p>

              </div>
              <div class="modal-footer">
                  <hr>
                  <button class="btn btn-success btn-sm" data-bs-dismiss="modal" type="submit" id="conf" name="conf" value="true" onclick="inserisciProdotto()">Conferma</button>
                  <button class="btn btn-danger btn-sm" data-bs-dismiss="modal" id="alt" name="alt" type="button" onclick="chiudimodal()">Annulla</button>
              </div>
          </div>
      </div>
  </div>
  <script src="js/funzioni.js"></script>

<script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
<!-- DATATABLE  -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script>
  $('#prodotti').DataTable({
    "paging": true,
    "info": false,
    "searching": false,
    dom: 'Bfrtip',
          buttons: {
    buttons: [
          { extend: 'excel', className: 'excelButton', text: 'Estrai excel'},
            {
              extend: 'pdf',
              className: 'pdfButton',
              margin: [15,15,15,15], // top, right, bottom, left

              text: 'Estrai PDF',
              orientation: 'portrait', // Puoi scegliere 'portrait' o 'landscape'
              pageSize: 'A4' // Altre opzioni possibili sono 'A3', 'A5', ecc.
          }

              ],
      dom: {
    button: {
    className: 'btn btn-xs btn-outline-primary'
          }
      }
    }

  });

</script>
<!-- CHIAMATE AJAX  -->
<script>




  function apriModal(){
    $('#ciao').modal('show');
  }


  function inserisciProdotto(){

    $('#conferma').modal('hide')
    var nome = $('#nome').val();
    var fornitore = $('#fornitore').val();
    var prezzo = $('#prezzo').val();
    $.ajax({
      type: "POST",
      url: 'action.php?_action=inserisciProdotto&_nome='+encodeURIComponent(nome)+"&_fornitore="+encodeURIComponent(fornitore)+"&_prezzo="+encodeURIComponent(prezzo),
      cache: false,
      contentType: false,
      processData: false,
      success: function (result)
      {
        console.log("funz")
        location.reload();


      },
      error: function () 
      {
        console.log("Chiamata fallita, si prega di riprovare...");
      }
    });
  }


  function aggiornaTabella(){

    $.ajax({
      type: "POST",
      url: 'action.php?_action=RecuperoProdotti&_nome='+encodeURIComponent(nome),
      cache: false,
      contentType: false,
      processData: false,
      success: function (result)
      {
        $("#tbodyProdotti").append(result);

      },
      error: function () 
      {
        console.log("Chiamata fallita, si prega di riprovare...");
      }
    });

  }


  function chiudimodal() {
      $('#conferma').modal('hide')
  }



</script>

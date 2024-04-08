
<?php
include 'librerie/libreria.php';
include 'librerie/libreria_metodi.php';

$currentPage = 'orders';


$db = new Database();


$prodotto;

$prodottiArray= get_db_array("prodotti");


$ordiniArray= get_db_array("ordini");
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script>

  <?php librerie() ;?>
  <?php iconeSvg(); ?>
</head>
<body>

  <?php echo iconeSvg();?>

  <?php echo getHeader();?>
      

  <div class="container-fluid">
    <div class="row">
    <?php echo getSideBar($currentPage);?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Ordini</h1>
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
                  <select class="form-select form-select-lg mb-3" aria-label="Large select example"
                        name="idsl_disponibilita" id="idsl_disponibilita" onchange="cambiaPrezzo();">
                        <option selected>Open this select menu</option>
                        <?php
                          foreach ($prodottiArray as $row) {
                              echo '<option value="' . $row['idProdotto']. '">' .  $row['Nome'] . '</option>';												
                          }
                        ?>
                  </select>
                  </div>
                </div>
                <div class="col">
                <div class="input-group ">
                  <span class="input-group-text" id="basic-addon1">
                    <svg class="bi currency-euro .text-primary" role="img" aria-label="Tools">
                      <use xlink:href="icon/bootstrap-icons.svg#currency-euro"/> 
                    </svg>
                  </span>
                  <input type="text" class="form-control" id="prezzo" placeholder="inserisci" aria-label="inserisci" aria-describedby="basic-addon1">
                </div>
                </div>
              </div>
            
              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="fornitore" class="form-control" />
                <label class="form-label" for="fornitore">fornitore</label>
              </div>
            
              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="form6Example4" class="form-control" />
                <label class="form-label" for="form6Example4">Address</label>
              </div>

              <div class="col-lg-3">
                  <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="quantity-left-minus btn  "  data-type="minus" data-field="">
                            <svg class="bi currency-euro .text-primary" role="img" aria-label="Tools">
                              <use xlink:href="icon/bootstrap-icons.svg#dash-circle"/> 
                            </svg>                                       
                          </button>
                      </span>
                      <div class="col-2">
                        <input type="text" id="quantity" name="quantity" class="form-control "  value="1" min="1" max="100"  >
                      </div>
                      <span class="input-group-btn">
                          <button type="button" class="quantity-right-plus btn  " data-type="plus" data-field="">
                          <svg class="bi currency-euro .text-primary" role="img" aria-label="Tools">
                            <use xlink:href="icon/bootstrap-icons.svg#plus-circle"/> 
                          </svg>
                          </button>
                      </span>
                  </div>
              </div>
            
              <!-- Submit button -->
              <button data-mdb-ripple-init type="button" class="btn btn-primary btn-block mb-4 mt-3" >Place order</button>
            </form>       
              <a href="#" class="btn btn-primary" onclick="prova()">Inserisci</a>
          </div>
        </div>
      
        <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

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
                    

                          foreach ($ordiniArray as $row) {
                            echo "<tr>";
                            echo "<td>" . $row['id_ordine'] . "</td>";
                            echo "<td>" . $row['id_prodotto'] . "</td>";
                            echo "<td>" . $row['prezzo'] . "</td>";
                            echo "<td>" . $row['quantita'] . "€" . "</td>";
                            echo "</tr>";
                        }
                          // Stampa il prezzo totale

                          ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </main> 
      </main>
    </div>
  </div>
  
  <button onclick="cambiaPrezzo()">okokok</button>
  <canvas class="my-4 w-100" id="myChart" width="1522" height="642" style="display: block; box-sizing: border-box; height: 514px; width: 1218px;"></canvas>

  <script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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
    "searching": true,
    dom: 'Bfrtip',
          buttons: {
    buttons: [
          { extend: 'excel', className: 'excelButton', text: 'Estrai excel'},
            {
              extend: 'pdf',
              className: 'pdfButton',
              margin: [15,15,15,15], // top, right, bottom, left

              text: 'Estrai PDF',
              orientation: 'landscape', // Puoi scegliere 'portrait' o 'landscape'
              pageSize: 'A5' // Altre opzioni possibili sono 'A3', 'A5', ecc.
          }

              ],
      dom: {
    button: {
    className: 'btn btn-xs btn-outline-primary'
          }
      }
    }

  });
  document.getElementById("navbar").addEventListener("click", function(e) {

  if(e.target.matches(".nav-link")) {

    // chiama la funzione definita in funzioni.js
    activeClass();

  }

  });
  </script>

</body>
</html>




<!-- CHIAMATE AJAX  -->
<script>
  
  
  $(document).ready(function(){

    var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
    var prezzo = $('#prezzo').val();


        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);
            //raddoppio il value del prezzo se incrementa
            var prezzoMoltiplicato = prezzo * 2;
            $('#prezzo').val(prezzoMoltiplicato);

 
          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
      var prezzo = $('#prezzo').val();

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>1){
            $('#quantity').val(quantity - 1);
            var prezzoDiviso = prezzo / 2 ;
            $('#prezzo').val(prezzoDiviso);

            }
    });
    
});


  function cambiaPrezzo() {
    var id = $('#idsl_disponibilita').val();
    var prezzo ;
    $.ajax({
        type: "POST",
        url: 'action.php?_action=recuperaProdNome&_k='+encodeURIComponent(id),
        cache: false,
        contentType: false,
        processData: false,
        success: function (result)
        {

          $('#prezzo').val(result);
      
      // Imposta il testo restituito nell'elemento con id 'prezzo_text'
          // $('#prezzo').text(result);

          console.log(result);

        },
        error: function () 
        {
          console.log("Chiamata fallita, si prega di riprovare...");
        }
      });

  }


  function prova(){
    var idProdotto = $('#idsl_disponibilita').val();
    var prezzo = $('#prezzo').val();
    var quantita = $('#quantity').val();

     alert(idProdotto + prezzo + quantita);
    $.ajax({
			type: "POST",
      url: 'action.php?_action=inserisciOrdine&_id='+encodeURIComponent(idProdotto)+"&_prezzo="+encodeURIComponent(prezzo)+"&_quantita="+encodeURIComponent(quantita),
			cache: false,
			contentType: false,
			processData: false,
			success: function (result)
			{

				alert(result)

			},
			error: function () 
			{
				console.log("Chiamata fallita, si prega di riprovare...");
			}
		});
  }

</script>

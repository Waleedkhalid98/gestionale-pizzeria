
<?php
include 'librerie/libreria.php';
$currentPage = 'orders';

$db = new Database();

$prodotto;

$result = $db->conn->query("SELECT * FROM prodotti");

 while ($row = $result->fetch_assoc()) {
    $result_array[] = $row;
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
 

    <style>
      /* #quantity.form-control {
          width: 5% !important;
        } */
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
        display: block !important;
      }
    </style>

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
                         foreach ($result_array as $row) {
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
                        </svg>                                        </button>
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
    
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>Section title</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<button onclick="cambiaPrezzo()">okokok</button>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  
document.getElementById("navbar").addEventListener("click", function(e) {

if(e.target.matches(".nav-link")) {

  // chiama la funzione definita in funzioni.js
  activeClass();

}

});
</script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
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
    var prd = $('#quantity').val();

     alert(idProdotto + prezzo + prd);
  //   $.ajax({
	// 		type: "POST",
	// 		url: 'action.php?_action=inserisciProdotto&_nome='+encodeURIComponent(idProdotto)+'&_prezzo=30'+'&_fornitore=ciao',
	// 		cache: false,
	// 		contentType: false,
	// 		processData: false,
	// 		success: function (result)
	// 		{

	// 			alert(result)

	// 		},
	// 		error: function () 
	// 		{
	// 			console.log("Chiamata fallita, si prega di riprovare...");
	// 		}
	// 	});
  }

</script>

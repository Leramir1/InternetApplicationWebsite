<!--Allen Thich, Jimmy Wu, Luis Ramirez, Vonnie Wu-->

<html>
<head>
  <script type="text/javascript" src="jquery.js"></script>
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.min.js"></script>

 <style>
table{
  background-color: beige;
}
th {
 color:#531C53
}
th, td {
text-align: center;
}
body {
 background-color:beige;
}
.btn-primary{
  background-color: #5C7A84;
  border-color: #5C7A84;
}
pre{
  background-color: beige;
}
table-hover{
  background-color: #A49480; 
}
.modal-body p {
    word-wrap: break-word;
}
</style>

<script>
function pageRedirection(product_id) {

  window.location.href("productdetails.php");
}
</script>

</head>
<body>
  <div class="container-fluid">
    <div class="container">
    <center><h1 style="font-size:58px; display:inline-block; color:#5C7A84">Balls To The Walls Emporium</h1></center>

  <?php
echo "<pre>\n";
require_once "pdo.php";
$stmt = $pdo->query("SELECT name, item_id, price, color, description, shape, circumference, weight, material, photo FROM Product");

echo '<table class="table table-hover">' . "\n";
echo ('<thead>
      <th>Product</th>
      <th>Price</th>
      <th>Color</th>
      <th>Image</th>
      </thead>');
try {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $getTax = "SELECT * FROM taxbystate WHERE state = '" . $_POST['State'] . "'";
      $tax = $pdo->prepare($getTax);
      // $tax->bindParam('?', $_POST['State']);
      $tax->execute(array(
        ':stateTax' => $_POST['State']));
      // $taxDoc = $tax->fetchAll();
      $taxDoc = $tax->fetch(PDO::FETCH_ASSOC);

      // echo("<pre>" . $taxDoc['tax'] . " tax </pre>");
      // echo("<pre>" . $row['price'] . " price </pre>");
      $total = ($_POST['quantity'] * 19.99) + (($_POST['quantity'] * 19.99) * $taxDoc['tax']);

      $_POST['total'] = number_format((float)$total, 2, '.', '');

      echo "<tbody><tr><td>";
      echo ($row['name']);
      echo ("</td><td>");
      echo ($row['price']);
      echo ("</td><td>");
      echo ($row['color']);
      echo ("</td><td>\n");
      echo ("<div class=\"row\"><img src=\"../resources/");
      echo ($row['photo']);
      echo ("\" alt=\"Image not found\" width=\"150\" height=\"150\" class=\"productImage\"></div>");
      echo ("
        <div class=\"row\">
  <button type=\"button\" class=\"btn btn-primary btn-lg\" data-toggle=\"modal\" data-target=\"#");
      echo ($row['item_id']);
      echo ("\">
    View Product
  </button>
  </div>

  <div class=\"modal fade\" id=\"");
      echo ($row['item_id']);
      echo ("\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
    <div class=\"modal-dialog modal-lg\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
          <h4 class=\"modal-title\" id=\"myModalLabel\">");
      echo ($row['name']);
      echo ("</h4>
        </div>
        <div class=\"modal-body\">
        <div class=\"row\">
          <div class=\"col-md-6 \">");

      echo("<h4 style=\"text-align: left\">Item id: </h4><p style=\"text-align: left\">");
      echo($row['item_id']);
      echo("</p><br>");

      echo("<h4 style=\"text-align: left\">Price: </h4><p style=\"text-align: left\">");
      echo ($row['price']);
      echo("</p><br>");

      echo("<h4 style=\"text-align: left\">Color: </h4><p style=\"text-align: left\">");
      echo ($row['color']);
      echo("</p><br>");

      echo("<h4 style=\"text-align: left\">Description: </h4><p style=\"text-align: left\">");
      echo ($row['description']);
      echo("</p><br>");
      
      echo("<h4 style=\"text-align: left\">Shape: </h4><p style=\"text-align: left\">");
      echo ($row['shape']);
      echo("</p><br>");
      
      echo("<h4 style=\"text-align: left\">Circumference: </h4><p style=\"text-align: left\">");
      echo ($row['circumference']);
      echo("</p><br>");
      
      echo("<h4 style=\"text-align: left\">Weight: </h4><p style=\"text-align: left\">");
      echo ($row['weight']);
      echo("</p><br>");
      
      echo("<h4 style=\"text-align: left\">Material: </h4><p style=\"text-align: left\">");
      echo ($row['material']);
      echo("</p><br>");

      echo ("<div class=\"row\"><img src=\"../resources/");
      echo ($row['photo']);
      echo ("\" alt=\"Image not found\" width=\"150\" height=\"150\" class=\"productImage\"></div>");
      echo ("</div>");
      echo ("
          <div class=\"col-md-6\">
          <form method=\"POST\" role=\"form\">
              First Name:<br>       
              <input id=\"firstname\" type=\"text\" name=\"firstname\" required><br><br>
              Last Name:<br>
              <input id=\"lastname\" type=\"text\" name=\"lastname\" required><br><br>
              Phone Number:<br>
              <input id=\"telephone\" type=\"tel\" name=\"phonenumber\" required><br><br>
              E-mail Address:<br>
              <input id=\"email\" type=\"email\" name=\"email\" required><br><br>
              Quantity:<br>
              <input id=\"quantity\" type=\"number\" min=\"0\" name=\"quantity\" required><br><br>
              Item ID:<br>
              <input id=\"itemid\" type=\"number\" name=\"itemid\" disabled required value=\"");
      echo($row['item_id']);
      echo("\">
          <input type=\"hidden\" name=\"item\" value=\"");
      echo($row['item_id']);
      echo("\"><br><br>
              Credit Card Number:<br>
              <input id=\"ccnum\" type=\"number\" name=\"creditcard\" required><br><br>
              Exp Month/Year:
              <select id=\"month\" name=\"Month\">
                  <option value=\"1\">1</option>
                  <option value=\"2\">2</option>
                  <option value=\"3\">3</option>
                  <option value=\"4\">4</option>
                  <option value=\"5\">5</option>
                  <option value=\"6\">6</option>
                  <option value=\"7\">7</option>
                  <option value=\"8\">8</option>
                  <option value=\"9\">9</option>
                  <option value=\"10\">10</option>
                  <option value=\"11\">11</option>
                  <option value=\"12\">12</option>
              </select>
              <select id=\"year\" name=\"Year\">
                  <option value=\"2016\">16</option>
                  <option value=\"2017\">17</option>
                  <option value=\"2018\">18</option>
                  <option value=\"2019\">19</option>
                  <option value=\"2020\">20</option>
                  <option value=\"2021\">21</option>
                  <option value=\"2022\">22</option>
                  <option value=\"2023\">23</option>
                  <option value=\"2024\">24</option>
                  <option value=\"2025\">25</option>
                  <option value=\"2026\">26</option>
                  <option value=\"2027\">27</option>                
              </select><br><br>
              Address:<br>
              <input id=\"address\" type=\"text\" name=\"address\" required><br><br>
              City:<br>
              <input id=\"city\" type=\"text\" name=\"city\" required><br><br>
              State<br>
              <select id=\"state\" name=\"State\">
                  <option value=\"AL\">AL</option>
                  <option value=\"AK\">AK</option>
                  <option value=\"AS\">AS</option>
                  <option value=\"AZ\">AZ</option>
                  <option value=\"AR\">AR</option>
                  <option value=\"CA\">CA</option>
                  <option value=\"CO\">CO</option>
                  <option value=\"CT\">CT</option>
                  <option value=\"DE\">DE</option>
                  <option value=\"DC\">DC</option>
                  <option value=\"FL\">FL</option>
                  <option value=\"GA\">GA</option>
                  <option value=\"GU\">GU</option>
                  <option value=\"HI\">HI</option>
                  <option value=\"ID\">ID</option>
                  <option value=\"IL\">IL</option>
                  <option value=\"IN\">IN</option>
                  <option value=\"IA\">IA</option>
                  <option value=\"KS\">KS</option>
                  <option value=\"KY\">KY</option>
                  <option value=\"LA\">LA</option>
                  <option value=\"ME\">ME</option>
                  <option value=\"MD\">MD</option>
                  <option value=\"MH\">MH</option>
                  <option value=\"MA\">MA</option>
                  <option value=\"MI\">MI</option>
                  <option value=\"FM\">FM</option>
                  <option value=\"MN\">MN</option>
                  <option value=\"MS\">MS</option>
                  <option value=\"MO\">MO</option>
                  <option value=\"MT\">MT</option>
                  <option value=\"NE\">NE</option>
                  <option value=\"NV\">NV</option>
                  <option value=\"NH\">NH</option>
                  <option value=\"NJ\">NJ</option>
                  <option value=\"NM\">NM</option>
                  <option value=\"NY\">NY</option>
                  <option value=\"NC\">NC</option>
                  <option value=\"ND\">ND</option>
                  <option value=\"MP\">MP</option>
                  <option value=\"OH\">OH</option>
                  <option value=\"OK\">OK</option>
                  <option value=\"OR\">OR</option>
                  <option value=\"PW\">PW</option>
                  <option value=\"PA\">PA</option>
                  <option value=\"PR\">PR</option>
                  <option value=\"RI\">RI</option>
                  <option value=\"SC\">SC</option>
                  <option value=\"SD\">SD</option>
                  <option value=\"TN\">TN</option>
                  <option value=\"TX\">TX</option>
                  <option value=\"UT\">UT</option>
                  <option value=\"VT\">VT</option>
                  <option value=\"VA\">VA</option>
                  <option value=\"VI\">VI</option>
                  <option value=\"WA\">WA</option>
                  <option value=\"WV\">WV</option>
                  <option value=\"WI\">WI</option>
                  <option value=\"WY\">WY</option>
              </select><br><br>
              Shipping:<br>
              <select id=\"ship\" name=\"Shipping\">
                  <option value=\"Overnight\">Overnight</option>
                  <option value=\"2Day\">2-Day Expedited</option>
                  <option value=\"6Day\">6-Day Ground</option>
              </select><br><br>
          <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cancel</button>
          <button value=\"Place Order\" type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Place Order</button>
        </form>

          </div>
          </div>
        </div>
      </div>
    </div>
  </div>");
      echo ("</td></tr></tbody>\n");

      echo("
      <div class=\"modal fade\" id=\"confirm-");
      echo ($row['item_id']);
       echo("\"tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog modal-lg\" role=\"document\">
          <div class=\"modal-content\">
              <h4 style=\"text-align:center\" class=\"modal-title\" id=\"myModalLabel\">Order Confirmation:");
            echo ($row['name']);
            echo("
              </h4>
            <div style=\"text-align: center\" class=\"modal-body\">");
              echo("<div class=\"row\">
                <div class=\"col-md-6\">");
                  echo("<h4>Item id: </h4><p>");
                  echo($row['item_id']);
                  echo("</p><br>");

                  echo("<h4>Price: </h4><p>");
                  echo ($row['price']);
                  echo("</p><br>");

                  echo("<h4>Quantity: </h4><p>");
                  echo ($_POST['quantity']);
                  echo("</p><br>");

                  echo("<h4>Color: </h4><p>");
                  echo ($row['color']);
                  echo("</p><br>");

                  echo("<h4>Tax Rate by State: </h4><p>");
                  echo ($taxDoc['tax']);
                  echo("</p><br>");

                  echo("<h4>Tax: </h4><p>");
                  $taxTotal = number_format((float)(($_POST['quantity'] * 19.99) * $taxDoc['tax']), 2, '.', '');
                  echo ($taxTotal);
                  echo("</p><br>");

                  echo("<h4>Total Price: </h4><p>");
                  echo ($_POST['total']);
                  echo("</p><br>");

                echo("</div>");
                echo("<div class=\"col-md-6\">");
                  echo("<h4>Name: </h4><p>");
                  echo ($_POST['firstname'] . " " .$_POST['lastname']);
                  echo("</p><br>");

                  echo("<h4>Phone: </h4><p>");
                  echo ($_POST['phonenumber']);
                  echo("</p><br>");

                  echo("<h4>Address: </h4><p>");
                  echo ($_POST['address'] . ", " .$_POST['State']);
                  echo("</p><br>");

                  echo("<h4>Shipping Method: </h4><p>");
                  echo ($_POST['Shipping']);
                  echo("</p><br>");


              echo("</div></div>");
                  echo ("<div class=\"row\"><img src=\"../resources/");
                  echo ($row['photo']);
                  echo ("\" alt=\"Image not found\" width=\"150\" height=\"150\" class=\"productImage\"></div>");
            echo("</div>
            <div class=\"modal-footer\">
              <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">OK</button>
            </div>
          </div>
        </div>
      </div>
        ");
          
  }
if(isset($_POST['submit']))
    {
      // $getTax = "SELECT * FROM taxbystate WHERE state = '" . $_POST['State'] . "'";
      // $tax = $pdo->prepare($getTax);
      // // $tax->bindParam('?', $_POST['State']);
      // $tax->execute(array(
      //   ':stateTax' => $_POST['State']));
      // // $taxDoc = $tax->fetchAll();
      // $taxDoc = $tax->fetch(PDO::FETCH_ASSOC);

      // // echo("<pre>" . $taxDoc['tax'] . " tax </pre>");
      // // echo("<pre>" . $row['price'] . " price </pre>");
      // $total = ($_POST['quantity'] * 19.99) + (($_POST['quantity'] * 19.99) * $taxDoc['tax']);

      // $_POST['total'] = number_format((float)$total, 2, '.', '');
      // echo "<pre>";
      // print_r($_POST);
      // echo "</pre>";
      $sql = "INSERT INTO transaction (first_name, last_name, phone, email, quantity, item_id,
        cc_num, exp_month, exp_year, address, city, state, shipping) VALUES (:firstname, 
        :lastname, :phonenumber, :email, :quantity, :itemid, :creditcard, :Month, :Year, :address, :city,
        :State, :Shipping)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
          ':firstname' => $_POST['firstname'], 
          ':lastname' => $_POST['lastname'], 
          ':phonenumber' => $_POST['phonenumber'],
          ':email' => $_POST['email'], 
          ':quantity' => $_POST['quantity'],
          ':itemid' => $_POST['item'],
          ':creditcard' => $_POST['creditcard'], 
          ':address' => $_POST['address'],
          ':city' => $_POST['city'], 
          ':Year' => $_POST['Year'],
          ':Month' => $_POST['Month'], 
          ':State' => $_POST['State'],
          ':Shipping' => $_POST['Shipping']))
          ?>
          <script>
            $('#confirm-' + <?php echo $_POST['item']; ?>).modal('show');
          </script>
          <?php
      }
} catch (PDOException $e) {
  echo $e->getMessage();
}
echo "</table>\n";



?>
</div>
</div>
</body>
</html>


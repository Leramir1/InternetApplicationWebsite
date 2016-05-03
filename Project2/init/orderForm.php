<?php
require_once "pdo.php";
if(isset($_POST['firstname']) && 
    isset($_POST['lastname']) && 
    isset($_POST['phonenumber']) &&
    isset($_POST['email']) && 
    isset($_POST['quantity']) &&
    isset($_POST['itemid']) &&
    isset($_POST['creditcard']) && 
    isset($_POST['address']) &&
    isset($_POST['city']) && 
    isset($_POST['Year']) &&
    isset($_POST['Month']) && 
    isset($_POST['State']) &&
    isset($_POST['Shipping']))
{
  $sql = "INSERT INTO Transaction (first_name, last_name, phone, email, quantity, item_id,
    cc_num, exp_month, exp_year, address, city, state, shipping) VALUES (:firstname, 
    :lastname, :phonenumber, :email, :quantity, :itemid, :creditcard, :address, :city, :Year, :Month,
    :State, :Shipping)";
echo("<pre>\n".$sql."\n</pre>\n");
$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    ':firstname' => $_POST['firstname'], 
    ':lastname' => $_POST['lastname'], 
    ':phonenumber' => $_POST['phonenumber'],
    ':email' => $_POST['email'], 
    ':quantity' => $_POST['quantity'],
    ':itemid' => $_POST['itemid'],
    ':creditcard' => $_POST['creditcard'], 
    ':address' => $_POST['address'],
    ':city' => $_POST['city'], 
    ':Year' => $_POST['Year'],
    ':Month' => $_POST['Month'], 
    ':State' => $_POST['State'],
    ':Shipping' => $_POST['Shipping']));
}
?>
<html>
    <head>
        <script>
            function getEmailBody() {
                var firstName = document.getElementById("firstname").value;
                var lastName = document.getElementById("lastname").value;
                var email = document.getElementById("email").value;
                var quantity = document.getElementById("quantity").value;
                var itemid = document.getElementById("itemid").value;
                var ship = document.getElementById("ship").value;
                var address = document.getElementById("address").value;
                var city = document.getElementById("city").value;
                var state = document.getElementById("state").value;
                var ccard = document.getElementById("ccnum").value;
                var cardMonth = document.getElementById("month").value;
                var cardYear = document.getElementById("year").value;
                hello
                var totalCost = 19.99 * quantity;
                var formattedMailtoLink = "mailto:" + email + "?Subject=Balls To The Walls Emporium: Thank you for your order&Body=" + 
                        "Here's your purchase information: %0D%0AProduct Name: " + "Basketball" + 
                        "%0D%0AQuantity: " + quantity + "%0D%0AItem ID: " + itemid + "%0D%0AShipping method: " + ship + 
                        "%0D%0AShipping address: " + address + "%0D%0ACity: " + city + "%0D%0AState: " + state + "%0D%0A%0D%0ATotal Cost: " + totalCost +
                        "%0D%0ACredit Card Number: " + ccard + "%0D%0ACard Expiration: " +  cardMonth + "/" + cardYear;
                // document.getElementById("submitAnchor").setAttribute("href", formattedMailtoLink);
                if (formIsValid()){
                    var a = document.createElement('a');
                    a.href = formattedMailtoLink;
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
            }
            
            function formIsValid() {
                var firstName = document.getElementById("firstname").value;
                var lastName = document.getElementById("lastname").value;
                var email = document.getElementById("email").value;
                var quantity = document.getElementById("quantity").value;
                var itemid = document.getElementById("itemid").value;
                var ship = document.getElementById("ship").value;
                var address = document.getElementById("address").value;
                var city = document.getElementById("city").value;
                var state = document.getElementById("state").value;
                var ccard = document.getElementById("ccnum").value;

                if (firstName && lastName && email && quantity && itemid && ship && address && city && state && ccard)
                {
                    return true;
                }
                return false;
            }

        </script>
    </head>
    <style>
        body {
            margin: 5%;
            background-color: beige;
        }
        
        td.thick {
            font-weight: bold;
        }
    </style>
    <body>
        
        <form method="post">
            First Name:<br>       
            <input id="firstname" type="text" name="firstname" required><br><br>
            Last Name:<br>
            <input id="lastname" type="text" name="lastname" required><br><br>
            Phone Number:<br>
            <input id="telephone" type="tel" name="phonenumber" required><br><br>
            E-mail Address:<br>
            <input id="email" type="email" name="email" required><br><br>
            Quantity:<br>
            <input id="quantity" type="number" name="quantity" required><br><br>
            Item ID:<br>
            <input id="itemid" type="number" name="itemid" required><br><br>
            Credit Card Number:<br>
            <input id="ccnum" type="number" name="creditcard" required><br><br>
            Exp Month/Year:
            <select id="month" name="Month">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select id="year" name="Year">
                <option value="2016">16</option>
                <option value="2017">17</option>
                <option value="2018">18</option>
                <option value="2019">19</option>
                <option value="2020">20</option>
                <option value="2021">21</option>
                <option value="2022">22</option>
                <option value="2023">23</option>
                <option value="2024">24</option>
                <option value="2025">25</option>
                <option value="2026">26</option>
                <option value="2027">27</option>                
            </select><br><br>
            Address:<br>
            <input id="address" type="text" name="address" required><br><br>
            City:<br>
            <input id="city" type="text" name="city" required><br><br>
            State<br>
            <select id="state" name="State">
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AS">AS</option>
                <option value="AZ">AZ</option>
                <option value="AR">AR</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DE">DE</option>
                <option value="DC">DC</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="GU">GU</option>
                <option value="HI">HI</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="IA">IA</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="ME">ME</option>
                <option value="MD">MD</option>
                <option value="MH">MH</option>
                <option value="MA">MA</option>
                <option value="MI">MI</option>
                <option value="FM">FM</option>
                <option value="MN">MN</option>
                <option value="MS">MS</option>
                <option value="MO">MO</option>
                <option value="MT">MT</option>
                <option value="NE">NE</option>
                <option value="NV">NV</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NY">NY</option>
                <option value="NC">NC</option>
                <option value="ND">ND</option>
                <option value="MP">MP</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PW">PW</option>
                <option value="PA">PA</option>
                <option value="PR">PR</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="VI">VI</option>
                <option value="WA">WA</option>
                <option value="WV">WV</option>
                <option value="WI">WI</option>
                <option value="WY">WY</option>
            </select><br><br>
            Shipping:<br>
            <select id="ship" name="Shipping">
                <option value="overnight">Overnight</option>
                <option value="2Day">2-Day Expedited</option>
                <option value="6Day">6-Day Ground</option>
            </select><br><br>
            <input type="submit"></input>
        </form>
    </body>
</html>
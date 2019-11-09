<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <?php include "imports.php"; ?>
  <title>Products</title>
</head>
<body>
  <?php session_start();
  if(!isset($_SESSION["loggedInCust"]))
  {
    include "headerLoggedOut.php";
  }else {
    include "headerLoggedIn.php";
  }
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <p class="h5 text-center">Filter</p>
        <form class="filter" action="index.html" method="post">
          <p class="h6">Categories</p>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch3">
            <label class="custom-control-label" for="customSwitch3">Grocery</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch4">
            <label class="custom-control-label" for="customSwitch4">Fruits</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch5">
            <label class="custom-control-label" for="customSwitch5">Vegetables</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch12">
            <label class="custom-control-label" for="customSwitch12">Fish</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch11">
            <label class="custom-control-label" for="customSwitch11">Meat</label>
          </div>

          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Dairy</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch8">
            <label class="custom-control-label" for="customSwitch8">Beverages</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2">Pharmaceuticals</label>
          </div>
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch6">
            <label class="custom-control-label" for="customSwitch6">Household</label>
          </div>
          <br>
          <div class="form-group">
            <label class="h6" for="formControlRange">Price</label>
            <input type="range" class="form-control-range"  min="0" max="9999" step="10" id="formControlRange">
            <p>0 - 9999</p>
          </div>
          <br>
          <div class="text-center">
            <button type="submit" class="btn btn-warning">Find Match</button>
          </div>
        </form>
      </div>
      <div class="col-10 border">
        <div class="card-deck">
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+1" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text mt-n3">LKR 100</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text mt-n3">LKR 200</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text mt-n3">LKR 300</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+4" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text mt-n3">LKR 400</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+5" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text mt-n3">LKR 500</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
        </div>
        <br>
        <!--
        <div class="card-deck">
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+1" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text mt-n3">LKR 100</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text mt-n3">LKR 200</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text mt-n3">LKR 300</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+4" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text mt-n3">LKR 400</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+5" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text mt-n3">LKR 500</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
        </div>
        <br>
        <div class="card-deck">
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+1" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text mt-n3">LKR 100</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text mt-n3">LKR 200</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text mt-n3">LKR 300</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+4" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text mt-n3">LKR 400</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+5" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text mt-n3">LKR 500</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
        </div>
        <br>
        <div class="card-deck">
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+1" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text mt-n3">LKR 100</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text mt-n3">LKR 200</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text mt-n3">LKR 300</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+4" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text mt-n3">LKR 400</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+5" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text mt-n3">LKR 500</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
        </div>
        <br>
        <div class="card-deck">
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+1" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 1</h5>
              <p class="card-text mt-n3">LKR 100</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+2" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 2</h5>
              <p class="card-text mt-n3">LKR 200</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+3" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 3</h5>
              <p class="card-text mt-n3">LKR 300</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+4" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 4</h5>
              <p class="card-text mt-n3">LKR 400</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
          <div class="card shadow">
            <img class="card-img-top" src="https://via.placeholder.com/300x200.png?text=Product+5" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Product 5</h5>
              <p class="card-text mt-n3">LKR 500</p>
              <p class="card-text text-center"><button type="button" class="btn btn-outline-success">Add To Cart</button></p>
            </div>
          </div>
        </div>
        <br>
      -->
      </div>
    </div>
  </div>

  <?php include "footer.php" ?>

</body>
</html>

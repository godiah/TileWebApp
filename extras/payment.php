<!-- Checkout -->
<div class="container">
  <h2 class="text-center">Checkout</h2>
  <div class="row">
    <!-- Details -->
    <div class="col-md-9">
      <!-- Address -->
      <div class="address-card">
        <h5>Address Details</h5>
        <form action="">
          <div class="d-flex">
            <input type="text" name="fname" id="" placeholder="First Name" autocomplete="off" required>
            <input type="text" name="lname" id="" placeholder="Last Name" autocomplete="off" required>
          </div>
          <div>
            <input type="tel" name="telno" id="" placeholder="Telephone Number" autocomplete="off" required>
          </div>
          <div>
            <label for="region">Region : </label>
            <select name="region" id="">
              <option value="Central">Central</option>
              <option value="Central">Central</option>
              <option value="Southern">Southern</option>
              <option value="Western">Western</option>
              <option value="Nyanza">Nyanza</option>
              <option value="Coast">Coast</option>
            </select>
          </div>
        </form>
      </div>
      <!-- Delivery -->
      <div class="address-card">
        <h5>Delivery Details</h5>
        <span><p>How do you want it delivered?</p></span>
        <form action="">
          <input type="radio" id="station" name="delivery" value="Pickup Station">
          <label for="Pickupstation">Pickup Station</label><br>
          <input type="radio" id="home" name="delivery" value="Home/Office">
          <label for="Home/Office">Home/Office</label><br>
        </form>
      </div>
      <!-- Shipment Details -->
      <div class="address-card">
        <h5>Shipment Details</h5>
        
      </div>
      <!-- Payment Method -->
      <div class="address-card">
        <h5>Payment Method</h5>
        <p class="payment-text">Pay Now</p>
        <div class="payment-icons">
          <a href="#" class="social-icon">
            <i class="fa-brands fa-google"></i>
          </a>
                
                   
        </div>
        
        <div><h6>Pay on delivery</h6></div>
        <div>

        </div>
      </div>
      
    </div>
    <!-- Order Summary -->
    <div class="col-md-3">
      
    </div>
  </div>
</div>
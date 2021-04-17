<!-- banner -->
<div class="banner inner-banner" id="home">
	<div class="container">

	</div>
</div>
<!-- //banner -->
<style>
/* Basic Styling */

 
.container1 {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}
/* Columns */
.left-column {
  width: 65%;
  position: relative;
}
 
.right-column {
  width: 35%;
  margin-top: 60px;
}
/* Left Column */
.left-column img {
    float: left;
  width: 33.33%;
  padding: 5px;
 

}

/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
/* Product Color */
.product-color {
  margin-bottom: 30px;
}
 
.color-choose div {
  display: inline-block;
}
 
.color-choose input[type=&quot;radio&quot;] {
  display: none;
}
 
.color-choose input[type=&quot;radio&quot;] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
}
 
.color-choose input[type=&quot;radio&quot;] + label span {
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0,0,0,0.33);
}
 
.color-choose input[type=&quot;radio&quot;]#red + label span {
  background-color: #C91524;
}
.color-choose input[type=&quot;radio&quot;]#blue + label span {
  background-color: #314780;
}
.color-choose input[type=&quot;radio&quot;]#black + label span {
  background-color: #323232;
}
 
.color-choose input[type=&quot;radio&quot;]:checked + label span {
  background-image: url(images/check-icn.svg);
  background-repeat: no-repeat;
  background-position: center;
}
/* Cable Configuration */
.cable-choose {
  margin-bottom: 20px;
}
 
.cable-choose button {
  border: 2px solid #E1E8EE;
  border-radius: 6px;
  padding: 13px 20px;
  font-size: 14px;
  color: #5E6977;
  background-color: #fff;
  cursor: pointer;
  transition: all .5s;
}
 
.cable-choose button:hover,
.cable-choose button:active,
.cable-choose button:focus {
  border: 2px solid #86939E;
  outline: none;
}
 
.cable-config {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
 
.cable-config a {
  color: #358ED7;
  text-decoration: none;
  font-size: 12px;
  position: relative;
  margin: 10px 0;
  display: inline-block;
}
.cable-config a:before {
  content: &quot;?&quot;;
  height: 15px;
  width: 15px;
  border-radius: 50%;
  border: 2px solid rgba(53, 142, 215, 0.5);
  display: inline-block;
  text-align: center;
  line-height: 16px;
  opacity: 0.5;
  margin-right: 5px;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}
/* Responsive */
@media (max-width: 940px) {
  .container {
    flex-direction: column;
    margin-top: 60px;
  }
 
  .left-column,
  .right-column {
    width: 100%;
  }
 
  
}
 

</style>
<body >

<div class="container" id="product-section" style="padding-top: 50px;">
  <div class="row">
   <div class="col-md-6">
   <img src="<?php echo base_url('upload/villa/'.$villa->image) ?>"  />
   </div>
   <div class="col-md-6">
            <!-- Product Description -->
            <div class="product-description">
        
          <h3><?php echo $villa->nama_villa ?></h3>
          <p><?php echo substr($villa->deskripsi, 0, 120) ?></p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          

          <!-- Cable Configuration -->
          <div class="cable-config">
            <span>Details</span>

            <div class="cable-choose">
              <a><span class="fa fa-home"></span> <?php echo $villa->alamat ?></a><br>
              <a><span class="fa fa-bed"></span> Kamar Tidur = 3</a> <br>
              <a><span class="fa fa-bath"></span> Kamar Mandi = 2</a>
             
            </div>

            
          </div>
        </div>

        <!-- Product Pricing -->
        <div class="product-price">
          <span><?php echo $villa->harga ?> IDR</span>
		  <?php if(!$sesi){ ?>
                   <a href="<?php echo base_url('Auth') ?>" class="cart-btn">Booking</a>
                  <?php }else{ ?>
                    
                
                      <a href="<?php echo base_url('C_contact') ?>" class="cart-btn">Booking</a>
                  <?php } ?>
         
        </div>
      </div>
   </div>
  </div>
  <div class="footer-address" style="padding-top: 100px;"><!-- end row -->
 </div><!-- end container -->
</body>

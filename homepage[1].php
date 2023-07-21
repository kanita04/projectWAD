<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to DuoPharm</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="homepage.css" /> 
  <style>
   .client1,
   .client2,
   .client3 {
     width: 100px;
     height: 100px;
     background-size: cover; /* Adjust the background size to cover the container */
     background-repeat: no-repeat;
     background-position: center center ;
     border-radius: 50%;
     margin: auto;
   }
  .client1{
    background-image: url(images/client1.jpg);
  }
  .client2{
    background-image: url(images/client2.jpg);
  }
  .client3{
    background-image: url(images/client3.jpg);
  }
  .reviews .box-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* Three columns */
  gap: 2rem;
}

.reviews .box {
  background-color: white;
  text-align: center;
  border-radius: 3rem;
  box-shadow: var(--box-shadow);
  padding: 2rem;
  margin: 1rem 0;
}

.process .box-container .box img {
  height: 20rem;
  margin: 1rem 0;
  width: 100%;
}
  </style>
</head>

<body>
  <header class="header fixed-top">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <a href="#home" class="logo">duo<span>Pharm</span></a>
        <nav class="nav">
          <a href="#home">Home</a>
          <a href="#about">About</a>
          <a href="#services">Services</a>
          <a href="#reviews">Reviews</a>
          <a href="#contact">Contact</a>
        </nav>
        <div class="right">
          <a href="user_login.php" class="btn">Login</a>
          <div id="menu-btn" class="fas fa-bars"> </div>
          <a href="user_signup.php" class="btn">Sign Up</a>
          <!-- put the sign up home page here -->
        </div>
      </div>
    </div>
  </header>

  <section class="home" id="home">
    <div class="container">
      <div class="row min-vh-100 align-items-center">
        <div class="content text-center text-md-left">
          <h3>Your Health is our Priority</h3>
          <p>Duopharm aims to facilitate high quality services at an affordable price making sure that all your medical needs are well catered for. Join our vibrant community and unlock exclusive benefits! Sign up today to access premium content, connect
            with like-minded individuals, and stay updated with the latest news and events.</p>

          <a href="user_signup.php" class="link-btn">Sign Up!</a>


        </div>

      </div>
    </div>
  </section>
  <!-- home section ends -->

  <!-- about section stats -->
  <section class="about" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 image">
          <img src="images/aboutus.jpg" class="w-100 mb-5 mb-mb-0">
        </div>
        <div class="col-md-6 content">
          <span>About Us</span>
          <h3>True Healthcaree for your family</h3>
          <p>Duopharm is the fastest growing pharmacy and health hub in East Africa, the #1 pharmacy chain in
            the region. The company provides trusted pharmaceuticals to customers across the population from convenient
            locations with a total reach of over 1.2 million people and with over 120 stores in Kenya and Uganda.
            Our Plan is to expand to over 250 stores,reaching over 5.5 million consumers by 2025.<br>
            Duopharm Pharmacy aims to help the nation to look and feel good one person at
            a time by providing high-quality individual customer care at an affordable price and convenient locations
            across the region.</p>
          <a href="#contact" class="link-btn">make appointment</a>
        </div>
      </div>
    </div>

  </section>
  <!-- about section ends -->




  <!-- services section start -->
  <section class="services" id="services">
    <h1 class="heading">Our Services</h1>
    <div class="box-container container">
      <div class="box">
        <img src="images/process1.jpg">
        <h3>Online Prescription Ordering</h3>
        <p>Users can conveniently request their prescription medications online, eliminating the need for in-person
          visits to a physical pharmacy. They can provide their prescription details, select the desired medications,
          and have them delivered to their doorstep.
        </p>
      </div>
      <div class="box">
        <img src="images/process2.jpg">
        <h3>Medication Delivery</h3>
        <p> The website can offer a reliable and efficient medication delivery service, ensuring that patients receive
          their prescribed medications in a timely manner. This eliminates the need for patients to travel to a pharmacy
          and provides convenience, especially for those with mobility or transportation limitations.
        </p>
      </div>
      <div class="box">
        <img src="images/process3.jpg">
        <h3>Medication Information and Education</h3>
        <p> The website can provide comprehensive information and educational resources about various medications. This
          may include details about drug uses, dosage instructions, potential side effects, interactions with other
          medications, and general health tips.
      </div>
      <div class="box">
        <img src="images/process4.jpg">
        <h3>Virtual Consultaions</h3>
        <p> The website can offer virtual consultations with licensed healthcare professionals, providing an opportunity
          for patients to discuss their medication-related concerns, ask questions, and seek professional advice from
          the comfort of their homes.
        </p>
      </div>
      <div class="box">
        <img src="images/process5.jpg">
        <h3>Medication Tracking and History</h3>
        <p> The website provide users with access to their medication history, allowing them to track their
          prescriptions, view past orders, and maintain a comprehensive record of their medications. This feature can be
          valuable for medication management and coordinating healthcare with multiple providers.
        </p>
      </div>
      <div class="box">
        <img src="images/process6.jpg">
        <h3> Drug Administration</h3>
        <p> Patients can conveniently access and order prescribed drugs from the comfort of their own homes. The website
          ensures accuracy in dispensing medications, verifies prescription details, and securely delivers the drugs to
          the patients' preferred address, ensuring a seamless and reliable drug administration process.</p>
      </div>
    </div>
    </div>

  </section>

  <!-- services section end -->

  <!-- process section starts -->
  <section class="process">
    <h1 class="heading">Work Process</h1>
    <div class="box-container container">
      <div class="box">
        <img src="images/workprocess1.jpg" alt="">
        <h3>Doctors Prescription</h3>
        <p>Doctors prescribe drugs and administer through their office and giving vital information such as their side
          effects and correct dosage required.</p>
      </div>

      <div class="box">
        <img src="images/workprocess2.jpg" alt="">
        <h3>Drug Delivery</h3>
        <p>Professional and friendly deliveries of prescribed drugs right to your doorstep.</p>
      </div>


      <div class="box">
        <img src="images/workprocess3.jpg" alt="">
        <h3>Medical Education</h3>
        <p>As you can see, patients can arrange face to face consulting about their medication including their dosage
          instruction, potential side effects and also general health tips</p>
      </div>

    </div>
  </section>
  <!-- process section ends -->


  <!-- Reviews start here -->
  <section class="reviews" id="reviews">
    <h1 class="heading">satisfied clients</h1>
    <div class="box-container container">
      <div class="box">
        <div class="client1">
        </div>

        <p>I was once a patient here. i was in dire need of help bst Dr. John Doe helped me out and nursed me back to
          full recovery without even leaving the comfort of my home to go to the hospital.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>Sarah Kui</h3>
        <span>satisfied client</span>
      </div>



      <div class="box">
        <div class="client2">
        </div>
        <p>Being a doctor in this prestigious pharmacy, we aim to help our patient in need by ensuring wonderful and
          healthy recovery when sick. </p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>John Doe</h3>
        <span>Satisfied Doctor</span>
      </div>

      <div class="box">
        <div class="client3">
        </div>

        <p>My mom was really sick at a point she couldnt really get out of bed. but thanks to Duo pharm, the were able
          to give me vivid instructions on which medicine i should give to my mother, including the potential side
          effects and also ways in which i should nurse her back to health.</p>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star-half-alt"></i>
        </div>
        <h3>Victorial Manola</h3>
        <span>satisfied client</span>
      </div>
    </div>
  </section>
  <!-- contact section starts -->
  <section class="contact" id="contact" >
    <h1 class="heading">make appointment</h1>
  </section>
  

  <!-- contact section ends -->

  <!-- footer section starts -->
  <section class="footer">
    <div class="box-container container">
      <div class="box">
        <i class="fas fa-phone"></i>
        <h3>Phone Number</h3>
        <p>0799-545-548->Front desk line</p>
        <p>0723-345-678->Secondary line</p>
      </div>

      <div class="box">
        <i class="fas fa-map-marker-alt"></i>
        <h3>Our Addresses</h3>
        <p>Haile Selassie Road Nairobi, Kenya</p>
        <p>Delamere Naivasha, Kenya</p>
      </div>



      <div class="box">
        <i class="fas fa-clock"></i>
        <h3>Opening Hours</h3>
        <p>07:00hrs-18:00hrs on weekdays</p>
        <p>08:00hrs-16:00hrs on weekends and public holidays</p>
      </div>

      <div class="box">
        <i class="fas fa-envelope"></i>
        <h3>Email Address</h3>
        <p>duopharm@gmail.com</p>
        <p>duopharm@yahoo.com</p>
      </div>
    </div>

    <div class="credit"> &copy; copyright @
      <?php echo date('Y'); ?> All Rights Reserved <br> by <span>Pambi Egara Jeremiah & Anita Kamau <br> </span>
      <span>Terms and Conditions Apply</span>
    </div>
  </section>

  <!-- footer section ends -->


  <script src="js/script.js"></script>
</body>

</html>
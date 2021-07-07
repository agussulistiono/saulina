 <!-- ======= Appointment Section ======= -->
 <style type="text/css">
   
body
{
  font-family: 'Poppins', sans-serif;
}


.box
{
  -webkit-box-shadow: 0px 0px 11px 3px rgba(245,245,245,1);
-moz-box-shadow: 0px 0px 11px 3px rgba(245,245,245,1);
box-shadow: 0px 0px 11px 3px rgba(245,245,245,1);
  margin-top:20px;
}

.form
{
  background:#fff;
  
}

.form h1
{
  
  font-size: 25px;
  padding-bottom: 20px;
}

.form_container
{
  
  padding:20px;
}

.form_group
{
  margin-top:5px;
}


.classpan 
{
    width:20%;
  float:left;
    color: #000;
    font-size: 13px;
    font-weight: 400;
  display:block;
  padding-top:4px;
  font-family: 'Poppins', sans-serif;
}



.txtbox {
    width: 70%;
    height: 35px;
    border-radius: 5px;
    background: #fff;
    color: #323232;
    padding-left: 6px;
    font-size: 12px;
  font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #dedbdb;
    -webkit-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    -moz-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
}

.txtbox:focus
{
  outline:0px;
}

.txtbox::placeholder
{
    color:#999;
    font-size:11px;
}


.txtbox1 {
    width: 34.5%;
    height: 35px;
    border-radius: 5px;
    background: #fff;
    color: #323232;
    padding-left: 6px;
    font-size: 12px;
  font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #dedbdb;
    -webkit-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    -moz-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
}

.txtbox1:focus
{
  outline:0px;
}

.txtbox1::placeholder
{
    color:#999;
    font-size:12px;
}


.ddb {
    width: 70%;
    height: 35px;
    border-radius: 5px;
    background: #fff;
    color: #323232;
  font-family: 'Poppins', sans-serif;
    padding-left: 6px;
    font-size: 12px;
    box-sizing: border-box;
    border: 1px solid #dedbdb;
    -webkit-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    -moz-box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
    box-shadow: 0px 3px 3px -4px rgba(191,174,191,1);
}


.mybt {
    width: 15%;
    height: 35px;
    border-radius: 5px;
    background: #105aae;
    color: #fff;
  text-align:center;
    padding-left: 6px;
    font-size: 12px;
  margin-left:20%;
  margin-top:20px;
  font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
    border: 1px solid #dedbdb;
    -webkit-box-shadow: 0px 0px 1px 0px rgba(224,224,224,1);
    -moz-box-shadow: 0px 0px 1px 0px rgba(224,224,224,1);
    box-shadow: 0px 0px 1px 0px rgba(224,224,224,1);
  cursor:pointer;
}

 </style>
 <main id="main" style="padding-top: 90px;">
    <section id="appointment" class="appointment section-bg">
      <div class="container" data-aos="fade-up">
      <div class="container box">
        <div class="row no-gutters">
         <div class="col-md-6 form">
            <div class="form_container">
           <h1>User Registration</h1>
           <form method="post" action="<?php echo base_url('Home/daftar_action')?>">
               <div class="form_group">
                  <label class="classpan">Username</label>
                  <input type="text" name="nama" class="txtbox" placeholder="nama">
               </div>
               <div class="form_group">
                  <label class="classpan">Email</label>
                  <input type="email" name="email" class="txtbox" placeholder="email">
               </div>

               <div class="form_group">
                  <label class="classpan">Password</label>
                  <input type="password" name="password" class="txtbox" placeholder="Password">
               </div>
               
               <div class="form_group">
                  <label class="classpan">Alamat</label>
                  <input type="text" name="alamat" class="txtbox" placeholder="Alamat">
               </div>
               <div class="form_group">
                  <label class="classpan">No. Hp</label>
                  <input type="number" name="no_hp" class="txtbox" placeholder="No hp">
               </div>
               <?php 
                $liatdata=$this->db->query("SELECT * FROM user");
                $idsementara=$liatdata->num_rows()+1;
                $id_user="$idsementara";
                $id_user=substr($id_user,-8);
                ?>
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
               
               <div class="form_group">
                  <input type="submit" name="submit" class="mybt" value="REGISTER">
               </div> 
              </div>
            </form>
            
         </div>
         
         
         <div class="col-md-6">
            <img class="img-fluid" src="<?php echo base_url()?>assets/img/daftar.jpg">
         </div>  
         
        </div> 
      </div>


      </div>
    </section><!-- End Appointment Section -->
    </main>
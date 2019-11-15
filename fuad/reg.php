<?php
    session_start();
    
?>

<html>
  <head>
    <title>Registration details</title>
  </head>
  <body>
    <form action="regController.php" method="post" enctype="multipart/form-data">
      <table border="1" align="center" width="100%">
        <tr>
          <td colspan="3" align="center" style="background-color:  #006bb3">
            <h2 style="color:white;padding-top: 10px;">Profile Information</h2>
          </td>
        </tr>
        <tr style="background-color:    #80ffff;">
          <td>
            <table>
              <tr>
                <td>DOB</td>
              </tr>
              <tr>
                <td>
                  <input type="date" name='dob' value=''/>
                  <?php
                    if(isset($_SESSION['dob_empty']))
                      echo "<br>Dob can not be empty.";
                    if(isset($_SESSION['dob_not_valid']))
                      echo "<br>You must be at least 15 years old.";
                  ?>
                </td>
              </tr>
              <tr>
                  <td>Gender</td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name='gender' value='male'/> Male
                  <input type="radio" name='gender' value='female'/> Female
                  <input type="radio" name='gender' value='others'/> Others
                  <?php
                    if(isset($_SESSION['gender_empty']))
                      echo "<br> please select an option";
                  ?>
                </td>
              </tr>
              <tr>
                <td>
                  <table>
                    <tr>
                      <td colspan="2">
                        Address
                      </td>
                    </tr>
                    <tr>
                      <td>House</td>
                      <td>Road</td>
                    </tr>
                    <tr>
                        <td><input type="text" name='house' value=''/></td>
                        <td><input type="text" name='road' value=''/></td>
                    </tr>
                    <tr>
                      <td colspan="2">Area*</td>
                    </tr>
                    <tr>
                      <td colspan="2"><input type="text" name="area"/>
                      <?php
                        if(isset($_SESSION['area_empty']))
                          echo 'area can not be empty';
                      ?>
                      </td>
                    </tr>
                    <tr>
                        <td>Sub-district*</td>
                        <td>Post code*</td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name='subdis' value=''/>
                        <?php
                          if(isset($_SESSION['subdis_empty']))
                            echo 'subdistrict can not be empty';
                        ?>
                        </td>
                        <td>
                        <input type="text" name='postCode' value=''/>
                        <?php
                          if(isset($_SESSION['postcode_empty']))
                            echo 'postcode can not be empty';
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>District*</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name='district' value=''/>
                        <?php
                          if(isset($_SESSION['district_empty']))
                            echo 'district can not be empty';
                        ?>
                        </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          <td>
            <table>
              <tr>
                <td>
                  Phone*
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="phnno" value="<?php 
                    if(isset($_SESSION['phnno']))
                      echo $_SESSION['phnno'];
                  ?>"/>
                  <?php
                    if(isset($_SESSION['phoneno_empty']))
                      echo "<br> phone no is empty.";
                  ?>
                </td>
              </tr>
              <tr>
                  <td>
                    Secondary Phone
                  </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name='phnNo2' value=""/>
                </td>
              </tr>
              <tr>
                <td>
                  Available Time
                </td>
              </tr>
              <tr>
                <td>
                  <input type="time" name='fromTime' value=""/> 
                  to
                  <input type="time" name='toTime' value=""/> 
                </td>
              </tr>
            </table>
          </td>
          <td>
            <table>
              <tr>
                <td>
                  <img src="" alt="Profile.jpg">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="file" name="uploadimg" value='Upload image'/>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="background-color:  #006bb3; padding: 15px;">
            <table align="center">
              <tr>
                <td style="font: 15px;color:#006bb3; ">
                    <input type="submit" name="Cancel" value="Do it letter" id=""/>
                </td>
                <td>
                  <input type="submit" name='submit' value='Submit'/>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
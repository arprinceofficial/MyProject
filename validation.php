
<?php
//session_start();
include ("dbconn.php");


    $user_id =$_POST['USERID'];
    $user_name =($_POST['USERNAME']);
    if($user_name=="")
    {
        echo '<meta http-equiv="REFRESH" content="0;url=login.php">';
    }
    
    if($user_id=="")
    {
        echo '<meta http-equiv="REFRESH" content="0;url=login.php">';
    }
        if(($user_id!='') && ($user_name!=''))
        {

           $result = oci_parse($conn," select * from  USER_INFO where userid='$user_id'");//

                oci_execute($result);

                 $numrows = oci_fetch_all($result, $res);
            if($numrows>0)
            {   echo $user_name;
                oci_execute($result); 
                if($row = oci_fetch_array($result))
                {
                    $p = $row['USERNAME'];
                    $u = $row['USERID'];
                
                }

                        if(($p==$user_name) && ($u==$user_id) && ($user_id!='') && ($user_name!=''))
                        {  

                            $_SESSION['mis_emp_id']=$user_id;
                            // $_SESSION['mis_role']=$ROLE;

                            
                            if($_SESSION['mis_emp_id']==$user_id)
                            {
                                header('Location: Home.php');
                            }
                        }
                        else 
				        {  echo '<script>alert("INVALID USERNAME OR PASSWORD")</script>'; 
					echo '<meta http-equiv="REFRESH" content="0;url=login.php?msg=error">';
				        }
  
                        /* if($user_id == 'TEST' && $user_name =='1234')
                        {
                            echo '<meta http-equiv="REFRESH" content="0;url=input.php?msg=error">';
                        }
                        else
                        {
                            echo '<meta http-equiv="REFRESH" content="0;url=login.php?msg=error">';
                        } */
            
            }else{echo '<script>alert("INVALID USERNAME OR PASSWORD")</script>'; 
                  $msg = 'error'; session_destroy();
                  echo '<meta http-equiv="REFRESH" content="0;url=login.php?msg=error">';
                  }
         
        }else{echo '<script>alert("INVALID USERNAME OR PASSWORD")</script>'; 
            echo '<meta http-equiv="REFRESH" content="0;url=login.php?msg=error">';
              ;
              }
         
?>
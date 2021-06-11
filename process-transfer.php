<?php
session_start();
require_once "connect_db.php";

$err_msg = '';
$s_msg = '';


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    // transaction validation and processing 
    if ($_GET['process'] === 'T-R-A-N-S-F-E-R') {

    $from_acc = (int)$_SESSION['ACCT'];
    $to_acc = (int)filter_input(INPUT_POST,"tocustomer");
    $amt = (float)filter_input(INPUT_POST,"amount");

    $sql1 = "SELECT cust_name,acc_balance FROM customers WHERE acc_number = ".$from_acc;
    $sql2 = "SELECT cust_name,acc_balance FROM customers WHERE acc_number = ".$to_acc;

    $res1 = $conn->query($sql1);
    $res2 = $conn->query($sql2);

    if (($res1->num_rows > 0) and ($res2->num_rows > 0)) {

        $d1 = $res1->fetch_assoc();
        $d2 = $res2->fetch_assoc();

        

            if ($amt <= $d1['acc_balance']) {

                $curr_bal = $d1['acc_balance'] - $amt;
                $new_amt = $d2['acc_balance'] + $amt;

                $upd1 = "UPDATE customers SET acc_balance = ".$curr_bal." WHERE acc_number = ".$from_acc;
                $upd2 = "UPDATE customers SET acc_balance = ".$new_amt." WHERE acc_number = ".$to_acc;

                if (($conn->query($upd1) == TRUE) and ($conn->query($upd2) == TRUE)) {
                    $date = date('d-m-Y').", ".date('l').", ".date('h:i:sa');
                    $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'".$date."','SUCCESSFUL')";

                    $s_msg = "Transaction Successful!";
                }
            } else {
                $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'".$date."','FAILED')";
                $err_msg = "The Entered Amount is Higher than Current Balance.<br>Transaction Cancelled!";
            }     
         
    } else {
        $trans = "INSERT INTO transaction_rec VALUES (NULL,".$from_acc.",".$to_acc.",".$amt.",'".$date."','FAILED')";
        $err_msg = "Invalid Account Credentials!";
    }

    if ($err_msg != "Invalid Account Credentials!") {
        $conn->query($trans);
    }

    header("location:home-page.php?msg=$s_msg&emsg=$err_msg");
    }
    
    // Signin validation and processing
    elseif ($_GET['process'] === 'R-E-G-I-S-T-E-R') {
        // for new account creation
        if (isset($_POST['submit'])) {
            $r_msg = '';
            $n = filter_input(INPUT_POST,'uname');
            $e = filter_input(INPUT_POST,'uemail');
            $l = filter_input(INPUT_POST,'uloc');
            $p = filter_input(INPUT_POST,'upwd');
            $amt = filter_input(INPUT_POST,'ubal');
            $dob = filter_input(INPUT_POST,'dob');
            $phn = filter_input(INPUT_POST,'phn');
            $pin = filter_input(INPUT_POST,'pin');
            $gender = filter_input(INPUT_POST,'gender');

            $a_n = (int) ((rand() * 2) / (rand(10,99)));

            $sql = "INSERT INTO customers VALUES (NULL,'".$n."',".$amt.",".$a_n.",'".$e."','".$l."','".$p."','".$dob."','".$gender."',".$pin.",'".$phn."')";
            $res = $conn->query($sql);

            if ($res == true) {
                $r_msg = "The Account has been Successfully Created! Check the Profile Dashboard for the issued Account number.";
                $_SESSION['USER'] = $n;
                $_SESSION['ACCT'] = $a_n;
                $_SESSION['EID'] = $e;
                $_SESSION['BAL'] = $amt;
                $_SESSION['LOC'] = $l;
                $_SESSION['PWD'] = $p;
                $_SESSION['PHN'] = $phn;
                $_SESSION['DOB'] = $dob;
                $_SESSION['GEND'] = $gender;
                $_SESSION['PIN'] = $pin;


            } else {
                $r_msg = "Account with those Details already Exists!";
            }
            header("location:continue.php?message=".htmlspecialchars($r_msg));
        }
    }
    // Login page validation and processing
    elseif ($_GET['process'] === 'L-O-G-I-N') {
        // for logging in existing user
        if (isset($_POST['lsubmit'])) {
            $e = filter_input(INPUT_POST,'vemail');
            $p = filter_input(INPUT_POST,'vpwd');

            $sql = "SELECT * FROM customers WHERE email_id='".$e."' AND cust_pwd='".$p."'";
            $res = $conn->query($sql);

            if ($res->num_rows > 0) {
                $data = $res->fetch_assoc();
                $_SESSION['USER'] = $data['cust_name'];
                $_SESSION['ACCT'] = $data['acc_number'];
                $_SESSION['EID'] = $e;
                $_SESSION['BAL'] = $data['acc_balance'];
                $_SESSION['LOC'] = $data['location'];
                $_SESSION['PWD'] = $p;
                $_SESSION['PHN'] = $data['c_phno'];
                $_SESSION['DOB'] = $data['c_dob'];
                $_SESSION['GEND'] = $data['c_gender'];
                $_SESSION['PIN'] = $data['c_pin'];
                header("location:home-page.php");
            }
            else {
                $mesg = "Invalid Details!";
                header("location:loginpage.php?mesg=".htmlspecialchars($mesg));
            }
        }
    }
    // Edit profile details....
    elseif ($_GET['process'] === 'E-D-I-T') {
        // for edition existing user details (update)
        $n = filter_input(INPUT_POST,'user');
        $e = filter_input(INPUT_POST,'email');
        $l = filter_input(INPUT_POST,'loc');
        $p = filter_input(INPUT_POST,'psw');
        $dob = filter_input(INPUT_POST,'dob');
        $phn = filter_input(INPUT_POST,'phn');
        $pin = filter_input(INPUT_POST,'pin');
        $gender = filter_input(INPUT_POST,'gender');

        $sql = "UPDATE customers SET cust_name='".$n."',email_id='".$e."',location='".$l."',cust_pwd='".$p."',c_dob='".$dob."',c_gender='".$gender."',c_pin=".$pin.",c_phno='".$phn."' WHERE email_id='".$_SESSION['EID']."'";

        $res = $conn->query($sql);

        if ($res == true) {
            $_SESSION['USER'] = $n;
            $_SESSION['EID'] = $e;
            $_SESSION['LOC'] = $l;
            $_SESSION['PWD'] = $p;
            $_SESSION['PHN'] = $phn;
            $_SESSION['DOB'] = $dob;
            $_SESSION['GEND'] = $gender;
            $_SESSION['PIN'] = $pin;
            header("location:w-profilepage.php");
        }
        else {
            header("location:continue.php?editfail");
        }

    }
}

?>
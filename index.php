<!doctype html>
<html>
<head>
    <meta charest="utf-8">
    <title>talash database sample</title>
    <link href="CSS/style.css" rel="stylesheet"/>
</head>

<body>

<?php
include "connection.php";

if (isset($_POST['submit1'])) {

    $classid = $_POST['txt_classid'];
    $classname = $_POST['txt_class'];
    $ins_sql = " INSERT INTO class(class_id,class_name)  VALUES ('$classid','$classname')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}

if (isset($_POST['submit2'])) {
    
    $classid = $_POST['classid'];
    $stud_id = $_POST['studid'];
    $stud_name = $_POST['stud_name'];
    $stud_family = $_POST['stud_family'];
    $stud_ave = $_POST['stud_ave'];
    $ins_sql = "INSERT INTO student(stud_id,class_id,name,family,ave)  VALUES ($stud_id,'$classid','$stud_name','$stud_family','$stud_ave')";
    $ins_sql_pre = $db->prepare($ins_sql);
    $ins_sql_pre->execute();
}
?>

<div id="wrapper">
    <div id="row1">
        <div id="row1_col1">
            <form action="" method="post">
                <fieldset>

                    <legend>Class</legend>

                    <label>class name:</label>
                    <input type="text" name="txt_class"/>

                    <input type="submit" name="submit1" value="insert-class"/>

                </fieldset>
            </form>
            <table border="1">
                <tr>

                    <td>classid</td>
                    <td>class name</td>

                </tr>


                <?php
                include "connection.php";
                $query = "SELECT * FROM class";
                $result = $db->prepare($query);
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "
    <tr>
    
    <td>" . $row['class_id'] . "</td>
    <td>" . $row['class_name'] . "</td>
    
    </tr>
    ";
                }
                ?>

            </table>
        </div>

        <div id="row1_col2">
            <form action="" method="post">
                <fieldset>

                    <legend>Student</legend>

                    <label>name</label><br/>
                    <input type="text" name="stud_name"/><br/>

                    <label>family</label><br/>
                    <input type="text" name="stud_family"/><br/>

                    <label>average</label><br/>
                    <input type="text" name="stud_ave"/><br/>

                    <input type="submit" name="submit2" value="insert-student"/>

                </fieldset>

            </form>

            <table border="1">
                <tr>

                    <td>name</td>
                    <td>family</td>
                    <td>average</td>

                </tr>


                <?php
                include "connection.php";
                $query = "SELECT * FROM student";
                $result = $db->prepare($query);
                $result->execute();

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    echo "
    <tr>
    
  <td>" . $row['name'] . "</td>
    <td>" . $row['family'] . "</td>
    <td>" . $row['ave'] . "</td>
    
     </tr>
    ";
                }

                ?>

            </table>
        </div>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
       body{
            background-color: whitesmoke;   
            font-family: 'Bebas Neue', cursive;
            background-image:url(owner.jpg);
            background-position: center;
    background-size: cover;
    position: relative;
    background-attachment: fixed;


        }
        #mother{
            width: 100%;
            font-size: 20px;

        }
        main{
            float: right;
            border: 1px solid gray;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: solid 2px black;
            text-align: center;
            font-family: 'Koulen', cursive;       }
            aside{
                color: #f5f5f5;
                /* font-weight: bold; */
                text-align:center;
                width: 300px;
                float: left;
                border: 1px solid black;
                padding: 10px;
                font-size: 20px;
               /* background-image:url(tree.jpg); */
               background-position: center;
    background-size: cover;
    position: relative;
    position:fixed;
    top:60px;
    background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;
            }
            #tbl {
                width: 890px;
                font-size: 20px;
text-align:center;
background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1;

            }
            #tbl th{
                background-color: #ef6464;
                color:black;
                font-size: 20;
                padding: 10px;
            }
            aside button{
                width:190px;
                padding: 8px;
                margin-top: 7px;
                font-size: 17px;
                font-family: 'Bebas Neue', cursive;
                font-weight: bold ;
            }
            aside button:hover{
                border: 1px solid green;
    background: #4dff4d;
    transition: 1s;

            }
            .deleteStudent:hover{
                border: 1px solid #f44336;
    background: #f44336;
    transition: 1s;
            }
            h3{
                color:black;
            }
    </style>
</head>
<body div='rtl'>

    <div id="mother" >
        <form method='POST'>
            <aside>
                <div id='div'>
                    <img src="student.png" width="150">
                    <h3>admin panel</h3>
                    <label> student number:</label><br>
                    <input type='number' name='id' id='id'><br>
                    <label> student name:</label> <br>
                    <input type='text' name=name id='name'> <br>
                    <label> student adress:</label><br>
                    <input type ='text' name='address' id='address'> <br><br>
                    <button class='addStudent' name="add"> add student</button>
                    <button class='deleteStudent' name="del"> delete student</button>
                </div>
            </aside>
            <main>
                <table id='tbl'>
                    <tr>
                        <th>serial number</th>
                        <th>student name</th>
                        <th>student  address</th>
                    </tr>
                </table>
            </main>
        </form>
    </div>


    <script src="public/js/jquery-3.6.0.min.js"></script>
    

    <script>
        function getStudents(){
            $.ajax({
                type: "POST",
                url: "modules/inc/get_students.php",
                success: function(students) {
                    let output = `
                        <tr>
                            <th>serial number</th>
                            <th>student name</th>
                            <th>student  address</th>
                        </tr>
                    `;
                    for(i in students){
                        output += `
                            <tr data-studentid='${students[i].student_id}'>
                                <td>${students[i].student_id}</td>
                                <td>${students[i].student_name}</td>
                                <td>${students[i].student_address}</td>
                            </tr>
                        `;
                    }
                    
                    $('#tbl').html(output);
                }
            });
        }
        
        $(".addStudent").click(function(e){
            let formData = new FormData();
            formData.append("status", 'add');

            if($('#name').val()){
                formData.append("name", $('#name').val());
            }

            if($('#address').val()){
                formData.append("address", $('#address').val());
            }
            
            $.ajax({
                type: "POST",
                url: "modules/inc/insert_student.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(students) {
                    console.log(students);
                    getStudents();
                }
            });

            e.preventDefault();
        });

        $(".deleteStudent").click(function(e){
            let formData = new FormData();
            formData.append("status", 'deleteStudent');

            if($('#id').val()){
                formData.append("id", $('#id').val());
            }
            
            $.ajax({
                type: "POST",
                url: "modules/inc/insert_student.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(students) {
                    console.log(students);
                    getStudents();
                }
            });

            e.preventDefault();
        });

        $(document).ready(function(){
            getStudents();
        });

    </script>
</body>
</html>
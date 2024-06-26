<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Moli_booking</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
    crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var now = new Date();

            var year = now.getFullYear();
            var month = (now.getMonth() + 1).toString().padStart(2, '0');
            var day = now.getDate().toString().padStart(2, '0');
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');

            var currentDateTime = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;

            document.getElementById('gobook-FromTime').value = currentDateTime;

            
            $("#BookingForm").submit(function(event){
                event.preventDefault();
                var stuid = $("#gobook-StuId").val();
                var fromtime = $("#gobook-FromTime").val();
                var totime = $("#gobook-ToTime").val();
                var usage = $("#gobook-Usage").val();
                var email = $("#gobook-Email").val();
                var submit = $("#gobook-Submit").val();
                
                // AJAX 提交表单
                $.ajax({
                    type: "POST",
                    url: "GoBook.php",
                    data: {
                        stuid: stuid,
                        fromtime: fromtime,
                        totime: totime,
                        usage: usage,
                        email: email,
                        submit: submit
                    },
                    success: function(response) {
                        alert("成功送出表單！");

                        $('#gobook-StuId').val('');
                        $('#gobook-FromTime').val(currentDateTime);
                        $('#gobook-ToTime').val('12:00');
                        $('#gobook-Usage').val('');
                        $('#gobook-Email').val('');
                    }
                });
            })

            $("#RootForm").submit(function(event) {
                event.preventDefault();
                var username = $("#Login-User").val();
                var password = $("#Login-Password").val();
                var submit = $("#Login-Submit").val();
                
                // AJAX 提交表单
                $.ajax({
                    type: "POST",
                    url: "Login.php",
                    data: {
                        username: username,
                        password: password,
                        submit: submit
                    },
                    success: function(response) {
                        if (response === "failure") {
                            // 登录成功，执行相应操作
                            alert("Access denied");
                        }else{
                            window.location.href = "/moli_booking-main/moli_root/index.php";
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function openForm(){
            document.getElementById("LoggingPage").style.display="block";
        }
    </script>
    <script>
        function closeForm(){
            document.getElementById("LoggingPage").style.display="none";
        }
    </script>
</head>
<body>
    <div id="LoggingPage" class="LoggingPage">
        <div class="RootPage">
            <span class="CloseButton" onclick="closeForm()" title="CloseOverlay">&#215</span>
            <form id="RootForm" action="Login.php" method="post">
                <h1>管理者登入</h1>
                <input id="Login-User" type="text" placeholder="Username:" required>
                <input id="Login-Password" type="password" placeholder="Password:" required>
                <button id="Login-Submit" type="submit" name="submit">Send</button>
            </form>
        </div>
    </div>
    <div class="calendar" id="calendar">
        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%234285F4&ctz=Asia%2FTaipei&src=YTA5MDM2MTM4MzRAZ21haWwuY29t&src=Y2xhc3Nyb29tMTE2NTM1NTQ2MTcyNDE1OTk5NzY3QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=emgtdHcudGFpd2FuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%23202124&color=%230B8043" 
        ></iframe>
    </div>
    <div class="main" id="main">
        <div class="Logging" id="Logging">
            <button class="OpenButton" onclick="openForm()">管理員請點此登入</button>
        </div>
        <div class="Booking" id="Booking">
            <h1>欲預約教室請填寫以下資訊</h1>
            <form id="BookingForm" action="GoBook.php" method="post" >
                <input id="gobook-StuId"type="text" placeholder="學號:" required autofocus>
                <br>
                <div class="timechoose">
                    <input id="gobook-FromTime" type="datetime-local" value="" required/>
                    <p>到</p>
                    <input id="gobook-ToTime" type="time" value="12:00" required/>
                </div>
                <br>
                <input id="gobook-Usage" type="text" placeholder="用途:" required>
                <br>
                <input id="gobook-Email" type="email" placeholder="聯絡信箱:" required>
                <br>
                <button id="gobook-Submit" type="submit" name="submit">Send</button>
                <a href="http://">(聯絡我們)</a>
                <p class="form-message"></p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

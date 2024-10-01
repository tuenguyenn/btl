<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .login-form {
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #4cae4c;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            font-size: 14px;
            display: none;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>
<body>
    <section id="form">
        <div class="container">
            <div class="login-form">
                <div class="alert" id="error-message"></div>
                <h2>Admin Login</h2>
                <form id="login-form">
                    <input type="text" name="username" placeholder="Tài khoản" id="username"/>
                    <input type="password" name="password" placeholder="Mật khẩu" id="password"/>
                    <button type="button" name="submit" class="btn btn-default" id="login">Đăng nhập</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#login').on('click', function() {
            var username = $('#username').val().trim();
            var password = $('#password').val().trim();

            // Kiểm tra người dùng đã nhập username chưa
            if (!username) {
                $('#error-message').removeClass().addClass('alert alert-danger').html('Vui lòng nhập tài khoản').show();
                return;
            }

            // Kiểm tra người dùng đã nhập password chưa
            if (!password) {
                $('#error-message').removeClass().addClass('alert alert-danger').html('Vui lòng nhập mật khẩu').show();
                return;
            }

            // Nếu đã nhập đầy đủ, tiến hành gửi dữ liệu để xử lý đăng nhập
            $.post('cart/data.php?q=verify',
                {
                    username: username,
                    password: password
                },
                function(data) {
                    if (data == 1) {
                        $('#error-message').removeClass().addClass('alert alert-success').html('<i class="fa fa-unlock"></i> Đăng nhập...').show();
                        setTimeout(function() {
                            window.location = 'admin.php';
                        }, 1000);
                    } else {
                        $('#error-message').removeClass().addClass('alert alert-danger').html('Tài khoản hoặc mật khẩu chưa chính xác').show();
                        $('#username').val('');
                        $('#password').val('');
                    }
                }
            );
        });
    </script>
</body>
</html>

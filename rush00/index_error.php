<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        input{
            border: 2px solid #1e5799;
        }
        #btn:hover{
            background: #7db9e8;


        }
        .form_reg {
            float: top;
        }
    </style>
</head>
<body>
<div class = "form_reg">
    <form action="log_in.php" method="post">
        <table>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="name" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <input type="email" name="email" id="email">
                </td>
            </tr>
            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type="password" name="password" id="password">
                </td>
            </tr>
        </table>
        <input type="submit" id="btn">
    </form>
</div>
<div style="display: block">
    <h1>Error</h1>
</div>
</body>
</html>
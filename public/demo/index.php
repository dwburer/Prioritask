<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/forms.js"></script>
        <style type="text/css">
            .form {
                border: 1px solid black;
                margin: 5px;
                padding: 10px;
                float: left;
            }
            
            form input[type=submit] {
                width:100%;
            }   
            </style>
        <meta charset="UTF-8">
        <title>api functionality demo</title>
    </head>
    <body>
	<div class="form"  id="task">
        <form id="task">
            <table>
                <tr>
                    <th colspan="2">
                        Submit task
                    </th>
                </tr>
                <tr>
                    <td>
                        Task: 
                    </td>
                    <td>
                        <input type="text" name="task" id="task" />
                    </td>
                </tr>
                <tr>
                    <td>
                        When is it due:
                    </td>
                    <td>
                        <input type="date" name="date" id="date" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" />
                    </td>
                </tr>
            </table>
        </form>
	</div>
        <div class="form"  id="login">
            <form id="login">
                <table>
                <tr>
                    <th colspan="2">
                        Login
                    </th>
                </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input type="text" name="email" id="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input type="password" name="password" id="password" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="LOGIN>>"  name="submit" />
                        </td>
                    </tr>                
                </table>
            </form>
        </div>
        <div class="form" id="register">
            <form id="register">
                <table>
                    <tr>
                        <th colspan="2">
                            Register
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Email:
                        </td>
                        <td>
                            <input type="text" name="email" id="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input type="password" name="password" id="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password Conf:
                        </td>
                        <td>
                            <input type="password" name="passwordconf" id="passwordconf" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="REGISTER>>"  name="submit" />
                        </td>
                    </tr>                
                </table>
            </form>
        </div>
    </body>
</html>
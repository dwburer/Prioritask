<?php
/**
 * @package Prioritask
 * @author Mitchell M.
 * @version 1.0.0
 */
/**
 * Loading all the required classes/configuration files first
 */
require_once(__DIR__ . '/../api/config/global.php');

function __autoload($class_name) {
    require_once(__DIR__ . '/../api/classes/' . $class_name . '.php');
}

/**
 * Creating the database connection and passing it to the primary session object
 */
$db = Database::getConnection();
$session = new Session($db);
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./js/main.js"></script>
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
                            Title: 
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
                            <input type="datetime-local" name="due" id="due" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            EST days req to complete:
                        </td>
                        <td>
                            <input type="number" name="daytc" id="daytc" value="7">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            EST hours req to complete:
                        </td>
                        <td>
                            <input type="number" name="hourtc" id="hourtc" value="7">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            EST minutes req to complete:
                        </td>
                        <td>
                            <input type="number" name="minutetc" id="minutetc" value="7">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Location:
                        </td>
                        <td>
                            <input type="text" name="location" id="location" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Notes:
                        </td>
                        <td>
                            <input type="text" name="notes" id="notes" />
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
        <div class="form">
            Are you logged in?: [<?php echo $session->isLoggedIn() ? "Yes, <a href=\"#\"id=\"logout\">>LOGOUT<</a>" : "No"; ?>]
        </div>
        <?php
        if ($session->isLoggedIn()) {
            ?>
            <div class="form">
                Array dump of all of your tasks
                <pre>
                    <?php
                    $tasks = $session->getTasks($session->getUID($session->sid));
                    echo var_dump($tasks);
                    ?>
                </pre>
            </div>
            <?php
        }
        ?>
    </body>
</html>
<html>

<html lang="en">

    <head>  
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Polish Notation Calculator | Craigbavender@gmail.com</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/pnc-styles.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>

    <body>
        <div id="pnc-wrapper" class="global-wrapper">
            <div id="pnc-calculator" class="container">
                <div class="col-xs-12">
                    <h1>Polish Notation Calculator</h1>
                    <p>
                        Task:</br>
                        1. Enter full (normal) <a href="https://en.wikipedia.org/wiki/Polish_notation" target="_blank">Polish notation</a> as a parameter.</br>
                        2. Return results.
                    </p>
                    <p>
                        – Acceptable operators: <b>+</b>&nbsp;&nbsp;<b>-</b>&nbsp;&nbsp;<b>/</b>&nbsp;&nbsp;<b>*</b></br>
                        – Use spaces to delimit both operand and operators
                    </p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="polish-notation-input" name="polish_notation_input" placeholder="Enter Prefix Expression...">
                        </div>
                        <input type="hidden" name="action" value="calculate">
                        <button type="submit" class="button button-default">Calculate</button>
                    </form>
                </div>
            </div>
            <div id="pnc-results" class="container">
                <div class="col-xs-12">
                    Results:
                    <?php if(isset($result['success']) && $result['success']) { ?>
                        <div id="success" class="calculator-results">
                            <?= $result['response'] ?>
                        </div>
                    <?php } else { ?>
                        <div id="error" class="calculator-results">
                            <?php
                                if(!empty($result['response'])) {
                                    echo $result['response'];
                                } else {
                                    echo "N/A";
                                }
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div id="pnc-examples" class="container">
                <div class="col-xs-12">
                    Examples:
                    <div id="examples" class="calculator-results">
                        ∗ a + b c</br>
                         / a b / c d</br>
                        - ∗ + a b c d</br>
                        ∗ + a b + c d
                    </div>
                </div>
            </div>
            <div class="container container-footer">
                <div class="col-xs-12">
                    Craig Bavender &copy; 2019 – <a href="craigbavender@gmail.com">craigbavender@gmail.com</a>
                </div>
            </div>
        </div>
    </body>
    
</html>
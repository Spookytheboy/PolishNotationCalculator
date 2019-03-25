<?php 

/**
 * Polish Notation Calculator (Polish Prefix Notation) - PASHpost Response
 *
 * 1. "Using OOP PHP, please create Polish Notation Calculator."
 * 2. "Your calculator must accept full Polish notation as a parameter."
 * 3. "Please check that it is valid and return the results of that notation."
 *
 * @author     Craig Bavender <craigbavender@gmail.com>
 * @version    1.0
 * @link       http://104.131.87.22/PolishNotationCalculator/
 */
class PolishNotationCalculator 
{
    public function calculate($string) 
    {
        if(empty($string)) {
            return array(
                "success" => 0,
                "response" => "Error: No Prefix Expression submit.</br></br>Please submit a space delimited expression.",
            );
        }
        
        $eval_stack = array();
        $input = array_reverse(explode(" ", $string));
        
        // check if valid # of chars to evaluate
        if(count($input) <= 2) {
            return array(
                "success" => 0,
                "response" => "Error: Invalid number of characters detected.</br></br>Please submit a valid space delimited expression.",
            );
        }
        
        foreach ($input as $key => $value) {
            
            if($this->is_operand($value)) {
                
                array_push($eval_stack, $value);
                
            } else {
                
                // check if value is valid operator
                $valid_operator = array("+", "-", "/", "*");
                if(!in_array($value, $valid_operator)) {
                    return array(
                        "success" => 0,
                        "response" => "Error: Invalid operator detected: '" . $value . "'.</br></br>Please submit a valid space delimited expression.",
                    );
                }
                
                // else, continue calculation
                $operand1 = array_pop($eval_stack);
                $operand2 = array_pop($eval_stack);
                
                // calculate
                switch ($value) {
                    case '+':
                        array_push($eval_stack, $operand1 + $operand2);
                        break;
                    case '-':
                        array_push($eval_stack, $operand1 - $operand2);
                        break;
                    case '/':
                        array_push($eval_stack, $operand1 / $operand2);
                        break;
                    case '*':
                        array_push($eval_stack, $operand1 * $operand2);
                        break;
                }
            }
        }
        
        $response = array(
            "success" => 1,
            "response" => $eval_stack[0],
        );
        
        return $response;
    }
    
    public function is_operand($value) 
    {
        if(is_numeric($value)) {
            return true;
        }
        return false;
    }
}
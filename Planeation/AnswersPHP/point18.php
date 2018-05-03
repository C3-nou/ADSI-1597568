    <?php
    /**
     * Point 18.1 = if
     * 
     * The if constructor is one of the most important features of many 
     * languages, including PHP. Allows the conditional execution of 
     * code fragments.
     */
    $a=1; $b=2;
    if ($a > $b) {
    echo "a is greater than b";
    echo '<br>';
    }
    
    /**
     * Point 18.2 = else
     * 
     * The else extends an if statement to execute a statement in case the 
     * expression in the if statement is evaluated as FALSE.
     */
    
    else {
    echo "a is NOT greater than b";
    echo '<br>';
    }
    
    /**
     * Point18.3 = elseif/else if
     * 
     * elseif, as its name suggests, is a combination of if and else. Like else, 
     * it extends an if statement to execute a different statement if the 
     * original if statement is evaluated as FALSE. However, unlike else, that 
     * alternative statement will only be executed if the elseif conditional 
     * statement is evaluated as TRUE. 
     */
    
    if ($a > $b) {
    echo "a is greater than b";
    echo '<br>';
    } elseif ($a == $b) {
    echo "a is the same as b";
    echo '<br>';
    } else {
    echo "a is less than b";
    echo '<br>';
    }
    
    /**
     * Point 18.4 = while
     * 
     * The meaning of a while statement is simple. Tells PHP to execute the 
     * nested statements, as much as the while expression is evaluated as TRUE. 
     * The value of the expression is checked every time at the beginning of the 
     * loop, so even if this value changes during the execution of nested statements, 
     * the execution will not stop until the end of the iteration (every time PHP 
     * executes the statements contained in the loop is an iteration). Sometimes, 
     * if the while expression is evaluated as FALSE from the beginning, nested 
     * statements will not be executed even once.
     */
    
    /* example 1 */

    $i = 1;
    while ($i <= 10) {
    echo $i++;  /* the value presented would be $i before the increase (post-increment) */
    }

    /* example 2 */

    $i = 1;
    while ($i <= 10):
    echo $i;
    $i++;
    endwhile;
    
    /**
     * Point 18.5 = do-while
     * 
     * do-while loops are very similar to while loops, except the truth expression 
     * is checked at the end of each iteration instead of in the beginning. The 
     * main difference from regular while loops is that the first iteration of a 
     * do-while loop is guaranteed to run (the truth expression is only checked 
     * at the end of the iteration), whereas it may not necessarily run with a 
     * regular while loop (the truth expression is checked at the beginning of each 
     * iteration, if it evaluates to FALSE right from the beginning, the loop 
     * execution would end immediately).
     */
    
    $i = 0;
    do {
    echo $i;
    } while ($i > 0);
    
    /**
     * Point 18.6 = for
     * 
     * for loops are the most complex loops in PHP. They behave like their C 
     * counterparts. The syntax of a for loop is:
     * 
     * for (expr1; expr2; expr3)
     *      statement
     * 
     * The first expression (expr1) is evaluated (executed) once unconditionally 
     * at the beginning of the loop.
     * 
     * In the beginning of each iteration, expr2 is evaluated. If it evaluates 
     * to TRUE, the loop continues and the nested statement(s) are executed. If 
     * it evaluates to FALSE, the execution of the loop ends.
     * 
     * At the end of each iteration, expr3 is evaluated (executed).
     * 
     * Each of the expressions can be empty or contain multiple expressions separated 
     * by commas. In expr2, all expressions separated by a comma are evaluated but 
     * the result is taken from the last part. expr2 being empty means the loop should 
     * be run indefinitely (PHP implicitly considers it as TRUE, like C). This may not 
     * be as useless as you might think, since often you'd want to end the loop using 
     * a conditional break statement instead of using the for truth expression.
     */
    
     /* example 1 */

     for ($i = 1; $i <= 10; $i++) {
     echo $i;
}

     /* example 2 */

     for ($i = 1; ; $i++) {
     if ($i > 10) {
        break;
     }
     echo $i;
}

     /* example 3 */

     $i = 1;
     for (; ; ) {
     if ($i > 10) {
        break;
     }
     echo $i;
     $i++;
     }

     /* example 4 */

     for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);

     /**
     * Point 18.7 = foreach
     * 
     * The foreach construct provides an easy way to iterate over arrays. foreach 
     * works only on arrays and objects, and will issue an error when you try to 
     * use it on a variable with a different data type or an uninitialized 
     * variable. There are two syntaxes:
     * 
     * foreach (array_expression as $value)
     *          statement
     * 
     * foreach (array_expression as $key => $value)
     *          statement
     * 
     * The first form loops over the array given by array_expression. On each 
      * iteration, the value of the current element is assigned to $value and the 
      * internal array pointer is advanced by one (so on the next iteration, you'll 
      * be looking at the next element).
     * 
     * The second form will additionally assign the current element's key to the 
      * $key variable on each iteration.
     */

     $arr = array(1, 2, 3, 4);
     foreach ($arr as &$value) {
     $value = $value * 2;
     }
     // $arr is now array(2, 4, 6, 8)
     unset($value); // break the reference with the last element
     
     /**
      * Point 18.8 = break
      * 
      * break ends execution of the current for, foreach, while, do-while or 
      * switch structure.
      * 
      * break accepts an optional numeric argument which tells it how many nested 
      * enclosing structures are to be broken out of. The default value is 1, only 
      * the immediate enclosing structure is broken out of.
      */
     
     $arr = array('one', 'two', 'three', 'four', 'stop', 'five');
     while (list(, $val) = each($arr)) {
     if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
     }
     echo "$val<br />\n";
}

     /* Using the optional argument. */

     $i = 0;
     while (++$i) {
     switch ($i) {
     case 5:
        echo "At 5<br />\n";
        break 1;  /* Exit only the switch. */
     case 10:
        echo "At 10; quitting<br />\n";
        break 2;  /* Exit the switch and the while. */
     default:
        break;
      }
     }
     
     /**
      * Point 18.9 = continue
      * 
      * continue is used within looping structures to skip the rest of the current 
      * loop iteration and continue execution at the condition evaluation and then 
      * the beginning of the next iteration.
      */
     
     while (list($key, $value) = each($arr)) {
     if (!($key % 2)) { // skip even members
        continue;
      }
     do_something_odd($value);
     }

     $i = 0;
     while ($i++ < 5) {
     echo "Outer<br />\n";
     while (1) {
        echo "Middle<br />\n";
        while (1) {
            echo "Inner<br />\n";
            continue 3;
        }
        echo "This never gets output.<br />\n";
      }
     echo "Neither does this.<br />\n";
     }
     
     /**
      * Point 18.10 = switch
      * 
      * The switch statement is similar to a series of IF statements on the same 
      * expression. In many occasions, you may want to compare the same variable 
      * (or expression) with many different values, and execute a different piece 
      * of code depending on which value it equals to. This is exactly what the 
      * switch statement is for.
      */
     
     if ($i == 0) {
     echo "i equals 0";
     } elseif ($i == 1) {
     echo "i equals 1";
     } elseif ($i == 2) {
     echo "i equals 2";
     }

     switch ($i) {
     case 0:
        echo "i equals 0";
        break;
     case 1:
        echo "i equals 1";
        break;
     case 2:
        echo "i equals 2";
        break;
     }
     
     /**
      * Point 18.11 = return
      * 
      * return returns program control to the calling module. Execution resumes 
      * at the expression following the called module's invocation.
      */
     
     echo "b";
     return;
     
     /**
      * Point 18.12 = require 
      * 
      * require is identical to include except upon failure it will also produce 
      * a fatal E_COMPILE_ERROR level error. In other words, it will halt the script 
      * whereas include only emits a warning (E_WARNING) which allows the script 
      * to continue.
      */
     
     require('somefile.php');
     
     /**
      * Point 18.13 = include
      * 
      * Files are included based on the file path given or, if none is given, the 
      * include_path specified. If the file isn't found in the include_path, include 
      * will finally check in the calling script's own directory and the current 
      * working directory before failing. The include construct will emit a warning 
      * if it cannot find a file; this is different behavior from require, which will 
      * emit a fatal error.
      */
     
     echo "A $color $fruit"; // A

     include 'vars.php';

     echo "A $color $fruit"; // A green apple
     
     /**
      * Point 18.14 = require_once
      * 
      * The require_once statement is identical to require except PHP will check 
      * if the file has already been included, and if so, not include (require) 
      * it again.
      */
     
     define('__ROOT__', dirname(dirname(__FILE__)));
     require_once(__ROOT__.'/config.php');
     
     /**
      * Point 18.15 = include_once
      * 
      * The include_once statement includes and evaluates the specified file during 
      * the execution of the script. This is a behavior similar to the include statement, 
      * with the only difference being that if the code from a file has already been 
      * included, it will not be included again, and include_once returns TRUE. As 
      * the name suggests, the file will be included just once.
      */
     
     include_once "a.php"; // esto incluirá a.php
     include_once "A.php"; // esto incluirá a.php ¡otra vez! (sólo PHP 4)
     ?>

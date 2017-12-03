<!--
 * commentSection.php is the comment section on the recipe pages where the commentForm.php is shown
 * if a user is logged in, otherwise only recipe comments are being printed.
-->

<div class="comment">
        <div class="container">
            <?php if (isset($_SESSION['user'])) {
                require_once 'resources/fragments/commentForm.php';
            } ?>
            
            <h3>User comments:</h3>
            <div class="section group">
                <div class="commentbox">
                <div class="col span_4_of_4">
                    <?php
                    $length = count($commentArray);
                    
                for ($i = 0; $i < $length; $i++) {
                    $id = $commentArray[$i];
                    $u = $commentArray[++$i];
                    echo "<b><br><br>". $u. ":<br></b>";
                    $c = $commentArray[++$i];
                    echo $c;
                                     
                    if(trim($u) === $_SESSION['user']) {
                        echo("<form action='do_deleteComment.php' method='post'>");
                        echo("<input type='hidden' name='delete' value='$id'/>");
                        echo("<input type='submit' value='Delete'/>");
                        echo("</form>");
                    } 
                }
                
                if (empty($_SESSION['user'])) {    
                    echo "<h3>Also want to make a comment on this recipe?<br>Please <a href='show_login.php'>log in</a> first!</h3>";
                } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

/**
 *
 * commentForm.php is a comment form where logged in users can leave a new comment.
 * When the user presses the Comment button the user is redirected to the same page, 
 * hence you see your own comment posted directly.
 *
 */

ini_set('short_open_tag', 'on');
$page = $_SESSION['page'];
    
if ($page === 0) {$url = "meatballs";}
else{$url = "pancakes";}
$t=time();

echo "<h3>Hello {$_SESSION['user']}, want to make a comment on this recipe?</h3><br>";
?>

<form accept-charset="UTF-8" role="form" method="post" action="do_addComment.php" name="comment">
    <input type="hidden" value="<?php echo $url ?>" name="page">
    <input type="hidden" value="<?php echo time("Y-m-d h:i:sa", $t) ?>" name="timestamp">
    <div class="commentbox">
        <div class="col span_4_of_4">
            <textarea type="text" name="comment" id= "entry" rows = 5 placeholder="Write your comment here."></textarea>
        </div>
            
        <div class="section group">
            <div class="col span_1_of_4">
                <button type="submit" name="submit" value="Comment">Comment</button>
            </div>
        </div>
    </div>
</form>
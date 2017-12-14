<!--
 * commentSection.php is the comment section on the recipe pages where the commentForm.php is shown
 * if a user is logged in, otherwise only recipe comments are being printed.
-->

<div class="comment">
    <div class="container">
            
        <div id="new-comment">
        <?php if (isset($_SESSION['user'])) {
            require_once 'resources/fragments/commentForm.php';
         } 
         elseif(empty($_SESSION['user'])) {    
            echo "<h3>Want to make a comment on this recipe?<br>Please <a href='show_login.php'>log in</a> first!</h3><br><br>";
         }?>
        </div>
            
        <div id="comments">    
        <h3>User comments:</h3>
        <div class="section group">
            <div class="commentbox">
            <div class="col span_4_of_4">
            <input type='submit' value="Load Comments" data-bind="click: getNewComments"/>
            <!-- ko foreach: {data: array, as: 'entry'} -->
                <b><p data-bind="text: entry.author"></p></b>
                <p data-bind="text: entry.comment"></p>
                    <!-- ko if: entry.loggedIn -->
                        <input type='submit' value="Delete" data-bind="click: $parent.deleteComment"/><br>
                    <!-- /ko --><br>
            <!-- /ko -->
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
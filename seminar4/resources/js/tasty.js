$(document).ready(function () {
    var usernameUrl = 'get_username.php';
    var commentUrl = 'get_usercom.php';
    var addCommentUrl = 'postComment.php';
    var deleteCommentUrl = 'deleteComment.php'
    
    /**
    * Represents a newly written comment that shall be sent to the server.
    */     
    function AddComment() {
        var self = this;
        self.uname = ko.observable();
        self.com = ko.observable("");
        
        self.submitComment = function () {
        if (self.com() !== "") {
            $.post(addCommentUrl, "com=" + ko.toJS(self.com));
            self.com("");
        }};
        
        $.getJSON(usernameUrl, function (returnedUname) {
            self.uname(returnedUname);
        });
    }
    
    /**
    * Represents all comments for each recipe page.
    */  
    function AllComments(commentToAdd) {
        var self = this;
        self.commentToAdd = commentToAdd;
        self.lastSeenTimestamp = 0;
        self.array = ko.observableArray();
        self.author = ko.observable();

        self.getNewComments = function () {
            $.getJSON(commentUrl, function (jsonComments) {
            //$.getJSON(commentUrl, "timestamp=" + self.lastSeenTimestamp, function (jsonComments) {
                for (var i = 0; i < jsonComments.length; i++) {
                    self.id = jsonComments[i++];
                    self.u = jsonComments[i++];
                    self.c = jsonComments[i];
                    
                    self.u = removeQuotes(self.u);
                    self.u = removeNewLine(self.u);
                    self.id = removeQuotes(self.id);
                    self.c = removeNewLine(self.c);
                    //self.id = removeNewLine(self.id);

                    self.iWroteThisComment = (self.u === (self.commentToAdd.uname()));
                    var entry = {author: self.u, comment: self.c, timestamp: self.id, loggedIn: self.iWroteThisComment};
                    
                    if (entry.timestamp > self.lastSeenTimestamp) {
                        self.array.unshift(entry);
                        self.lastSeenTimestamp = entry.timestamp;
                    }
                
                }
            });
        };

        /**
        * Deletes a comment from the comment array.
        * 
        * @param {Entry} entry The comment to delete
        */    
        self.deleteComment = function (entry) {
            self.array.remove(entry);
            $.post(deleteCommentUrl, "timestamp=" + ko.toJS(entry.timestamp));
        };

        self.getNewComments();        
    }

    /**
     * Removes double quotes from the specified string.
     * 
     * @param {String} str The string from which to remove quotes.
     * @returns {String} 'str', without double quotes.
     */
    function removeQuotes(str) {
        return str.replace(/\"/g, "");
    }

    /**
     * Removes \n from the specified string.
     * 
     * @param {String} str The string from which to remove \n.
     * @returns {String} 'str', without \n.
     */    
    function removeNewLine(str) {
        return str.replace(/\n/g, "");
    }
    
    var commentToAdd = new AddComment();
    ko.applyBindings(commentToAdd, document.getElementById('new-comment'));
    ko.applyBindings(new AllComments(commentToAdd), document.getElementById('comments'));
});
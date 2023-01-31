/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/comment/comment.js ***!
  \*****************************************/
$(document).ready(function () {
  getListComment();
});
function handleReply() {
  console.log('handle');
}
function renderCommentView(data) {
  var html = "";
  data.forEach(function (element) {
    var _element$comment$user, _element$comment$user2, _element$comment$user3;
    html += "\n            <div class=\"border rounded p-3  mt-2\" >\n                <div class=\"d-flex align-items-center\">\n                    <img src=\"".concat((_element$comment$user = element.comment.user) === null || _element$comment$user === void 0 ? void 0 : _element$comment$user.avatar, "\" width=\"50\" height=\"50\" class=\"border rounded\">\n                    <div class=\"d-flex flex-column justify-center ms-2\">\n                        <span class=\"fw-bold\">").concat(((_element$comment$user2 = element.comment.user) === null || _element$comment$user2 === void 0 ? void 0 : _element$comment$user2.first_name) + ' ' + ((_element$comment$user3 = element.comment.user) === null || _element$comment$user3 === void 0 ? void 0 : _element$comment$user3.last_name), "</span>\n                        <span style=\"max-width: 800px\">").concat(element.comment.comment, "</span>\n                    </div>\n                </div>\n                <div>\n                    <div id=\"comment_child_").concat(element.comment.comment_id, "\">\n                    </div>\n\n                </div>\n            </div>\n            <div id=\"reply_comment_").concat(element.comment.comment_id, "\">\n                <button class=\"reply btn btn-primary mt-2\" data-reply_id=\"").concat(element.comment.comment_id, "\">Reply</button>\n            </div>");
  });
  $('#list-comment').html(html);
  data.forEach(function (element) {
    if (element.comment.hasOwnProperty('comments_child')) {
      var commentChildHtml = "";
      element.comment.comments_child.forEach(function (commentChild) {
        commentChildHtml += "<div class=\"d-flex align-items-center border rounded \" style=\"margin-left: 15%; margin-top: 5px\">\n                        <img src=\"".concat(commentChild.user.avatar, "\" width=\"50\" height=\"50\" class=\"border rounded\">\n                        <div class=\"d-flex flex-column justify-center ms-2\" >\n                            <span class=\"fw-bold\">").concat(commentChild.user.first_name + ' ' + commentChild.user.last_name, "</span>\n                            <span style=\"max-width: 800px\">").concat(commentChild.comment, "</span>\n                        </div>\n                    </div>");
      });
      $('#comment_child_' + element.comment.comment_id).append(commentChildHtml);
    }
  });
  $('.reply').click(function () {
    var comment_id = $(this).data('reply_id');
    var html = "<div style=\"width: 100%;\" class=\"mt-2\">\n                <div class=\"col\" >\n                    <input type=\"text\" id=\"textReply_".concat(comment_id, "\" class=\"form-control \" style=\"height: 50px\" name=\"comment\" required\n                        placeholder=\"Enter comment...\"/>\n                </div>\n                <button id=\"btnReply_").concat(comment_id, "\" class=\"btn btn-primary w-100 mt-2\" >Reply</button>\n            </div>");
    $('#reply_comment_' + comment_id).html(html);
    $('#btnReply_' + comment_id).click(function () {
      if ($('#textReply_' + comment_id).val() !== '') {
        var replyData = {
          'content': $('#textReply_' + comment_id).val(),
          'parent_id': comment_id
        };
        submitData(replyData);
        getListComment();
        $('#textReply_' + comment_id).val('');
      }
    });
  });
}
function getListComment() {
  var url = new URL(window.location.href);
  var split_url = url.pathname.split('/');
  var post_id = split_url[split_url.length - 1];
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/comment/list_comment/' + post_id,
    dataType: 'json',
    success: function success(response) {
      renderCommentView(response.data);
    },
    error: function error(_error) {
      console.log(_error);
    }
  });
}
$('#btnComment').click(function () {
  if ($('#txtComment').val() !== '') {
    var comment = {
      'content': $('#txtComment').val(),
      'parent_id': null
    };
    submitData(comment);
    getListComment();
    $('#txtComment').val('');
  }
});
function submitData(comment) {
  var data = {
    'user_id': $('#user_id').val(),
    'post_id': $('#post_id').val(),
    'parent_id': comment.parent_id,
    'comment': comment.content
  };
  $.ajax({
    type: 'POST',
    url: 'http://localhost:8000/api/comment/add',
    data: data,
    dataType: 'json',
    success: function success(reponse) {
      console.log(reponse);
    },
    error: function error(_error2) {
      console.log(_error2);
    }
  });
}
/******/ })()
;
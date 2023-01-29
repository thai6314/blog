/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/comment/comment.js ***!
  \*****************************************/
var current_post_id;
var current_user_id;
$(document).ready(function () {
  getListComment();
});
function renderCommentView(data) {
  current_post_id = data.post_id;
  var html = "";
  data.forEach(function (element) {
    var _element$user, _element$user2, _element$user3;
    html += "\n            <div class=\"border rounded p-3 d-flex align-items-center mt-2\" >\n                <img src=\"".concat((_element$user = element.user) === null || _element$user === void 0 ? void 0 : _element$user.avatar, "\" width=\"50\" height=\"50\" class=\"border rounded\">\n                <div class=\"d-flex flex-column justify-center ms-2\">\n                    <span class=\"fw-bold\">").concat(((_element$user2 = element.user) === null || _element$user2 === void 0 ? void 0 : _element$user2.first_name) + ' ' + ((_element$user3 = element.user) === null || _element$user3 === void 0 ? void 0 : _element$user3.last_name), "</span>\n                    <span>").concat(element.comment, "</span>\n                </div>\n            </div>");
  });
  $('#list-comment').append(html);
}
function getListComment() {
  var url = new URL(window.location.href);
  var split_url = url.pathname.split('/');
  var post_id = split_url[split_url.length - 1];
  $.ajax({
    type: 'GET',
    url: 'http://localhost:8000/api/list_comment/' + post_id,
    dataType: 'json',
    success: function success(response) {
      renderCommentView(response.data);
    },
    error: function error(_error) {
      console.log(_error);
    }
  });
  current_post_id = post_id;
}
$('#btnComment').click(function () {
  console.log($('#txtComment').val());
  var data = {
    'post_id': current_post_id,
    'comment': $('#txtComment').val()
  };
  $.ajax({
    type: 'POST',
    url: 'http://localhost:8000/api/comment/add',
    data: data,
    dataType: 'json',
    success: function success(reponse) {
      console.log(reponse);
    }
  });
});
/******/ })()
;
/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/comment/comment.js ***!
  \*****************************************/
$(document).ready(function () {
  getListComment();
});
function renderCommentView(data) {
  var html = "";
  data.forEach(function (element) {
    var _element$user, _element$user2, _element$user3, _element$user4, _element$user5, _element$user6;
    html += "\n            <div class=\"border rounded p-3  mt-2\" >\n                <div class=\"d-flex align-items-center\">\n                    <img src=\"".concat((_element$user = element.user) === null || _element$user === void 0 ? void 0 : _element$user.avatar, "\" width=\"50\" height=\"50\" class=\"border rounded\">\n                    <div class=\"d-flex flex-column justify-center ms-2\">\n                        <span class=\"fw-bold\">").concat(((_element$user2 = element.user) === null || _element$user2 === void 0 ? void 0 : _element$user2.first_name) + ' ' + ((_element$user3 = element.user) === null || _element$user3 === void 0 ? void 0 : _element$user3.last_name), "</span>\n                        <span style=\"max-width: 800px\">").concat(element.comment, "</span>\n                    </div>\n                </div>\n                <div class=\"\">\n                    <div class=\"comment-child\">\n                        <div class=\"d-flex align-items-center border rounded\" style=\"margin-left: 15%\">\n                            <img src=\"").concat((_element$user4 = element.user) === null || _element$user4 === void 0 ? void 0 : _element$user4.avatar, "\" width=\"50\" height=\"50\" class=\"border rounded\">\n                            <div class=\"d-flex flex-column justify-center ms-2\" >\n                                <span class=\"fw-bold\">").concat(((_element$user5 = element.user) === null || _element$user5 === void 0 ? void 0 : _element$user5.first_name) + ' ' + ((_element$user6 = element.user) === null || _element$user6 === void 0 ? void 0 : _element$user6.last_name), "</span>\n                                <span style=\"max-width: 800px\">").concat(element.comment, "</span>\n                            </div>\n                        </div>\n                    </div>\n                    <div id=\"").concat(element.comment_id, "\" style=\"margin-left: 15%\">\n                        <input type=\"hidden\" value=\"").concat(element.comment_id, "\" id=\"comment_id\">\n                        <button class=\"reply btn btn-primary mt-2 \">Reply</button>\n                    </div>\n                </div>\n            </div>");
  });
  $('#list-comment').html(html);
  $('.reply').click(function () {
    var html = "<div style=\"width: 80%; margin-left: 15%\" class=\"mt-2\">\n                <div class=\"col\">\n                    <input type=\"text\" id=\"txtComment\" class=\"form-control \" style=\"height: 50px\" name=\"comment\" required\n                        placeholder=\"Enter comment...\"/>\n                </div>\n                <button id=\"btnComment\" class=\"btn btn-primary w-100 mt-2\">Reply</button>\n            </div>";
    var comment_id = $('#comment_id').val();
    $('#' + comment_id).html(html);
  });
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
}
$('#btnComment').click(function () {
  if ($('#txtComment').val() !== '') {
    submitData();
    getListComment();
    $('#txtComment').val('');
  }
});
function submitData() {
  var data = {
    'user_id': $('#user_id').val(),
    'post_id': $('#post_id').val(),
    'comment': $('#txtComment').val()
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
function filterCommentByParentID(parent_id) {
  return parent_id;
}
/******/ })()
;
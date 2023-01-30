$(document).ready(function () {
    getListComment();
})

function renderCommentView(data) {
    let html = ``;

    data.forEach(element => {

        html += `
            <div class="border rounded p-3  mt-2" >
                <div class="d-flex align-items-center">
                    <img src="${ element.user?.avatar }" width="50" height="50" class="border rounded">
                    <div class="d-flex flex-column justify-center ms-2">
                        <span class="fw-bold">${ element.user?.first_name + ' ' + element.user?.last_name }</span>
                        <span style="max-width: 800px">${ element.comment }</span>
                    </div>
                </div>
                <div class="">
                    <div class="comment-child">
                        <div class="d-flex align-items-center border rounded" style="margin-left: 15%">
                            <img src="${ element.user?.avatar }" width="50" height="50" class="border rounded">
                            <div class="d-flex flex-column justify-center ms-2" >
                                <span class="fw-bold">${ element.user?.first_name + ' ' + element.user?.last_name }</span>
                                <span style="max-width: 800px">${ element.comment }</span>
                            </div>
                        </div>
                    </div>
                    <div id="${ element.comment_id }" style="margin-left: 15%">
                        <input type="hidden" value="${ element.comment_id }" id="comment_id">
                        <button class="reply btn btn-primary mt-2 ">Reply</button>
                    </div>
                </div>
            </div>`
    })
    $('#list-comment').html(html);

    $('.reply').click(function () {
        let html =
            `<div style="width: 80%; margin-left: 15%" class="mt-2">
                <div class="col">
                    <input type="text" id="txtComment" class="form-control " style="height: 50px" name="comment" required
                        placeholder="Enter comment..."/>
                </div>
                <button id="btnComment" class="btn btn-primary w-100 mt-2">Reply</button>
            </div>`;
        let comment_id = $('#comment_id').val();
        $('#' + comment_id).html(html);
    });
}

function getListComment() {
    const url = new URL(window.location.href);
    let split_url = url.pathname.split('/');
    let post_id = split_url[split_url.length - 1];
    $.ajax({
        type: 'GET',
        url: 'http://localhost:8000/api/list_comment/' + post_id,
        dataType: 'json',
        success: function (response) {
            renderCommentView(response.data)
        },
        error: function (error) {
            console.log(error);
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
    let data = {
        'user_id': $('#user_id').val(),
        'post_id': $('#post_id').val(),
        'comment': $('#txtComment').val()
    }
    $.ajax({
        type: 'POST',
        url: 'http://localhost:8000/api/comment/add',
        data: data,
        dataType: 'json',
        success: (reponse) => {
            console.log(reponse);
        },
        error: (error) => {
            console.log(error);
        }
    });
}

function filterCommentByParentID(parent_id){
    return parent_id
}


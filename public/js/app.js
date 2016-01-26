function displayMessage(result, message) {
    toastr[result](message);
}

$(document).on('click', '.fa-toggle-off', function() {
    var postId = $(this).closest('.row').attr('data-post-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/toggle-off/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.closest('.row').find('.fa-check').removeClass('fa-check').addClass('fa-times');
            caller.removeClass('fa-toggle-off').addClass('fa-toggle-on');
        }
    });
});

$(document).on('click', '.fa-toggle-on', function() {
    var postId = $(this).closest('.row').attr('data-post-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/toggle-on/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.closest('.row').find('.fa-times').removeClass('fa-times').addClass('fa-check');
            caller.removeClass('fa-toggle-on').addClass('fa-toggle-off');
        }
    });
});

$(document).on('click', '.fa-trash', function() {
    var postId = $(this).closest('.row').attr('data-post-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/trash/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.closest('.row').remove();
        }
    });
});

$(document).on('click', '.fa-trash-o', function() {
    var postId = $(this).closest('.row').attr('data-comment-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/trash-comment/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.closest('.row').remove();
        }
    });
});

$(document).on('click', '.fa-eye-slash', function() {
    var postId = $(this).closest('.row').attr('data-comment-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/toggle-comment-off/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});

$(document).on('click', '.fa-eye', function() {
    var postId = $(this).closest('.row').attr('data-comment-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/toggle-comment-on/' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });
});

$(document).on('click', '.add-comment', function() {
    var postId = $(this).closest('.row').attr('data-post-id');
    var csrf = $(document).find('[name="_token"]').val();
    var comment = $(document).find('textarea').val();
    var caller  = $(this);
    if ($.trim(comment) == '') {
        displayMessage('error', 'Enter comment first');
        return;
    }
    $.ajax({
        type: "POST",
        url: url + '/ajax/comment',
        data: '_token=' + csrf + '&comment=' + comment + '&post=' + postId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
        }
    });
});

$(document).on('click', '.fa-user-times', function() {
    var userId = $(this).closest('.row').attr('data-user-id');
    var caller  = $(this);
    $.ajax({
        type: "GET",
        url: url + '/ajax/user-remove/' + userId,
        error: function (data) {
            displayMessage('error', data.responseJSON.message);
        },
        success: function (data) {
            displayMessage('success', data.message);
            caller.closest('.row').remove();
        }
    });
});
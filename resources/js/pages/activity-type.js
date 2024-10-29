import executeExample from "../../../public/assets/js/pages/sweetalert.init";

$(document).ready(function () {
    initActivityTypeCRUD();
});

function initActivityTypeCRUD() {
    $('#formSubmit').on('submit', handleFormSubmit);
    $('.btn-edit').on('click', handleEditClick);
    $('.btn-delete').on('click', handleDeleteClick);
    $('.btn-close').on('click', clearFormFields);
}

function handleFormSubmit(e) {
    e.preventDefault();
    let id = $('#formSubmit').data('id');
    let url = id ? `api/activity-types/${id}` : 'api/activity-types/';
    let method = id ? 'PUT' : 'POST';
    let message = id ? 'updated' : 'created';

    executeExample('createOrUpdate', message).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    name: $('#name').val(),
                    rate: $('#rate').val(),
                    _token: $('input[name="_token"]').val(),
                },
                success: function (response, textStatus, xhr) {
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample('success', response.message).then(() => {
                            $('#formSubmit')[0].reset();
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === "error", response.message);
                    }
                },
                error: function (response, textStatus, xhr) {
                    executeExample(textStatus === 'error', xhr.responseJSON.message);
                }
            });
        }
    });
}

function handleEditClick() {
    const id = $(this).data('id');
    $.get('/api/activity-types/' + id, function (data) {
        $('#activity_type_id').val(data.id);
        $('#name').val(data.name);
        $('#rate').val(data.rate);
        $('#modalcenter').addClass('block');
    });

    $('#formSubmit').data('id', id);
}

function clearFormFields() {
    $('#activity_type_id').val('');
    $('#name').val('');
    $('#rate').val('');

    // Optionally, hide the modal if needed
    $('#modalcenter').removeClass('block');
}

function handleDeleteClick() {
    var id = $(this).data('id');
    executeExample('warningConfirm').then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/activity-types/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        executeExample('success', 'deleted').then(() => {
                            $('#formSubmit')[0].reset();
                            location.reload();
                        });
                    } else {
                        executeExample('error')
                    }
                }
            });
        }
    });
}

import executeExample from "../../../public/assets/js/pages/sweetalert.init";

$(document).ready(function () {
    initActivityTypeCRUD();
});

function initActivityTypeCRUD() {
    $('#formSubmit').on('submit', handleFormSubmit);
    $('.btn-edit').on('click', handleEditClick);
    $('.btn-close').on('click', clearFormFields);
}

function handleFormSubmit(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let url = `api/employee/${id}`;
    let method = 'PUT';
    let message = 'updated';

    executeExample('createOrUpdate', message).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    precentage: $('#precentage').val(),
                    _token: $('input[name="_token"]').val(),
                },
                success: function (response, textStatus, xhr) {
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample(textStatus, message).then(() => {
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
    let id = $(this).data('id');
    $.ajax({
        url: `/api/employee/${id}`,
        method: 'GET',
        success: function (response, textStatus, xhr) {
            $('#employee').val(response.data.employee_id);
            $('#name').val(response.data.name);
            $('#email').val(response.data.email);
            $('#precentage').val(response.data.rate_percentage);
            $('#output').text(response.data.rate_percentage + '%');
            $('#modalcenter').addClass('block');
        },
        error: function (response, textStatus, xhr) {
            executeExample(textStatus, response.responseJSON.message);
        }
    });

    $('#formSubmit').data('id', id);
}

function clearFormFields() {
    $('#employee').val('');
    $('#name').val('');
    $('#email').val('');
    $('#percentage').val('');
}

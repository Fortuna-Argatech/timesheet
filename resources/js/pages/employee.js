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
    let id = $('#id').val();
    let employeeId = $('#employee_id').val();
    let url = 'api/employee/' + id;
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
    $.get('/api/employee/' + id, function (data) {
        console.log(data);
        $('#id').val(data.id);
        $('#employee_id').val(data.employee_id);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#precentage').val(data.rate_percentage);
        $('#precentage').next('output').text(data.rate_percentage + "%");
        $('#modalcenter').addClass('block');
    });
}

function clearFormFields() {
    $('#employee_id').val('');
    $('#precentage').val('');
}

// function handleDeleteClick() {
//     var id = $(this).data('id');
//     executeExample('warningConfirm').then(function (result) {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: '/api/employee/' + id,
//                 type: 'DELETE',
//                 data: {
//                     _token: $('meta[name="csrf-token"]').attr('content'),
//                 },
//                 success: function (response) {
//                     console.log(response);
//                     if (response.status === 'success') {
//                         executeExample('success', 'deleted').then(() => {
//                             $('#formSubmit')[0].reset();
//                             location.reload();
//                         });
//                     } else {
//                         executeExample('error')
//                     }
//                 }
//             });
//         }
//     });
// }
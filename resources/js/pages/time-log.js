import executeExample from "../../../public/assets/js/pages/sweetalert.init.js";

let activityTypeSelectr = new Selectr('#activity-type');

$(document).ready(function () {
    initTimeLogsCRUD();
});

function initTimeLogsCRUD() {
    $('#formSubmit').on('submit', handleFormSubmit);
    $('#datatable_1').on('click', '.btn-edit', handleEditClick);
    $('#datatable_1').on('click', '.btn-delete', handleDeleteClick);
    $('.btn-close').on('click', clearFormFields);
    $('.btn-status').on('click', changeStatus);
}

function handleFormSubmit(e) {
    e.preventDefault();
    let id = $('#formSubmit').data('id');
    let url = `/api/time-logs/${id}`;
    let method = 'PUT';
    let message = 'updated';
    let activityType = $('#activity-type option:selected').text().trim();
    let hours = $('#hours').val();
    let rate = $('#activity-type').val();
    let totalIDR = rate * hours;

    // let fromTimeString = $('#from-time').val();
    // let toTimeString = $('#to-time').val();
    // let fromTime = new Date($('#from-time').val());
    // let toTime = new Date($('#to-time').val());
    // let hours = (toTime - fromTime) / (1000 * 60 * 60);

    executeExample('createOrUpdate', message).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: method,
                data: {
                    _token: $('input[name="_token"]').val(),
                    activity_type: activityType,
                    hours: hours,
                    billing_amount: totalIDR,
                    // from_time: fromTimeString,
                    // to_time: toTimeString,
                },
                success: function (response, textStatus, xhr) {
                    console.log(response);
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample('success', message).then(() => {
                            $('#formSubmit')[0].reset();
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === 'error' || xhr.status, response.message);
                    }
                },
                error: function (xhr, textStatus, error) {
                    executeExample('error', xhr.responseJSON.message);
                }
            });
        }
    });
}
function handleEditClick() {
    let id = $(this).data('id');
    const padlock = $(this).data('padlock');

    if (padlock === 'locked') {
        executeExample('error', 'You cannot edit locked time logs');
        return;
    }

    $.get('/api/time-logs/' + id, function (data) {
        $('#id').val(data.id);
        $('#employee_id').val(data.employee_id);
        $('#timesheet').val(data.timesheet_id);
        $('#hours').val(data.hours);
        // $('#from-time').val(data.from_time);
        // $('#to-time').val(data.to_time);
        activityTypeSelectr.setValue(data.activity_type.rate);
        $('#modalcenter').addClass('block');
    });

    $('#formSubmit').data('id', id);
}
function clearFormFields() {
    $('#time_logs_id').val('');
    $('#activity-type').val('');
    $('#hours').val('');
    // $('#from-time').val('');
    // $('#to-time').val('');
    activityTypeSelectr.clear();
    $('#modalcenter').removeClass('block');
}
function handleDeleteClick() {
    let id = $(this).data('id');
    const padlock = $(this).data('padlock');

    if (padlock === 'locked') {
        executeExample('error', 'You cannot delete locked time logs');
        return;
    }

    executeExample('warningConfirm').then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: '/api/time-logs/' + id,
                type: 'DELETE',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function (response, textStatus, xhr) {
                    console.log(xhr.status)
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample(textStatus, response.message).then(() => {
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === "error", response.message);
                    }
                },
                error: function (response, textStatus, xhr) {
                    executeExample('error', response.responseJSON.message);
                }
            });
        }
    });
}

function changeStatus() {
    let id = $(this).data('id');
    let status = $(this).data('status');
    let message = `change status`;

    executeExample('createOrUpdate', message).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                url: `/api/time-logs/change-status/${id}`,
                type: 'PUT',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    status: status
                },
                success: function (response, textStatus, xhr) {
                    if (textStatus === 'success' && xhr.status === 200) {
                        executeExample('success', message).then(() => {
                            location.reload();
                        });
                    } else {
                        executeExample(textStatus === 'error', response.message);
                    }
                },
                error: function (response, textStatus, xhr) {
                    executeExample(textStatus === 'error', xhr.responseJSON.message);
                }
            });
        }
    });
}
